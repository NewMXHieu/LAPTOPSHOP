<?php
header('Content-Type: application/json');
include '../../config/connect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Lấy dữ liệu từ yêu cầu AJAX
$productId = $_POST['productId'];
$quantity = $_POST['quantity'];
$method = $_POST['method'];


if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$MATK = $_SESSION['id'];

$tien = 0;
$tongtiensp = 0;

if ($method != 'addCart') {
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

    switch ($method) {
        case 'plus':
            $_SESSION['cart'][$productId] = $quantity;
            $tongtiensp = $product['GIATIEN'] * $quantity;
            $query = $conn->prepare('UPDATE chitietgiohang SET SOLUONG = ? WHERE MASP = ?');
            $query->bind_param('ii', $quantity, $productId);
            $query->execute();
            $tien += $product['GIATIEN'] * $soluong['SOLUONG'];
            break;
        case 'minus':
            $_SESSION['cart'][$productId] = $quantity;
            $tongtiensp = $product['GIATIEN'] * $quantity;
            $query = $conn->prepare('UPDATE chitietgiohang SET SOLUONG = ? WHERE MASP = ?');
            $query->bind_param('ii', $quantity, $productId);
            $query->execute();
            $tien += $product['GIATIEN'] * $soluong['SOLUONG'];
            break;
        case 'checkbox':
            $isChecked = isset($_POST['checked']) ? $_POST['checked'] : false;
            $_SESSION['cart'][$productId] = $quantity;
            $tongtiensp = $product['GIATIEN'] * $quantity;
            if ($isChecked) {
                $tien += $product['GIATIEN'] * $soluong['SOLUONG'];
            } else {
                $tien = -1 * $product['GIATIEN'] * $soluong['SOLUONG'];
            }
            break;
    }
    echo json_encode(['quantity' => $_SESSION['cart'][$productId], 'total' => $tongtiensp, 'checkout' => $tien]);
} else {
    $query = $conn->prepare('
    INSERT INTO giohang (MATK)
    SELECT tk.MATK
    FROM taikhoan AS tk
    JOIN phanquyen AS pq ON tk.MATK = pq.MATK
    JOIN nhomquyen AS nq ON pq.MANHOMQUYEN = nq.MANHOMQUYEN
    JOIN quyen AS q ON nq.MAQUYEN = q.MAQUYEN
    WHERE tk.MATK = ?
    AND q.MAQUYEN = 30
    AND NOT EXISTS (
        SELECT 1 
        FROM giohang 
        WHERE MATK = tk.MATK
    )');
    $query->bind_param('i', $MATK);
    $query->execute();

    $query = $conn->prepare('
    SELECT 1 FROM chitietgiohang
    WHERE MAGH = (SELECT MAGH FROM giohang WHERE MATK = ?)
    AND MASP = ?');
    $query->bind_param('ii', $MATK, $productId);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // Nếu sản phẩm đã có trong chitietgiohang, cập nhật số lượng
        $query = $conn->prepare('
        UPDATE chitietgiohang
        SET SOLUONG = SOLUONG + 1
        WHERE MAGH = (SELECT MAGH FROM giohang WHERE MATK = ?)
        AND MASP = ?');
        $query->bind_param('ii', $MATK, $productId);
    } else {
        // Nếu sản phẩm chưa có trong chitietgiohang, thêm mới với số lượng là 1
        $query = $conn->prepare('
        INSERT INTO chitietgiohang (MAGH, MASP, SOLUONG)
        SELECT GH.MAGH, ?, 1
        FROM giohang GH
        WHERE GH.MATK = ?');
        $query->bind_param('ii',$productId , $MATK);
    }
    $query->execute();


    echo json_encode(['quantity' => 0, 'total' => $tongtiensp, 'checkout' => $tien]);
}
