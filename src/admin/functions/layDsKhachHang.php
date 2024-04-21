<?php include 'databaseAccess.php'?>
<?php
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();

// Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
$sql = "SELECT *
FROM khachhang
INNER JOIN TAIKHOAN ON taikhoan.MATK = khachhang.MATK";
$result = $conn->query($sql);
$khachhangs = [];

// Kiểm tra và xử lý kết quả
if ($result->num_rows > 0) {
    // Chuyển kết quả thành mảng JSON và trả về
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $khachhang = [
            'MAKH' => $row['MAKH'],
            'TEN' => $row['TEN'],
            'NGAYSINH' => $row['NGAYSINH'],
            'SDT' => $row['SDT'],
            'DIACHI' => $row['DIACHI'],
            'MATK' => $row['MATK'],
            'EMAIL' => $row['EMAIL'],
            'NGAYTAOTK' => $row['NGAYTAO'],
            'TENDN' => $row['TENDN'],
            'MATKHAU' => $row['MATKHAU'],
            'TRANGTHAI' => $row['TRANGTHAI'],

        ];
        $khachhangs[] = $khachhang;
    }
    echo json_encode($khachhangs, JSON_UNESCAPED_UNICODE);
} 

// Đóng kết nối
$conn->close();
?>
