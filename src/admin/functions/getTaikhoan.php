<?php
include 'databaseAccess.php';
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();

// Khởi tạo một mảng kết hợp để lưu trữ dữ liệu
$taikhoans = [];

// Truy vấn cơ sở dữ liệu để lấy dữ liệu tài khoản

$sql = "SELECT DISTINCT taikhoan.MATK, taikhoan.TENDN, taikhoan.MATKHAU, taikhoan.NGAYTAO, taikhoan.TRANGTHAI, nhomquyen.MANHOMQUYEN, nhomquyen.TENNHOMQUYEN 
FROM taikhoan 
INNER JOIN phanquyen ON taikhoan.MATK = phanquyen.MATK 
INNER JOIN nhomquyen ON phanquyen.MANHOMQUYEN = nhomquyen.MANHOMQUYEN";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $taikhoan = [
            'MATK' => $row['MATK'],
            'TENDN' => $row['TENDN'],
            'MATKHAU' => $row['MATKHAU'],
            'NGAYTAO' => $row['NGAYTAO'],
            'TRANGTHAI' => $row['TRANGTHAI'],
            'MANHOMQUYEN' => $row['MANHOMQUYEN'],
            'TENNHOMQUYEN' => $row['TENNHOMQUYEN'],
        ];
        $taikhoans[] = $taikhoan;
    }
}

// Chuyển kết quả thành mảng JSON và trả về

echo json_encode($taikhoans);

// Đóng kết nối đến cơ sở dữ liệu

$conn->close();
?>