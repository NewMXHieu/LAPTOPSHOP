<?php include 'databaseAccess.php'?>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Hàm kiểm tra trước khi gán giá trị
        function check_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        // Lấy giá trị của các trường từ form sau khi kiểm tra
        $manv = isset($_POST['MAKH']) ? check_input($_POST['MAKH']) : '';
        $tennv = isset($_POST['TEN']) ? check_input($_POST['TEN']) : '';
        $ngaysinh = isset($_POST['NGAYSINH']) ? check_input($_POST['NGAYSINH']) : '';
        $sdt = isset($_POST['SDT']) ? check_input($_POST['SDT']) : '';
        $matk = isset($_POST['MATK']) ? check_input($_POST['MATK']) : '';
        $diachi = isset($_POST['DIACHI']) ? check_input($_POST['DIACHI']) : '';
        $email = isset($_POST['EMAIL']) ? check_input($_POST['EMAIL']) : '';
        $ngaytaotk = isset($_POST['NGAYTAOTK']) ? check_input($_POST['NGAYTAOTK']) : '';
        $tendn = isset($_POST['TENDN']) ? check_input($_POST['TENDN']) : '';
        $matkhau = isset($_POST['MATKHAU']) ? check_input($_POST['MATKHAU']) : '';

        // Hiển thị các giá trị đã lấy được để kiểm tra
        echo "Tên : " . $tennv . "<br>";
        echo "ngày sinh: " . $ngaysinh . "<br>";
        echo "sdt: " . $sdt . "<br>";
        echo "matk: " . $matk . "<br>";
        echo "email: " . $email . "<br>";
        echo "diachi: " . $diachi . "<br>";
        echo "ngày tạo tk: " . $ngaytaotk . "<br>";
        echo "tendn: " . $tendn . "<br>";
        echo "matkhau: " . $matkhau . "<br>";

        $conn = connectToDatabase();

        
        
        // Hàm thêm khách hàng
        function themKhachHang($conn, $manv, $tennv, $ngaysinh, $sdt,$diachi,$matk,$email) {
            $sql_KhachHang = "UPDATE KhachHang 
            SET TEN = '$tennv', NGAYSINH = '$ngaysinh', SDT = '$sdt', DIACHI = '$diachi', MATK = $matk, EMAIL = '$email'
            WHERE MAKH = '$manv'";
            if ($conn->query($sql_KhachHang) === TRUE) {
                echo "update khách hàng thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        function themTaiKhoan($conn,$matk, $tendn,$matkhau){
            $sql_TaiKhoan = "UPDATE TAIKHOAN 
            SET MATKHAU = '$matkhau', TENDN = '$tendn'
            WHERE MATK = $matk";
            if ($conn->query($sql_TaiKhoan) === TRUE) {
                echo "update Tài khoản thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        if( $manv === ''){
            echo "Thiếu mã khách hàng";
        } else if($tennv ==='' ){
            echo "Thiếu tên khách hàng";
        } else if($ngaysinh ==='' ){
            echo "Thiếu ngày sinh";
        } else if($sdt ===''){
            echo "Thiếu số điện thoại";
        } else if($diachi ===''){
            echo "Thiếu địa chỉ";
        } else if($matk ===''){
            echo "Thiếu mã tài khoản";
        } else if($email ===''){
            echo "Thiếu email";
        } else{
            // Sử dụng các hàm trên
            // Thêm khách hàng
            themKhachHang($conn, $manv, $tennv, $ngaysinh, $sdt,$diachi,$matk,$email);
            themTaiKhoan($conn,$matk,$tendn,$matkhau);
        }
        
    } else{
        echo "không nhận được";
    }

    // header("Location: ../../GiaoDien/admin/#content-khachhang");
?>