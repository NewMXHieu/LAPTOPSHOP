<?php
// delete_order.php

// Include your database connection file here
include '../../config/connect.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['orderId'])) {
        $orderId = $_POST['orderId'];

        $sql_delete_chitiethoadon = "DELETE FROM chitiethoadon WHERE MAHD = $orderId";
        $result_chitiethoadon = mysqli_query($conn, $sql_delete_chitiethoadon);

        $sql_delete_hoadon = "DELETE FROM hoadon WHERE MAHD = $orderId";
        $result_hoadon = mysqli_query($conn, $sql_delete_hoadon);

        if ($result_chitiethoadon && $result_hoadon) {
            $response['success'] = true;
            $response['message'] = 'Order deleted successfully';
        } else {
            $response['message'] = 'Failed to delete order';
        }
    } else {
        $response['message'] = 'Order ID is required';
    }
} else {
    $response['message'] = 'Invalid request method';
}

header('Content-Type: application/json');
echo json_encode($response);
?>