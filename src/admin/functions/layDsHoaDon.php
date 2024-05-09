<?php include 'databaseAccess.php'?>
<?php
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();

// Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
$sql = "
SELECT HOADON.MAHD,khachhang.MAKH,khachhang.TEN AS TENKH ,nhanvien.MANV ,nhanvien.TEN AS TENNV,HOADON.NGAYTAO, HOADON.TRANGTHAI, HOADON.MASHIPPER, shipper.TEN AS TENSHP, (SELECT SUM(chitietsanpham.GIATIEN) FROM CHITIETHOADON INNER JOIN chitietsanpham ON chitietsanpham.MASP = chitiethoadon.MASP) AS TONGTIEN
FROM HOADON
INNER JOIN khachhang ON HOADON.MAKH = khachhang.MAKH 
INNER JOIN nhanvien ON hoadon.MANV = nhanvien.MANV
LEFT JOIN shipper ON hoadon.MASHIPPER = shipper.MASHIPPER
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
            'NGAYTAO' => $row['NGAYTAO'],
            'TRANGTHAI' => $row['TRANGTHAI'],
            'MASHIPPER' => $row['MASHIPPER'],
            'TENSHP' => $row['TENSHP'],
            'TONGTIEN' => $row['TONGTIEN']
        ];
        $hoadons[] = $hoadon;
    }
    echo json_encode($hoadons, JSON_UNESCAPED_UNICODE);
} 

// Đóng kết nối
$conn->close();
?>
