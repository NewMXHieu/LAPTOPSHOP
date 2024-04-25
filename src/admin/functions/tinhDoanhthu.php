<?php include 'databaseAccess.php'?>
<?php

// Tạo kết nối
$conn = connectToDatabase();

// Truy vấn đếm số nhân viên
$sql = "SELECT SUM(GIATIEN) as total
FROM chitiethoadon
INNER JOIN chitietsanpham ON chitietsanpham.MASP = chitiethoadon.MASP
INNER JOIN HOADON ON hoadon.MAHD = chitiethoadon.MAHD
WHERE TRANGTHAI = 1
"; 
$result = mysqli_query($conn, $sql);

// Kiểm tra và gửi kết quả dưới dạng JSON
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode(array("total_doanhThu" => $row["total"]));
} else {
    echo json_encode(array("total_doanhThu" => 0));
}

// Đóng kết nối
mysqli_close($conn);
?>
