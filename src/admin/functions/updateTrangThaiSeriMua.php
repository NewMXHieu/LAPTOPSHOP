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
        $maseri = isset($_POST['maseri']) ? check_input($_POST['maseri']) : '';
        $masp = isset($_POST['masp']) ? check_input($_POST['masp']) : '';
        $isPayed = isset($_POST['isPayed']) ? $_POST['isPayed'] : false;
        $trangthai = isset($_POST['trangthai']) ? check_input($_POST['trangthai']) : 1;

        // Hiển thị các giá trị đã lấy được để kiểm tra
        echo "MÃ SERI : " . $mahd . "<br>";
        echo "MÃ SẢN PHẨM: " . $masp . "<br>";
        echo "isPayed: " . $isPayed . "<br>";

        // Kết nối đến cơ sở dữ liệu
        $conn = connectToDatabase();


        function updateTrangThaiSeri($conn,$maseri,$trangthai){
            
            if($maseri == ''){
                echo "Lỗi mã seri không tồn tại";
                return;
            } 

            $sql_update = "UPDATE SERIAL 
            SET TRANGTHAI = ?,
            WHERE MASERI = ?";
            
            // Sử dụng câu lệnh chuẩn bị trước để ngăn chặn SQL Injection
            $stmt = $conn->prepare($sql_update);
            $stmt->bind_param("iii", $trangthai, $maseri);
            
            if ($stmt->execute()) {
                echo "Update trạng thái mã seri thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
            $stmt->close();
        }
        if($isPayed){
            updateTrangThaiSeri($conn,$maseri,$trangthai);
        } else{
            echo "vui lòng thanh toán giỏ hàng";
        }
        

    } else {
        echo "Không nhận được dữ liệu";
    }
?>
