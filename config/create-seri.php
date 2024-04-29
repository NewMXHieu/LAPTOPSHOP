<?php
// Kết nối đến cơ sở dữ liệu
include "connect.php";

if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Lấy danh sách sản phẩm từ bảng sanpham
$query = "SELECT MASP, SOLUONG FROM sanpham";
$result = $conn->query($query);

// Kiểm tra kết quả
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $prod_id = $row["MASP"];
        $prod_quantity = $row["SOLUONG"];

        // Kiểm tra xem sản phẩm đã có mã seri hay chưa
        $check_query = "SELECT COUNT(*) as total FROM serial WHERE MASP = $prod_id";
        $check_result = $conn->query($check_query);
        $check_row = $check_result->fetch_assoc();
        $existing_serials = $check_row["total"];

        // Nếu số lượng mã seri đã tạo cho sản phẩm này chưa đạt số lượng quy định
        if ($existing_serials < $prod_quantity) {
            // Tạo số seri cho mỗi sản phẩm
            $serial_prefix = 'SN' . str_pad($prod_id, 4, '0', STR_PAD_LEFT);
            $serial_count = $prod_quantity - $existing_serials;
            
            for ($i = 0; $i < $serial_count; $i++) {
                $serial_no = $serial_prefix . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
                
                // Thêm số seri vào bảng serial
                $insert_query = "INSERT INTO serial (MASERI, MASP) VALUES ('$serial_no', '$prod_id')";
                $conn->query($insert_query);
            }

            echo "Tạo mã seri mới cho sản phẩm có MASP $prod_id.<br>";
        } else {
            echo "Sản phẩm có MASP $prod_id đã có đủ số lượng mã seri.<br>";
        }
    }
} else {
    echo "Không có sản phẩm nào trong cơ sở dữ liệu.";
}

// Đóng kết nối
$conn->close();
?>
