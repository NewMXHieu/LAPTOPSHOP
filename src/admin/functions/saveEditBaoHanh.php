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
        $MABAOHANH = isset($_POST['MABAOHANH']) ? check_input($_POST['MABAOHANH']) : '';
        $DONVIBAOHANH = isset($_POST['DONVIBAOHANH']) ? check_input($_POST['DONVIBAOHANH']) : '';
        $MANV = isset($_POST['MANV']) ? check_input($_POST['MANV']) : '';
        $THOIHAN = isset($_POST['THOIHAN']) ? check_input($_POST['THOIHAN']) : '';
        $TRANGTHAI = isset($_POST['TRANGTHAI']) ? check_input($_POST['TRANGTHAI']) : '';

        // Hiển thị các giá trị đã lấy được để kiểm tra
        echo "MABAOHANH : " . $MABAOHANH . "<br>";
        echo "DONVIBAOHANH : " . $DONVIBAOHANH . "<br>";
        echo "MANV: " . $MANV . "<br>";
        echo "THOIHAN: " . $THOIHAN . "<br>";
        echo "TRANGTHAI: " . $TRANGTHAI . "<br>";

        $conn = connectToDatabase();

        function changeIdToName($id){
            if($id === "1"){
                return 'ACER';
            } else if($id === "2"){
                return 'APPLE';
            } else if($id === "3"){
                return 'ASUS';
            } else if($id === "4"){
                return 'DELL';
            } else if($id === "5"){
                return 'GIGABYTE';
            } else if($id === "6"){
                return 'HP';
            } else if($id === "7"){
                return 'LG';
            } else if($id === "8"){
                return 'LENOVO';
            } else if($id === "9"){
                return 'MSI';
            }
        }

        function themBaoHanh($conn,$MABAOHANH,$DONVIBAOHANH,$MANV,$THOIHAN,$TRANGTHAI){
            $sql = "UPDATE BAOHANH
            SET MANV = $MANV, DONVIBAOHANH = '$DONVIBAOHANH', THOIHAN = $THOIHAN, TRANGTHAI = $TRANGTHAI
            WHERE MABAOHANH = $MABAOHANH";
            if ($conn->query($sql) === TRUE) {
                echo "cập nhật thông tin bảo hành thành công" . "<br>";
            } else {
                echo "Lỗi: " . $conn->error . "<br>";
            }
        }
        $DONVIBAOHANH = changeIdToName($DONVIBAOHANH);
        themBaoHanh($conn,$MABAOHANH,$DONVIBAOHANH,$MANV,$THOIHAN,$TRANGTHAI);
    }
?>