<?php include 'databaseAccess.php' ?>

<?php
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();
// $sql = "SELECT * FROM QUYEN, NHOMQUYEN WHERE QUYEN.MANHOMQUYEN = NHOMQUYEN.MANHOMQUYEN";

// Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
$sql = "SELECT DISTINCT nhomquyen.MANHOMQUYEN, nhomquyen.TENNHOMQUYEN, motanhomquyen.MOTA 
FROM nhomquyen, motanhomquyen 
WHERE nhomquyen.MANHOMQUYEN = motanhomquyen.MANHOMQUYEN;";
$result = $conn->query($sql);
$nhomquyens = [];

// Kiểm tra và xử lý kết quả
if ($result->num_rows > 0) {
    // Chuyển kết quả thành mảng JSON và trả về
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $nhomquyen = [
            'MANHOMQUYEN' => $row['MANHOMQUYEN'],
            'TENNHOMQUYEN' => $row['TENNHOMQUYEN'],
            'MOTA' => $row['MOTA'],

        ];
        $nhomquyens[] = $nhomquyen;
    }
    echo json_encode($nhomquyens, JSON_UNESCAPED_UNICODE);
}

// Đóng kết nối
$conn->close();
?>