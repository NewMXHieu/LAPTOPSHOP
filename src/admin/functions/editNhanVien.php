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
        $manv = isset($_POST['idNhanVien']) ? check_input($_POST['idNhanVien']) : '';
        $tennv = isset($_POST['editNhanVien_ten']) ? check_input($_POST['editNhanVien_ten']) : '';
        $ngaysinh = isset($_POST['editNhanVien_ngaysinh']) ? check_input($_POST['editNhanVien_ngaysinh']) : '';
        $sdt = isset($_POST['editNhanVien_sdt']) ? check_input($_POST['editNhanVien_sdt']) : '';
        $matk = isset($_POST['editNhanVien_taikhoan']) ? check_input($_POST['editNhanVien_taikhoan']) : '';
        $diachi = isset($_POST['addProduct_diachi']) ? check_input($_POST['addProduct_diachi']) : '';
        $email = isset($_POST['editNhanVien_email']) ? check_input($_POST['editNhanVien_email']) : '';
        $chucvu = isset($_POST['addProduct_select_loaitk']) ? check_input($_POST['addProduct_select_loaitk']) : '';
        $ngaytaotk = isset($_POST['editNhanVien_ngaytaotk']) ? check_input($_POST['editNhanVien_ngaytaotk']) : '';
        $tendn = isset($_POST['editNhanVien_tendangnhap']) ? check_input($_POST['editNhanVien_tendangnhap']) : '';
        $matkhau = isset($_POST['editNhanVien_matkhau']) ? check_input($_POST['editNhanVien_matkhau']) : '';
        $trangthai = isset($_POST['editNhanVien_trangthai']) ? check_input($_POST['editNhanVien_trangthai']) : '';

        // Hiển thị các giá trị đã lấy được để kiểm tra
        echo "Tên : " . $tennv . "<br>";
        echo "ngày sinh: " . $ngaysinh . "<br>";
        echo "sdt: " . $sdt . "<br>";
        echo "matk: " . $matk . "<br>";
        echo "email: " . $email . "<br>";
        echo "diachi: " . $diachi . "<br>";
        echo "chucvu: " . $chucvu . "<br>";
        echo "ngày tạo tk: " . $ngaytaotk . "<br>";
        echo "tendn: " . $tendn . "<br>";
        echo "matkhau: " . $matkhau . "<br>";
        echo "trangthai: " . $trangthai . "<br>";

        $conn = connectToDatabase();

        
        
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

        function layMaNhomQuyen($chucvu){
            $chucvu = strtoupper($chucvu);
            if($chucvu === "ADMIN")
                return 'AD';
            else if ($chucvu === "QUẢN LÝ")
                return 'QL';
            else if ($chucvu === "THU NGÂN")
                return 'TN';
            else if ($chucvu === "KHO")
                return 'KHO';
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
        

        if( $manv === '' || $tennv ==='' || $ngaysinh ==='' || $sdt ==='' ||$diachi ==='' ||$matk ==='' ||$email ==='' ||$chucvu ===''){
            echo "Vui lòng nhập dữ liệu";
        } else{
            // Sử dụng các hàm trên
            // Thêm nhân viên
            themNhanVien($conn, $manv, $tennv, $ngaysinh, $sdt,$diachi,$matk,$email,$chucvu);
            // Thêm nhóm loại nhân viên
            $manhomquyen = layMaNhomQuyen($chucvu);
            themPhanQuyen($conn, $matk, $manhomquyen);
        }

        
    } else{
        echo "không nhận được";
    }

    // header("Location: ../../GiaoDien/admin/#content-nhanvien");
?>