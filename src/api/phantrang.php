<?php
    include '../../config/connect.php';
    $search = $_GET['search'];
    $cost = $_GET['cost'];
    $brand = $_GET['brand'];
    $cpu = $_GET['cpu'];
    $ram = $_GET['ram'];
    $storage = $_GET['storage'];
    $loai = $_GET['loai'];
    $sanpham_tren_trang = 16;

    $sql_sanpham = "SELECT * FROM sanpham
    INNER JOIN chitietsanpham ON sanpham.MASP = chitietsanpham.MASP
    INNER JOIN thuonghieu ON chitietsanpham.MATHUONGHIEU = thuonghieu.MATHUONGHIEU
    WHERE sanpham.TRANGTHAI = 1";

    $sql_sanpham = $sql_sanpham . " AND chitietsanpham.TENSP LIKE '%".$search."%'";

    if($brand != 0){
        $sql_sanpham .= " AND chitietsanpham.MATHUONGHIEU = ".$brand."";
    }

    if($cost != 0){
        $sql_sanpham .= " AND chitietsanpham.GIATIEN ".$cost."";
    }

    if($cpu != 0){
        $sql_sanpham .= " AND chitietsanpham.CPU LIKE '%".$cpu."%'";
    }

    if($ram != 0){
        $sql_sanpham .= " AND chitietsanpham.RAM LIKE '%".$ram."%'";
    }

    if($storage != 0){
        $sql_sanpham .= " AND chitietsanpham.STORAGE LIKE '%".$storage."%'";
    }

    if($loai != 0){
        $sql_sanpham .= " INNER JOIN nhomloaisanpham ON nhomloaisanpham.MASP = sanpham.MASP 
        INNER JOIN phanloaisanpham ON phanloaisanpham.MALOAISP = nhomloaisanpham.MALOAISP
        AND phanloaisanpham.MALOAISP = ".$loai."";
    }

    $query_sanpham = mysqli_query($conn, $sql_sanpham);
    $count = mysqli_num_rows($query_sanpham);

    $page = $count % $sanpham_tren_trang == 0 ? $count / $sanpham_tren_trang : floor($count / $sanpham_tren_trang) + 1;
    echo json_encode(array(
        'page' => $page,
        'count' => $count
    ))
?>