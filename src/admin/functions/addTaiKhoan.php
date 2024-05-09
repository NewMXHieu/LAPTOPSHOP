<?php
include 'databaseAccess.php';

$conn = connectToDatabase();

// Get the POST data
$MATK = $_POST['MATK'];
$TENDN = $_POST['TENDN'];
$MATKHAU = $_POST['MATKHAU'];
$NGAYTAO = $_POST['NGAYTAO'];
$MANHOMQUYEN = $_POST['MANHOMQUYEN'];
$TRANGTHAI = $_POST['TRANGTHAI'];

function addTaiKhoan($conn, $MATK, $TENDN, $MATKHAU, $NGAYTAO, $MANHOMQUYEN, $TRANGTHAI) {
    // Prepare an SQL statement for taikhoan
    $stmt = $conn->prepare("INSERT INTO taikhoan (MATK, TENDN, MATKHAU, NGAYTAO, TRANGTHAI) VALUES (?, ?, ?, ?, ?)");

    // Bind the parameters
    $stmt->bind_param("issss", $MATK, $TENDN, $MATKHAU, $NGAYTAO, $TRANGTHAI);

    // Execute the statement
    $stmt->execute();
    $stmt->close();

    // Prepare an SQL statement for phanquyen
    $stmt = $conn->prepare("INSERT INTO phanquyen (MATK, MANHOMQUYEN) VALUES (?, ?)");
    $stmt->bind_param("ii", $MATK, $MANHOMQUYEN);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Thêm tài khoản thành công";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

addTaiKhoan($conn, $MATK, $TENDN, $MATKHAU, $NGAYTAO, $MANHOMQUYEN, $TRANGTHAI);
$conn->close();
?>