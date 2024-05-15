<?php
header('Content-Type: application/json');
include 'connect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Lấy dữ liệu từ yêu cầu AJAX
$productId = $_POST['productId'];
$quantity = $_POST['quantity'];
$method = $_POST['method'];

// Lấy giá của sản phẩm từ cơ sở dữ liệu
$query = $conn->prepare('SELECT GIATIEN FROM chitietsanpham WHERE MASP = ?');
$query->bind_param('i', $productId);
$query->execute();
$result = $query->get_result();
$product = $result->fetch_assoc();

$query = $conn->prepare('SELECT SOLUONG FROM chitietgiohang WHERE MASP = ?');
$query->bind_param('i', $productId);
$query->execute();
$result = $query->get_result();
$soluong = $result->fetch_assoc();
//update số lượng sản phẩm

if (!$product) {
    echo json_encode(['error' => 'Không tìm thấy sản phẩm']);
    exit;
}

// Cập nhật số lượng và tổng tiền
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$tien = 0; 
$tongtiensp = 0;

switch ($method) {
    case 'plus':
        $_SESSION['cart'][$productId] = $quantity;
        $tongtiensp = $product['GIATIEN'] * $quantity;
        $query = $conn->prepare('UPDATE chitietgiohang SET SOLUONG = ? WHERE MASP = ?');
        $query->bind_param('ii', $quantity, $productId);
        $query->execute();
        break;
    case 'minus':
        $_SESSION['cart'][$productId] = $quantity;
        $tongtiensp = $product['GIATIEN'] * $quantity;
        $query = $conn->prepare('UPDATE chitietgiohang SET SOLUONG = ? WHERE MASP = ?');
        $query->bind_param('ii', $quantity, $productId);
        $query->execute();
        break;
    case 'checkbox':
        $isChecked = isset($_POST['checked']) ? $_POST['checked'] : false;
        $_SESSION['cart'][$productId] = $quantity;
        $tongtiensp = $product['GIATIEN'] * $quantity;
        if ($isChecked) {
            $tien += $product['GIATIEN'] * $soluong['SOLUONG'];
        } else {
            $tien = -1* $product['GIATIEN'] * $soluong['SOLUONG'];
        }
        break;
}
echo json_encode(['quantity' => $_SESSION['cart'][$productId], 'total' => $tongtiensp, 'checkout' => $tien]);
