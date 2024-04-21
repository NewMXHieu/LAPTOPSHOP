<?php
    include '../../config/connect.php';
    $search = $_GET['search'];
    $sanpham_tren_trang = 8;

    // Lấy số trang hiện tại từ tham số truyền vào hoặc mặc định là trang 1
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Tính toán OFFSET cho truy vấn SQL
    $offset = ($current_page - 1) * $sanpham_tren_trang;
    $sql_sanpham = "SELECT * FROM sanpham, chitietsanpham, thuonghieu WHERE sanpham.MASP = chitietsanpham.MASP AND chitietsanpham.MATHUONGHIEU = thuonghieu.MATHUONGHIEU";
    $sql_sanpham = $sql_sanpham . " AND chitietsanpham.TENSP LIKE '%".$search."%'";
    // $sql_sanpham = $sql_sanpham . " LIMIT $offset, $sanpham_tren_trang";
    $query_sanpham = mysqli_query($conn, $sql_sanpham);
    $count = mysqli_num_rows($query_sanpham);

    $page = $count % $sanpham_tren_trang == 0 ? $count / $sanpham_tren_trang : floor($count / $sanpham_tren_trang) + 1;
    echo $page;
?>