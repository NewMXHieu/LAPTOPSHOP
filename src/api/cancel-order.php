<?php
// delete_order.php

// Include your database connection file here
include '../../config/connect.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['orderId'])) {
        $orderId = $_POST['orderId'];

        $sql_update_hoadon = "UPDATE hoadon SET TRANGTHAI = 4 WHERE MAHD = $orderId";
        $result_hoadon = mysqli_query($conn, $sql_update_hoadon);

        if ($result_hoadon) {
            $response['success'] = true;
            $response['message'] = 'Order updated successfully';
        } else {
            $response['message'] = 'Failed to update order';
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