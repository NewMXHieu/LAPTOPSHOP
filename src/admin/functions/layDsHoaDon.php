<?php include 'databaseAccess.php'?>
<?php
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();

// Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
$sql = "SELECT HOADON.MAHD,khachhang.MAKH,khachhang.TEN AS TENKH ,nhanvien.MANV ,nhanvien.TEN AS TENNV,giohang.MAGH,CHITIETHOADON.NGAYTAO, CHITIETHOADON.TRANGTHAI
FROM hoadon INNER JOIN chitiethoadon ON HOADON.MAHD = chitiethoadon.MAHD 
INNER JOIN giohang ON HOADON.MAGH = giohang.MAGH 
INNER JOIN khachhang ON HOADON.MAKH = khachhang.MAKH 
INNER JOIN nhanvien ON hoadon.MANV = nhanvien.MANV
GROUP BY HOADON.MAHD
";
$result = $conn->query($sql);
$hoadons = [];

// Kiểm tra và xử lý kết quả
if ($result->num_rows > 0) {
    // Chuyển kết quả thành mảng JSON và trả về
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $hoadon = [
            'MAHD' => $row['MAHD'],
            'MAKH' => $row['MAKH'],
            'TENKH' => $row['TENKH'],
            'MANV' => $row['MANV'],
            'TENNV' => $row['TENNV'],
            'MAGH' => $row['MAGH'],
            'NGAYTAO' => $row['NGAYLAP'],
            'TRANGTHAI' => $row['TRANGTHAI']

        ];
        $hoadons[] = $hoadon;
    }
    echo json_encode($hoadons, JSON_UNESCAPED_UNICODE);
} 

// Đóng kết nối
$conn->close();
?>
