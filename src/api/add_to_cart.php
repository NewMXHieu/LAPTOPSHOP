<?php
include "../../config/connect.php";
global $conn;

// Start the session
session_start();
if(!isset($_SESSION["id"])){
    echo "Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng";
    exit;
}

// Check if the product_id is set
if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    // Check if the cart_id is set in session
    if (isset($_SESSION['cart_id'])) {
        $cart_id = $_SESSION['cart_id'];

        $product_exists = false;
        // If product_id exists, update quantity
        if (in_array($productId, $_SESSION['product_cart'])) {
            // Escape the values to prevent SQL Injection
            $productId = mysqli_real_escape_string($conn, $productId);
            $cart_id = mysqli_real_escape_string($conn, $cart_id);
            
            $query = "UPDATE chitietgiohang SET SOLUONG = SOLUONG+1 WHERE MASP = '$productId' AND MAGH = '$cart_id'";
            if ($conn->query($query) === FALSE) {
                echo "Error: " . $conn->error;
            } else {
                $product_exists = true; // Set flag to true
            }
        }

        // If product does not exist, insert new product to cart
        if (!$product_exists) {
            // Escape the values to prevent SQL Injection
            $productId = mysqli_real_escape_string($conn, $productId);
            $cart_id = mysqli_real_escape_string($conn, $cart_id);

            $query = "INSERT INTO chitietgiohang (MAGH, MASP, SOLUONG)
                    VALUES ('$cart_id', '$productId', 1)";
            if ($conn->query($query) === FALSE) {
                echo "Error: " . $conn->error;
            }
            // Update the session variable
            $_SESSION['product_cart'][] = $productId;
        }

        echo "Thêm sản phẩm thành công";
    } else {
        echo "Cart ID not found in session.";
    }
} else {
    echo "No product ID provided.";
}
?>
