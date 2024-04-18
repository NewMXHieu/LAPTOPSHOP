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
        $manv = isset($_POST['idKhachHang']) ? check_input($_POST['idKhachHang']) : '';
        $tennv = isset($_POST['editKhachHang_ten']) ? check_input($_POST['editKhachHang_ten']) : '';
        $ngaysinh = isset($_POST['editKhachHang_ngaysinh']) ? check_input($_POST['editKhachHang_ngaysinh']) : '';
        $sdt = isset($_POST['editKhachHang_sdt']) ? check_input($_POST['editKhachHang_sdt']) : '';
        $matk = isset($_POST['editKhachHang_taikhoan']) ? check_input($_POST['editKhachHang_taikhoan']) : '';
        $diachi = isset($_POST['editKhachHang_diachi']) ? check_input($_POST['editKhachHang_diachi']) : '';
        $email = isset($_POST['editKhachHang_email']) ? check_input($_POST['editKhachHang_email']) : '';
        $ngaytaotk = isset($_POST['editKhachHang_ngaytaotk']) ? check_input($_POST['editKhachHang_ngaytaotk']) : '';
        $tendn = isset($_POST['editKhachHang_tendangnhap']) ? check_input($_POST['editKhachHang_tendangnhap']) : '';
        $matkhau = isset($_POST['editKhachHang_matkhau']) ? check_input($_POST['editKhachHang_matkhau']) : '';

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

        function themTaiKhoan($conn,$tendn,$matkhau){
            $sql_TaiKhoan = "UPDATE TAIKHOAN 
            SET MATKHAU = '$matkhau'
            WHERE TENDN = '$tendn'";
            if ($conn->query($sql_TaiKhoan) === TRUE) {
                echo "update Tài khoản thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        if( $manv === '' || $tennv ==='' || $ngaysinh ==='' || $sdt ==='' ||$diachi ==='' ||$matk ==='' ||$email ===''){
            echo "Vui lòng nhập dữ liệu";
        } else{
            // Sử dụng các hàm trên
            // Thêm khách hàng
            themKhachHang($conn, $manv, $tennv, $ngaysinh, $sdt,$diachi,$matk,$email);
            themTaiKhoan($conn,$tendn,$matkhau);
        }

        
    } else{
        echo "không nhận được";
    }

    // header("Location: ../../GiaoDien/admin/#content-khachhang");
?>