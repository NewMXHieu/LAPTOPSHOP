<?php 
include 'databaseAccess.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hàm kiểm tra trước khi gán giá trị
    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Lấy giá trị của các trường từ form sau khi kiểm tra
    $masp = isset($_POST['idDonHang']) ? check_input($_POST['idDonHang']) : '';
    $trangthai = isset($_POST['trangthai']) ? check_input($_POST['trangthai']) : '';
    $shipper = isset($_POST['shipper']) ? check_input($_POST['shipper']) : '';

    // Hiển thị các giá trị đã lấy được để kiểm tra
    echo "Mã Đơn Hàng: " . $masp . "<br>";
    echo "Trạng thái: " . $trangthai . "<br>";
    echo "Shipper: " . $shipper . "<br>";

    $conn = connectToDatabase();

    // Hàm thêm sản phẩm
    function updateTrangThaiDonHang($conn, $masp, $trangthai, $shipper) {
        $sql_update = "UPDATE HOADON 
        SET TRANGTHAI = ?, MASHIPPER = ?
        WHERE MAHD = ?";
        
        // Sử dụng câu lệnh chuẩn bị trước để ngăn chặn SQL Injection
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param("iii", $trangthai, $shipper, $masp);
        
        if ($stmt->execute()) {
            echo "Update trạng thái hóa đơn thành công";
        } else {
            echo "Lỗi: " . $conn->error;
        }
        
        $stmt->close();
    }

    // Sử dụng hàm để cập nhật trạng thái đơn hàng
    updateTrangThaiDonHang($conn, $masp, $trangthai, $shipper);

    // Đóng kết nối
    $conn->close();

} else {
    echo "không nhận được";
}
?>
