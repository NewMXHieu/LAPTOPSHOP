<?php include 'databaseAccess.php'?>
<?php

// Tạo kết nối
$conn = connectToDatabase();

// Kiểm tra và gửi kết quả dưới dạng JSON
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hàm kiểm tra trước khi gán giá trị
    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // Lấy giá trị của các trường từ form sau khi kiểm tra
    $MALOAISP = isset($_POST['idLoaiSP']) ? check_input($_POST['idLoaiSP']) : '';

    // Hiển thị các giá trị đã lấy được để kiểm tra
    $conn = connectToDatabase();

    
    
    // Hàm thêm sản phẩm
    function themSanPham($conn, $MALOAISP) {
        $sql_sanpham = '';

        if($MALOAISP === '0'){
            $sql_sanpham = "SELECT SUM(GIATIEN) as total
            FROM chitiethoadon
            INNER JOIN chitietsanpham ON chitietsanpham.MASP = chitiethoadon.MASP
            INNER JOIN HOADON ON HOADON.MAHD = chitiethoadon.MAHD
            INNER JOIN nhomloaisanpham ON nhomloaisanpham.MASP = chitiethoadon.MASP
            WHERE hoadon.TRANGTHAI = 1";
        } else{
            $sql_sanpham = "SELECT SUM(GIATIEN) as total
            FROM chitiethoadon
            INNER JOIN chitietsanpham ON chitietsanpham.MASP = chitiethoadon.MASP
            INNER JOIN HOADON ON HOADON.MAHD = chitiethoadon.MAHD
            INNER JOIN nhomloaisanpham ON nhomloaisanpham.MASP = chitiethoadon.MASP
            WHERE hoadon.TRANGTHAI = 1 AND nhomloaisanpham.MALOAISP = $MALOAISP";
        }
        $result = mysqli_query($conn, $sql_sanpham);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            // Trả về dữ liệu dưới dạng JSON
            echo json_encode($row);
        } else {
            // Trường hợp có lỗi, trả về một JSON rỗng hoặc một thông báo lỗi
            echo json_encode(0);
        }
    }

    // Sử dụng các hàm trên
    // Thêm sản phẩm
    themSanPham($conn, $MALOAISP);

} else{
    echo "không nhận được";
}
// Đóng kết nối
mysqli_close($conn);
?>
