<?php
// Include your database connection file
include 'databaseAccess.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy ID đơn hàng từ dữ liệu gửi đi
    $idDonHang = $_POST['idDonHang'];

    // Kiểm tra và xác nhận ID đơn hàng không rỗng
    if (!empty($idDonHang)) {
        // Kết nối đến cơ sở dữ liệu
        $conn = connectToDatabase();

        // Chuẩn bị câu lệnh SQL để cập nhật MASHIPPER thành NULL cho đơn hàng cụ thể
        $sql = "UPDATE HOADON SET MASHIPPER = NULL WHERE MAHD = ?";

        // Chuẩn bị và thực thi câu lệnh SQL sử dụng prepared statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idDonHang);

        // Thực thi câu lệnh SQL
        if ($stmt->execute()) {
            echo "Cập nhật MASHIPPER thành NULL thành công cho đơn hàng có ID: " . $idDonHang;
        } else {
            echo "Lỗi: " . $conn->error;
        }

        // Đóng kết nối
        $conn->close();
    } else {
        echo "ID đơn hàng không được cung cấp.";
    }
} else {
    echo "Phương thức yêu cầu không hợp lệ.";
}
?>
