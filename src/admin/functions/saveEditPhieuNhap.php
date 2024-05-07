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
        $MAPN = isset($_POST['MAPN']) ? check_input($_POST['MAPN']) : '';
        $MANV = isset($_POST['MANV']) ? check_input($_POST['MANV']) : '';
        $NGAYNHAP = isset($_POST['NGAYNHAP']) ? check_input($_POST['NGAYNHAP']) : '';
        $TONGTIEN = isset($_POST['TONGTIEN']) ? check_input($_POST['TONGTIEN']) : '';
        $LISTSP = isset($_POST['LISTSP']) ? $_POST['LISTSP'] : array();
        $MANCC = isset($_POST['MANCC']) ? check_input($_POST['MANCC']) : '';
        $TRANGTHAI = isset($_POST['TRANGTHAI']) ? check_input($_POST['TRANGTHAI']) : '';

        // Hiển thị các giá trị đã lấy được để kiểm tra
        echo "MAPN : " . $MAPN . "<br>";
        echo "MANV : " . $MANV . "<br>";
        echo "NGAYNHAP: " . $NGAYNHAP . "<br>";
        echo "TONGTIEN: " . $TONGTIEN . "<br>";
        echo "LISTSP:";
        // Lặp qua mảng và in ra giá trị của từng phần tử
        foreach ($LISTSP as $item) {
            $masp = $item['MASP'];
            $soluong = $item['SOLUONG'];
            echo "MASP: " . $masp . ", SOLUONG: " . $soluong;
        }
        echo "<br>";
        echo "MANCC: " . $MANCC . "<br>";
        echo "TRANGTHAI: " . $TRANGTHAI . "<br>";

        $conn = connectToDatabase();

        function tinhTongTien($conn,$MAPN){
            $sql_laymanv = "SELECT SUM(SOLUONG * chitietsanpham.GIATIEN) AS TONGGIATIEN
            FROM chitietphieunhap
            INNER JOIN chitietsanpham ON chitietsanpham.MASP = chitietphieunhap.MASP
            WHERE MAPN = $MAPN";
            $result = $conn->query($sql_laymanv);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row["TONGGIATIEN"];
            } else {
                return 0;
            }
        }

        function themPhieuNhap($conn,$MAPN,$MANV,$NGAYNHAP,$TONGTIEN,$TRANGTHAI){
            $sql = "UPDATE phieunhap
            SET MANV = $MANV, NGAYNHAP = '$NGAYNHAP', TONGTIEN = $TONGTIEN, TRANGTHAI = $TRANGTHAI
            WHERE MAPN = $MAPN";
            if ($conn->query($sql) === TRUE) {
                echo "cập nhật phiếu nhập thành công" . "<br>";
            } else {
                echo "Lỗi: " . $conn->error . "<br>";
            }
        }
        
        themPhieuNhap($conn,$MAPN,$MANV,$NGAYNHAP,$TONGTIEN,$TRANGTHAI);
    }
?>