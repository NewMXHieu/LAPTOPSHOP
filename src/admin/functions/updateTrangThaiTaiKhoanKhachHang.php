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
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true);

        // Lấy giá trị của các trường từ form sau khi kiểm tra
        $masp = isset($data['idProduct']) ? check_input($data['idProduct']) : '';
        $trangthai = isset($data['TrangThai']) ? check_input($data['TrangThai']) : '';

        // Hiển thị các giá trị đã lấy được để kiểm tra
        echo "Mã : " . $masp . "<br>";
        echo "Trạng thái: " . $trangthai . "<br>";

        // Kết nối đến cơ sở dữ liệu
        $conn = connectToDatabase();

        // Hàm lấy mã tài khoản từ mã nhân viên
        function layMatk($conn, $id) {
            $sql = "SELECT MATK FROM KHACHHANG WHERE MAKH = '$id'";
            $result = $conn->query($sql);
            
            // Xử lý kết quả trả về
            if ($result->num_rows > 0) {
                // Duyệt qua mỗi hàng kết quả
                while($row = $result->fetch_assoc()) {
                    return $row['MATK'];
                }
            } else {
                echo "Không tìm thấy mã tài khoản cho khách hàng";
                return null; // Trả về null nếu không tìm thấy
            }
        }

        // Lấy mã tài khoản
        $matk = layMatk($conn, $masp);

        // Hàm thêm sản phẩm
        function themTaiKhoan($conn, $matk, $trangthai) {
            $sql_sanpham = "UPDATE taikhoan 
            SET TRANGTHAI = '$trangthai'
            WHERE MATK = '$matk'";
            if ($conn->query($sql_sanpham) === TRUE) {
                echo "Update trạng thái tài khoản thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        // Sử dụng hàm để thêm tài khoản
        themTaiKhoan($conn, $matk, $trangthai);

    } else {
        echo "Không nhận được dữ liệu";
    }
?>
