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
    $idTaiKhoan = isset($_POST['MATK']) ? check_input($_POST['MATK']) : '';
    $tenTaiKhoan = isset($_POST['TENDN']) ? check_input($_POST['TENDN']) : '';
    $matKhau = isset($_POST['MATKHAU']) ? check_input($_POST['MATKHAU']) : '';
    $ngayTao = isset($_POST['NGAYTAO']) ? check_input($_POST['NGAYTAO']) : '';
    $maNhomQuyen = isset($_POST['MANHOMQUYEN']) ? check_input($_POST['MANHOMQUYEN']) : '';
    $trangThai = isset($_POST['TRANGTHAI']) ? check_input($_POST['TRANGTHAI']) : '';
    if ($idTaiKhoan == "") {
        echo "Mã Tài Khoản không được để trống";
        return;
    }
    if ($tenTaiKhoan == "") {
        echo "Tên Đăng Nhập không được để trống";
        return;
    }
    if($matKhau == "") {
        echo "Mật Khẩu không được để trống";
        return;
    }
    $conn = connectToDatabase();
    function updateTaiKhoan($conn, $idTaiKhoan, $tenTaiKhoan, $matKhau, $ngayTao, $trangThai) {
        $sql_update = "UPDATE TAIKHOAN 
        SET TENDN = ?, MATKHAU = ?, NGAYTAO = ?, TRANGTHAI = ?
        WHERE MATK = ?";
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param("sssii", $tenTaiKhoan, $matKhau, $ngayTao, $trangThai, $idTaiKhoan);
        if ($stmt->execute()) {
            echo "Cập nhật tài khoản thành công";
        } else {
            echo "Lỗi: " . $conn->error;
        }
        $stmt->close();
    }
    function updateTaiKhoanNhomQuyen($conn, $idTaiKhoan, $loaiNhomQuyen) {
        $sql_update = "UPDATE phanquyen 
        SET MANHOMQUYEN = ?
        WHERE MATK = ?";
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param("ii", $loaiNhomQuyen, $idTaiKhoan);
        if (!$stmt->execute()) {
            echo "Lỗi: " . $conn->error;
        }
        $stmt->close();
    }

    updateTaiKhoan($conn, $idTaiKhoan, $tenTaiKhoan, $matKhau, $ngayTao, $trangThai);
    updateTaiKhoanNhomQuyen($conn, $idTaiKhoan, $maNhomQuyen);


    $conn->close();

} else {
    echo "không nhận được";
}
?>