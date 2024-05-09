<?php include 'databaseAccess.php'?>
<?php

// Tạo kết nối
$conn = connectToDatabase();

// Truy vấn đếm số nhân viên
$sql = "SELECT COUNT(*) AS total FROM sanpham
"; 
$result = mysqli_query($conn, $sql);

// Kiểm tra và gửi kết quả dưới dạng JSON
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode(array("total_products" => $row["total"]));
} else {
    echo json_encode(array("total_products" => 0));
}

// Đóng kết nối
mysqli_close($conn);
?>

