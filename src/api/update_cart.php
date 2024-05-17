<?php
require '../../config/connect.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['productId'];
    $action = $_POST['action'];
    $quantity = $_POST['quantity'];
    $cart_id = $_SESSION['cart_id'];

    global $conn;
    if($action === 'plus') {
        $quantity += 1;
        $sql = "UPDATE chitietgiohang SET SOLUONG = $quantity WHERE MASP = $product_id AND MAGH = $cart_id";
    } else if($action === 'minus' && $quantity > 1) {
        $quantity -= 1;
        $sql = "UPDATE chitietgiohang SET SOLUONG = $quantity WHERE MASP = $product_id AND MAGH = $cart_id";
    }
    if (mysqli_query($conn, $sql)) {
        // Create an array with the product_id and the updated quantity
        $response = array(
            'product_id' => $product_id,
            'quantity' => $quantity
        );
        // Convert the array to JSON and print it
        echo json_encode($response);
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>