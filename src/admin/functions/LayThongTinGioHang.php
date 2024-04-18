<?php include 'databaseAccess.php'?>
<?php
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();

if (isset($_POST['idGioHang'])) {
    // Nhận id từ yêu cầu POST
    $id = $_POST['idGioHang'];
    // Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
    $sql = "select * from GIOHANG WHERE MAGH = $id;";
    $result = $conn->query($sql);
    // Kiểm tra xem truy vấn có thành công không
    if ($result) {
        // Lặp qua các hàng kết quả và thêm chúng vào mảng response
        while ($row = $result->fetch_assoc()) {
            $sp = [
                'MAGH' => $row['MAGH'],
                'MASP' => $row['MASP'],
                'SOLUONG' => $row['SOLUONG'],
                'DONGIA' => $row['DONGIA'],
    
            ];
            $giohangs[] = $sp;
        }

        // Trả về mảng response dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($giohangs);
    } else {
        // Trả về thông báo lỗi nếu truy vấn không thành công
        $giohangs['error'] = "Không thể lấy dữ liệu từ cơ sở dữ liệu";
        echo json_encode($giohangs);
    }
}


// Đóng kết nối
$conn->close();
?>
