<?php include 'databaseAccess.php' ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hàm kiểm tra trước khi gán giá trị
    function check_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // Lấy giá trị của các trường từ form sau khi kiểm tra
    $manv = isset($_POST['MANV']) ? check_input($_POST['MANV']) : '';
    $tennv = isset($_POST['TEN']) ? check_input($_POST['TEN']) : '';
    $ngaysinh = isset($_POST['NGAYSINH']) ? check_input($_POST['NGAYSINH']) : '';
    $sdt = isset($_POST['SDT']) ? check_input($_POST['SDT']) : '';
    $matk = isset($_POST['MATK']) ? check_input($_POST['MATK']) : '';
    $diachi = isset($_POST['DIACHI']) ? check_input($_POST['DIACHI']) : '';
    $email = isset($_POST['EMAIL']) ? check_input($_POST['EMAIL']) : '';
    $chucvu = isset($_POST['CHUCVU']) ? check_input($_POST['CHUCVU']) : '';
    $ngaytaotk = date("Y-m-d");
    $trangthai = 1;

    // Hiển thị các giá trị đã lấy được để kiểm tra
    echo "Mã nhân viên: " . $manv . "<br>";
    echo "Tên : " . $tennv . "<br>";
    echo "ngày sinh: " . $ngaysinh . "<br>";
    echo "sdt: " . $sdt . "<br>";
    echo "matk: " . $matk . "<br>";
    echo "email: " . $email . "<br>";
    echo "diachi: " . $diachi . "<br>";
    echo "ngày tạo tk: " . $ngaytaotk . "<br>";
    echo "trangthai: " . $trangthai . "<br>";

    $conn = connectToDatabase();


    // Hàm thêm nhân viên
    function themNhanVien($conn, $manv, $tennv, $ngaysinh, $sdt, $diachi, $matk, $email, $chucvu)
    {
        $sql_NhanVien = "INSERT INTO NHANVIEN(MANV,TEN,NGAYSINH,SDT,DIACHI,MATK,EMAIL,CHUCVU) VALUES ('$manv', '$tennv','$ngaysinh','$sdt','$diachi','$matk','$email', '$chucvu')";
        if ($conn->query($sql_NhanVien) === TRUE) {
            echo "Thêm nhân viên thành công";
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }
    function LayChucVu($chucvu){
        if($chucvu === "1")
            return 'ADMIN';
        else if ($chucvu === "2")
            return 'QUẢN LÝ';
        else if ($chucvu === "3")
            return 'KHO';
        else if ($chucvu === "4")
            return 'THU NGÂN';
    }
    if ($tennv === '') {
        echo "Thiếu tên khách hàng";
    } else if ($ngaysinh === '') {
        echo "Thiếu ngày sinh";
    } else if ($sdt === '') {
        echo "Thiếu số điện thoại";
    } else if ($diachi === '') {
        echo "Thiếu địa chỉ";
    } else if ($email === '') {
        echo "Thiếu email";
    } else {
        $chucvu = LayChucVu($chucvu);
        // Sử dụng các hàm trên
        themNhanVien($conn, $manv, $tennv, $ngaysinh, $sdt, $diachi, $matk, $email, $chucvu);
    }
}
?>