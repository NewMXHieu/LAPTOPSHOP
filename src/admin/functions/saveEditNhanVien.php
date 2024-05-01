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
        $manv = isset($_POST['MANV']) ? check_input($_POST['MANV']) : '';
        $tennv = isset($_POST['TEN']) ? check_input($_POST['TEN']) : '';
        $ngaysinh = isset($_POST['NGAYSINH']) ? check_input($_POST['NGAYSINH']) : '';
        $sdt = isset($_POST['SDT']) ? check_input($_POST['SDT']) : '';
        $matk = isset($_POST['MATK']) ? check_input($_POST['MATK']) : '';
        $diachi = isset($_POST['DIACHI']) ? check_input($_POST['DIACHI']) : '';
        $email = isset($_POST['EMAIL']) ? check_input($_POST['EMAIL']) : '';
        $manhomquyen = isset($_POST['CHUCVU']) ? check_input($_POST['CHUCVU']) : '';
        $ngaytaotk = isset($_POST['NGAYTAOTK']) ? check_input($_POST['NGAYTAOTK']) : '';
        $tendn = isset($_POST['TENDN']) ? check_input($_POST['TENDN']) : '';
        $matkhau = isset($_POST['MATKHAU']) ? check_input($_POST['MATKHAU']) : '';
        $trangthai = isset($_POST['TRANGTHAI']) ? check_input($_POST['TRANGTHAI']) : '';

        // Hiển thị các giá trị đã lấy được để kiểm tra
        echo "Tên : " . $tennv . "<br>";
        echo "ngày sinh: " . $ngaysinh . "<br>";
        echo "sdt: " . $sdt . "<br>";
        echo "matk: " . $matk . "<br>";
        echo "email: " . $email . "<br>";
        echo "diachi: " . $diachi . "<br>";
        echo "chucvu: " . $manhomquyen . "<br>";
        echo "ngày tạo tk: " . $ngaytaotk . "<br>";
        echo "tendn: " . $tendn . "<br>";
        echo "matkhau: " . $matkhau . "<br>";
        echo "trangthai: " . $trangthai . "<br>";

        $conn = connectToDatabase();

        
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
        // Hàm thêm nhân viên
        function themNhanVien($conn, $manv, $tennv, $ngaysinh, $sdt,$diachi,$matk,$email,$chucvu) {
            $sql_nhanvien = "UPDATE nhanvien 
            SET TEN = '$tennv', NGAYSINH = '$ngaysinh', SDT = '$sdt', DIACHI = '$diachi', MATK = $matk, EMAIL = '$email', CHUCVU = '$chucvu'
            WHERE MANV = '$manv'";
            if ($conn->query($sql_nhanvien) === TRUE) {
                echo "update nhân viên thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        function xoaPhanQuyenCuu($conn, $matk){
            $sql_nhomloaisanphamcuu = "DELETE FROM PHANQUYEN
                                    WHERE MATK = '$matk';
            ";
            if ($conn->query($sql_nhomloaisanphamcuu) !== TRUE) {
                    echo "Lỗi: " . $conn->error;
            }
        }


        // Hàm thêm nhóm loại nhân viên
        function themPhanQuyen($conn, $matk, $manhomquyen) {
            xoaPhanQuyenCuu($conn, $matk);
            $sql_nhomloaisanpham = "INSERT INTO PHANQUYEN (MATK,MANHOMQUYEN) VALUES
                                        ($matk,$manhomquyen)";
                if ($conn->query($sql_nhomloaisanpham) !== TRUE) {
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
            echo "Thiếu mã nhân viên";
        } else if($tennv ==='' ){
            echo "Thiếu tên nhân viên";
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
        } else if($chucvu ===''){
            echo "Thiếu chức vụ";
        }else{
            // Sử dụng các hàm trên
            // Thêm nhân viên
            $chucvu = LayChucVu($manhomquyen);
            themNhanVien($conn, $manv, $tennv, $ngaysinh, $sdt,$diachi,$matk,$email,$chucvu);
            // Thêm nhóm loại nhân viên
            themPhanQuyen($conn, $matk, $manhomquyen);
            themTaiKhoan($conn,$matk,$tendn,$matkhau);
        }

        
    } else{
        echo "không nhận được";
    }

    // header("Location: ../../GiaoDien/admin/#content-nhanvien");
?>