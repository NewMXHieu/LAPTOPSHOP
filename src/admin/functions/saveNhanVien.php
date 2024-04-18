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
        $tennv = isset($_POST['addNhanVien_ten']) ? check_input($_POST['addNhanVien_ten']) : '';
        $ngaysinh = isset($_POST['addNhanVien_ngaysinh']) ? check_input($_POST['addNhanVien_ngaysinh']) : '';
        $sdt = isset($_POST['addNhanVien_sdt']) ? check_input($_POST['addNhanVien_sdt']) : '';
        $matk = isset($_POST['addNhanVien_taikhoan']) ? check_input($_POST['addNhanVien_taikhoan']) : '';
        $diachi = isset($_POST['addNhanVien_diachi']) ? check_input($_POST['addNhanVien_diachi']) : '';
        $email = isset($_POST['addNhanVien_email']) ? check_input($_POST['addNhanVien_email']) : '';
        $nhomquyen = isset($_POST['addNhanVien_select_loaitk']) ? check_input($_POST['addNhanVien_select_loaitk']) : '';
        $ngaytaotk = date("Y-m-d");
        $tendn = isset($_POST['addNhanvien_tendangnhap']) ? check_input($_POST['addNhanvien_tendangnhap']) : '';
        $matkhau = isset($_POST['addNhanVien_matkhau']) ? check_input($_POST['addNhanVien_matkhau']) : '';
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
            if($chucvu === "AD")
                return 'ADMIN';
            else if ($chucvu === "QL")
                return 'QUẢN LÝ';
            else if ($chucvu === "TN")
                return 'THU NGÂN';
            else if ($chucvu === "KHO")
                return 'KHO';
        }

        function themPhanQuyen($conn,$matk,$manhomquyen){
            $sql_PhanQuyen = "INSERT INTO PHANQUYEN(MATK,MANHOMQUYEN) VALUES ('$matk','$manhomquyen')";
            if ($conn->query($sql_PhanQuyen) === TRUE) {
                echo "Thêm phân quyền tài khoản thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        // Sử dụng các hàm trên
        // Thêm nhân viên
        themTaiKhoan($conn,$ngaytaotk,$tendn,$matkhau,$trangthai);
        $matk = layMaTK($conn);
        echo $matk;
        $chucvu = LayChucVu($nhomquyen);
        themNhanVien($conn, $tennv, $ngaysinh, $sdt,$diachi,$matk,$email,$chucvu);

        themPhanQuyen($conn, $matk,$nhomquyen);

    }
    header("Location: ../../GiaoDien/admin/#content-nhanvien");
?>