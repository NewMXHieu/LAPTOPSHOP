<?php
include '../../config/connect.php';
$ID = $_GET['id'];
$soluong = 0;
$cart_query = "SELECT SOLUONG
            FROM chitietgiohang
            JOIN giohang ON giohang.MAGH = chitietgiohang.MAGH
            JOIN khachhang ON khachhang.MAKH = giohang.MAKH
            WHERE khachhang.MATK = $ID";

$result_cart = mysqli_query($conn, $cart_query);
while ($item = mysqli_fetch_assoc($result_cart)){
    $soluong += $item['SOLUONG'];
}
echo $soluong;
?>