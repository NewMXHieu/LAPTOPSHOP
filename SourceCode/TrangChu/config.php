<?php

$conn = new mysqli("localhost", "root","","cuahanglaptop");
$sql_sanpham = "SELECT * FROM sanpham, chitietsanpham WHERE sanpham.MASP = chitietsanpham.MASP";
$query_sanpham = mysqli_query($conn,$sql_sanpham);
$sql_sanpham1 = "SELECT * FROM sanpham, chitietsanpham WHERE sanpham.MASP = chitietsanpham.MASP and sanpham.MANCC = '6'";
$query_sanpham1 = mysqli_query($conn, $sql_sanpham1);
$sql_sanpham2 = "SELECT * FROM sanpham, chitietsanpham WHERE sanpham.MASP = chitietsanpham.MASP and sanpham.MANCC = '4'";
$query_sanpham2 = mysqli_query($conn, $sql_sanpham2);
$sql_sanpham3 = "SELECT * FROM sanpham, chitietsanpham WHERE sanpham.MASP = chitietsanpham.MASP and sanpham.MANCC = '7'";
$query_sanpham3 = mysqli_query($conn, $sql_sanpham3);

?>