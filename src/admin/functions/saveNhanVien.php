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
        $tennv = isset($_POST['TEN']) ? check_input($_POST['TEN']) : '';
        $ngaysinh = isset($_POST['NGAYSINH']) ? check_input($_POST['NGAYSINH']) : '';
        $sdt = isset($_POST['SDT']) ? check_input($_POST['SDT']) : '';
        $matk = isset($_POST['MATK']) ? check_input($_POST['MATK']) : '';
        $diachi = isset($_POST['DIACHI']) ? check_input($_POST['DIACHI']) : '';
        $email = isset($_POST['EMAIL']) ? check_input($_POST['EMAIL']) : '';
        $nhomquyen = isset($_POST['CHUCVU']) ? check_input($_POST['CHUCVU']) : '';
        $ngaytaotk = date("Y-m-d");
        $tendn = isset($_POST['TENDN']) ? check_input($_POST['TENDN']) : '';
        $matkhau = isset($_POST['MATKHAU']) ? check_input($_POST['MATKHAU']) : '';
        $trangthai = 1;

        // Hiển thị các giá trị đã lấy được để kiểm tra
        echo "Tên : " . $tennv . "<br>";
        echo "ngày sinh: " . $ngaysinh . "<br>";
        echo "sdt: " . $sdt . "<br>";
        echo "matk: " . $matk . "<br>";
        echo "email: " . $email . "<br>";
        echo "diachi: " . $diachi . "<br>";
        echo "chucvu: " . $nhomquyen . "<br>";
        echo "ngày tạo tk: " . $ngaytaotk . "<br>";
        echo "tendn: " . $tendn . "<br>";
        echo "matkhau: " . $matkhau . "<br>";
        echo "trangthai: " . $trangthai . "<br>";

        $conn = connectToDatabase();

        function themTaiKhoan($conn,$ngaytaotk,$tendn,$matkhau,$trangthai){
            $sql_taikhoan = "INSERT INTO TAIKHOAN(NGAYTAO,TENDN,MATKHAU,TRANGTHAI) VALUES ('$ngaytaotk','$tendn','$matkhau',$trangthai)";
            if ($conn->query($sql_taikhoan) === TRUE) {
                echo "Thêm tài khoản thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }
        
        function layMaTK($conn){
            $sql_laymanv = "SELECT COUNT(*) AS total FROM TAIKHOAN";
            $result = $conn->query($sql_laymanv);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row["total"];
            } else {
                return 0;
            }
        }
        
        // Hàm thêm nhân viên
        function themNhanVien($conn, $tennv, $ngaysinh, $sdt,$diachi,$matk,$email,$chucvu) {
            $sql_NhanVien = "INSERT INTO NHANVIEN(TEN,NGAYSINH,SDT,DIACHI,MATK,EMAIL,CHUCVU) VALUES ('$tennv','$ngaysinh','$sdt','$diachi','$matk','$email','$chucvu')";
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

        function themPhanQuyen($conn,$matk,$manhomquyen){
            $sql_PhanQuyen = "INSERT INTO PHANQUYEN(MATK,MANHOMQUYEN) VALUES ('$matk','$manhomquyen')";
            if ($conn->query($sql_PhanQuyen) === TRUE) {
                echo "Thêm phân quyền tài khoản thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }
        if($tennv ==='' ){
            echo "Thiếu tên khách hàng";
        } else if($ngaysinh ==='' ){
            echo "Thiếu ngày sinh";
        } else if($sdt ===''){
            echo "Thiếu số điện thoại";
        } else if($diachi ===''){
            echo "Thiếu địa chỉ";
        } else if($email ===''){
            echo "Thiếu email";
        } else{
    // Sử dụng các hàm trên
            // Thêm nhân viên
            themTaiKhoan($conn,$ngaytaotk,$tendn,$matkhau,$trangthai);
            $matk = layMaTK($conn);
            $chucvu = LayChucVu($nhomquyen);
            themNhanVien($conn, $tennv, $ngaysinh, $sdt,$diachi,$matk,$email,$chucvu);
            themPhanQuyen($conn, $matk,$nhomquyen);
        }
    }
?>