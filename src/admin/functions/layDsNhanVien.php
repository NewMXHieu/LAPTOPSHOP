<?php include 'databaseAccess.php'?>
<?php
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();

// Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
$sql = "SELECT *
FROM nhanvien
INNER JOIN TAIKHOAN ON taikhoan.MATK = NHANVIEN.MATK";
$result = $conn->query($sql);
$nhanviens = [];

// Kiểm tra và xử lý kết quả
if ($result->num_rows > 0) {
    // Chuyển kết quả thành mảng JSON và trả về
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $nhanvien = [
            'MANV' => $row['MANV'],
            'TEN' => $row['TEN'],
            'NGAYSINH' => $row['NGAYSINH'],
            'SDT' => $row['SDT'],
            'DIACHI' => $row['DIACHI'],
            'MATK' => $row['MATK'],
            'EMAIL' => $row['EMAIL'],
            'NGAYTAOTK' => $row['NGAYTAO'],
            'TRANGTHAI' => $row['TRANGTHAI'],

        ];
        $nhanviens[] = $nhanvien;
    }
    echo json_encode($nhanviens, JSON_UNESCAPED_UNICODE);
} 

// Đóng kết nối
$conn->close();
?>
