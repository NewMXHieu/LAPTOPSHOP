<?php include 'databaseAccess.php'?>
<?php
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();

// Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
$sql = "select *
FROM BAOHANH
";
$result = $conn->query($sql);
$baohanhs = [];

// Kiểm tra và xử lý kết quả
if ($result->num_rows > 0) {
    // Chuyển kết quả thành mảng JSON và trả về
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $bh = [
            'MABAOHANH' => $row['MABAOHANH'],
            'MANV' => $row['MANV'],
            'DONVIBAOHANH' => $row['DONVIBAOHANH'],
            'THOIHAN' => $row['THOIHAN'],
            'TRANGTHAI' => $row['TRANGTHAI']
        ];
        $baohanhs[] = $bh;
    }
    echo json_encode($baohanhs, JSON_UNESCAPED_UNICODE);
} 

// Đóng kết nối
$conn->close();
?>
