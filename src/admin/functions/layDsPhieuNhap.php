<?php include 'databaseAccess.php'?>
<?php
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();

// Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
$sql = "SELECT * FROM PHIEUNHAP";
$result = $conn->query($sql);
$phieunhaps = [];

// Kiểm tra và xử lý kết quả
if ($result->num_rows > 0) {
    // Chuyển kết quả thành mảng JSON và trả về
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $pn = [
            'MAPN' => $row['MAPN'],
            'MANV' => $row['MANV'],
            'NGAYNHAP' => $row['NGAYNHAP'],
            'TONGTIEN' => $row['TONGTIEN'],
            'TRANGTHAI' => $row['TRANGTHAI']

        ];
        $phieunhaps[] = $pn;
    }
    echo json_encode($phieunhaps, JSON_UNESCAPED_UNICODE);
} 

// Đóng kết nối
$conn->close();
?>
