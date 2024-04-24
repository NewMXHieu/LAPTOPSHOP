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
    $sql_sanpham = $sql_sanpham . " LIMIT $offset, $sanpham_tren_trang";
    $query_sanpham = mysqli_query($conn, $sql_sanpham);
    $data ='';
    while ($row_sanpham = mysqli_fetch_assoc($query_sanpham)) {
        $data.= '<div class="product">';
            $data.= '<a href="product-detail?id=' .$row_sanpham['MASP']. '">';
                $data.= '<img src="static/image/products/'.$row_sanpham['HINHSP'].'"alt="">';
                $data.= '<div class="clear">';
                    $data.= '<a class="product-name" href="product-detail?id=' .$row_sanpham['MASP']. '">' .$row_sanpham['TENSP']. '</a>';
                    $data.= '<h2>' .$row_sanpham['TENTHUONGHIEU']. '</h2>';
                    $data.= '<div class="price">' . number_format($row_sanpham['GIATIEN'], 0, "", ".") . " Vnd". '</div>';
                    $data.= '<button class="addCart">Thêm <i class="fa-solid fa-plus"></i></button>';
                $data.= '</div>';
            $data.= '</a>';
        $data.= '</div>';
    }
    echo $data;
?>