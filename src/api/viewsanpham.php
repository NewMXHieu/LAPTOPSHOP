<?php
    include '../../config/connect.php';
    $search = $_GET['search'];
    $cost = $_GET['cost'];
    $brand = $_GET['brand'];
    $cpu = $_GET['cpu'];
    $ram = $_GET['ram'];
    $storage = $_GET['storage'];
    $loai = $_GET['loai'];
    $sanpham_tren_trang = 8;
    $current_page = $_GET['page'];
    $offset = ($current_page - 1) * $sanpham_tren_trang;

    $sql_sanpham = "SELECT * FROM sanpham
    INNER JOIN chitietsanpham ON sanpham.MASP = chitietsanpham.MASP
    INNER JOIN thuonghieu ON chitietsanpham.MATHUONGHIEU = thuonghieu.MATHUONGHIEU";

    $sql_sanpham .= " AND chitietsanpham.TENSP LIKE '%".$search."%'";

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
    

    // $sql_sanpham .= " LIMIT $offset, $sanpham_tren_trang";
    $query_sanpham = mysqli_query($conn, $sql_sanpham);
    $data ='';
    while ($row_sanpham = mysqli_fetch_assoc($query_sanpham)) {
        $data.= '<div class="product">';
            $data.= '<a href="product-detail?id=' .$row_sanpham['MASP']. '">';
                $data.= '<img src="static/image/products/'.$row_sanpham['HINHSP'].'"alt="">';
                $data.= '<div class="clear">';
                    $data.= '<a href="product-detail?id=' .$row_sanpham['MASP']. '">' .$row_sanpham['TENSP']. '</a>';
                    $data.= '<h2>' .$row_sanpham['TENTHUONGHIEU']. '</h2>';
                    $data.= '<div class="price">' . number_format($row_sanpham['GIATIEN'], 0, "", ".") . " Vnd". '</div>';
                    $data.= '<button class="addCart">Thêm <i class="fa-solid fa-plus"></i></button>';
                $data.= '</div>';
            $data.= '</a>';
        $data.= '</div>';
    }
    echo $data;
?>