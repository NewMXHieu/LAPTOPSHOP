<?php
include 'databaseAccess.php';
$conn = connectToDatabase();

// Lấy ID của hóa đơn từ yêu cầu
$idDonHang = $_POST['idDonHang'];

// Tạo câu lệnh SQL để xóa các bản ghi con từ chitiethoadon
$sql = "DELETE FROM chitiethoadon WHERE MAHD = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idDonHang);
$stmt->execute();
$sql = "DELETE FROM diachidathang WHERE MAHD = ?";

$stmt = $conn->prepare($sql);

// Gán giá trị cho tham số

$stmt->bind_param("i", $idDonHang);

// Thực thi câu lệnh

if ($stmt->execute()) {
    echo "deleted successfully";
} else {
    echo "Lỗi: ". $stmt->error;
}

// Tạo câu lệnh SQL để xóa hóa đơn
$sql = "DELETE FROM HOADON WHERE MAHD = ?";
// Chuẩn bị câu lệnh SQL
$stmt = $conn->prepare($sql);

// Gán giá trị cho tham số
$stmt->bind_param("i", $idDonHang);

// Thực thi câu lệnh
if ($stmt->execute()) {
    echo "deleted successfully";
} else {
    echo "Lỗi: " . $stmt->error;
}

// Đóng kết nối
$conn->close();
?>