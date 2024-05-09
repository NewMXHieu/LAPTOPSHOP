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
        $mahd = isset($_POST['mahd']) ? check_input($_POST['mahd']) : '';
        $masp = isset($_POST['masp']) ? check_input($_POST['masp']) : '';
        $soluongmua = isset($_POST['soluongmua']) ? check_input($_POST['soluongmua']) : 0;
        $isPayed = isset($_POST['isPayed']) ? $_POST['isPayed'] : false;

        // Hiển thị các giá trị đã lấy được để kiểm tra
        echo "MÃ HÓA ĐƠN : " . $mahd . "<br>";
        echo "MÃ SẢN PHẨM: " . $masp . "<br>";
        echo "SỐ LƯỢNG MUA: " . $soluongmua . "<br>";
        echo "isPayed: " . $isPayed . "<br>";

        // Kết nối đến cơ sở dữ liệu
        $conn = connectToDatabase();


        function updateSoLuongSP($conn,$masp,$soluongmua){
            $soluong = laySlSanPham($conn,$masp);
            $soluongmoi = $soluong - $soluongmua;
            if($soluongmoi < 1){
                echo "không đủ số lượng sản phẩm để bán vui lòng nhập hàng";
                return;
            } 

            $sql_update = "UPDATE SANPHAM 
            SET SOLUONG = ?,
            WHERE MASP = ?";
            
            // Sử dụng câu lệnh chuẩn bị trước để ngăn chặn SQL Injection
            $stmt = $conn->prepare($sql_update);
            $stmt->bind_param("iii", $soluongmoi, $masp);
            
            if ($stmt->execute()) {
                echo "Update số lượng sản phẩm thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
            $stmt->close();
        }
        if($isPayed){
            updateSoLuongSP($conn,$masp,$soluongmua);
        } else{
            echo "vui lòng thanh toán giỏ hàng";
        }
        

    } else {
        echo "Không nhận được dữ liệu";
    }
?>
