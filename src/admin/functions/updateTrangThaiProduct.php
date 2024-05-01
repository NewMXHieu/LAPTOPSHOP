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
        $masp = isset($_POST['idProduct']) ? check_input($_POST['idProduct']) : '';
        $trangthai = isset($_POST['TrangThai']) ? check_input($_POST['TrangThai']) : '';

        // Hiển thị các giá trị đã lấy được để kiểm tra
        echo "Mã SP: " . $masp . "<br>";
        echo "Trạng thái: " . $trangthai . "<br>";

        $conn = connectToDatabase();

        
        
        // Hàm thêm sản phẩm
        function themSanPham($conn, $masp, $trangthai) {
            $sql_sanpham = "UPDATE sanpham 
            SET TRANGTHAI = '$trangthai'
            WHERE MASP = '$masp'";
            if ($conn->query($sql_sanpham) === TRUE) {
                echo "Update trạng thái sản phẩm thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        // Sử dụng các hàm trên
        // Thêm sản phẩm
        themSanPham($conn, $masp,$trangthai);

    } else{
        echo "không nhận được";
    }

?>