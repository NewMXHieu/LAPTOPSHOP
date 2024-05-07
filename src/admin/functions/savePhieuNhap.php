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
        $MANV = isset($_POST['MANV']) ? check_input($_POST['MANV']) : '';
        $NGAYNHAP = isset($_POST['NGAYNHAP']) ? check_input($_POST['NGAYNHAP']) : '';
        $TONGTIEN = isset($_POST['TONGTIEN']) ? check_input($_POST['TONGTIEN']) : '';
        $LISTSP = isset($_POST['LISTSP']) ? $_POST['LISTSP'] : array();
        
        $MANCC = isset($_POST['MANCC']) ? check_input($_POST['MANCC']) : '';
        $TRANGTHAI = isset($_POST['TRANGTHAI']) ? check_input($_POST['TRANGTHAI']) : '';

        // Hiển thị các giá trị đã lấy được để kiểm tra
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

        function themPhieuNhap($conn,$MANV,$NGAYNHAP,$TONGTIEN,$TRANGTHAI){
            $sql = "INSERT INTO PHIEUNHAP(MANV,NGAYNHAP,TONGTIEN,TRANGTHAI) VALUES ($MANV,'$NGAYNHAP','$TONGTIEN',$TRANGTHAI)";
            if ($conn->query($sql) === TRUE) {
                echo "Thêm phiếu nhập thành công" . "<br>";
            } else {
                echo "Lỗi: " . $conn->error . "<br>";
            }
        }
        
        function layMa($conn){
            $sql_laymanv = "SELECT COUNT(*) AS total FROM PHIEUNHAP";
            $result = $conn->query($sql_laymanv);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row["total"];
            } else {
                return 1;
            }
        }
        
        function themChiTietPhieuNhap($conn,$MAPN,$MANCC,$MASP,$SOLUONG){
            $sql_PhanQuyen = "INSERT INTO CHITIETPHIEUNHAP(MAPN,MANCC,MASP,SOLUONG) VALUES ($MAPN,$MANCC,$MASP,$SOLUONG)";
            if ($conn->query($sql_PhanQuyen) === TRUE) {
                echo "Thêm chi tiết phiếu nhập thành công" . "<br>";
            } else {
                echo "Lỗi: " . $conn->error . "<br>";
            }
        }

        function updateTongGiaTien($conn,$MAPN){
            $TONGGIATIEN = tinhTongTien($conn,$MAPN);
            $SQL = "UPDATE phieunhap
            SET TONGTIEN = $TONGGIATIEN
            WHERE MAPN = $MAPN";
            if ($conn->query($SQL) === TRUE) {
                echo "cập nhật giá trị phiếu nhập thành công" . "<br>";
            } else {
                echo "Lỗi: " . $conn->error . "<br>";
            }
        }


        themPhieuNhap($conn,$MANV,$NGAYNHAP,$TONGTIEN,$TRANGTHAI);
        $MAPN = layMa($conn);
        foreach ($LISTSP as $item) {
            $MASP = $item['MASP'];
            $SOLUONG = $item['SOLUONG'];
            themChiTietPhieuNhap($conn,$MAPN,$MANCC,$MASP,$SOLUONG);
            updateTongGiaTien($conn,$MAPN);
        }

        function updateSoLuongSP($conn,$MASP,$SOLUONG){
            $SQL = "UPDATE SANPHAM
            SET SOLUONG = SOLUONG + $SOLUONG
            WHERE MASP = $MASP";
            if ($conn->query($SQL) === TRUE) {
                echo "cập nhật số lượng sản phẩm thành công" . "<br>";
            } else {
                echo "Lỗi: " . $conn->error . "<br>";
            }
        }

        function taoSerialSP($conn,$MASP,$SOLUONG){
            $SQL = "UPDATE SANPHAM
            SET SOLUONG = SOLUONG + $SOLUONG
            WHERE MASP = $MASP";
            if ($conn->query($SQL) === TRUE) {
                echo "cập nhật số lượng sản phẩm thành công" . "<br>";
            } else {
                echo "Lỗi: " . $conn->error . "<br>";
            }
        }
    }
?>