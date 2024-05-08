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
            $mabaohanh = $item['MABAOHANH'];
            $ngaysanxuat = $item['NGAYSANXUAT'];
            echo "MASP: " . $masp . ", SOLUONG: " . $soluong . ", MABAOHANH: " . $mabaohanh . ", NGAYSANXUAT: " . $ngaysanxuat . " ";
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
            $sql_laymanv = "SELECT MAPN
            FROM PHIEUNHAP
            ORDER BY MAPN DESC
            LIMIT 1;
            ";
            $result = $conn->query($sql_laymanv);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row["MAPN"];
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
        function laySlSanPham($conn,$MASP){
            $SQL = "SELECT SOLUONG
            FROM SANPHAM
            WHERE MASP = $MASP";
           
            $result = $conn->query($SQL);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row["SOLUONG"];
            } else {
                return 0;
            }
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

        function updateSerial($conn,$MASP,$SOLUONG,$MABAOHANH,$NGAYSANXUAT){
            // Lấy danh sách sản phẩm từ bảng sanpham
        $prod_id = $MASP;
        $prod_quantity = laySlSanPham($conn,$MASP) + $SOLUONG;
        // Kiểm tra xem sản phẩm đã có mã seri hay chưa
        $check_query = "SELECT COUNT(*) as total FROM serial WHERE MASP = $prod_id";
        $check_result = $conn->query($check_query);
        $check_row = $check_result->fetch_assoc();
        $existing_serials = $check_row["total"];

        // Nếu số lượng mã seri đã tạo cho sản phẩm này chưa đạt số lượng quy định
        if ($existing_serials < $prod_quantity) {
            // Tạo số seri cho mỗi sản phẩm
            $serial_prefix = 'SN' . str_pad($prod_id, 4, '0', STR_PAD_LEFT);
            $serial_count = $prod_quantity - $existing_serials;
            
            for ($i = 0; $i < $serial_count; $i++) {
                $serial_no = $serial_prefix . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
                
                // Thêm số seri vào bảng serial
                $insert_query = "INSERT INTO serial (MASERI, MASP,NGAYSANXUAT,MABAOHANH) VALUES ('$serial_no', '$prod_id','$NGAYSANXUAT',$MABAOHANH)";
                $conn->query($insert_query);
            }

            echo "Tạo " . $serial_count . " mã seri mới cho sản phẩm có MASP $prod_id.<br>";
        } else {
            echo "Sản phẩm có MASP $prod_id đã có đủ số lượng mã seri.<br>";
        }
        }


        themPhieuNhap($conn,$MANV,$NGAYNHAP,$TONGTIEN,$TRANGTHAI);
        $MAPN = layMa($conn);
        foreach ($LISTSP as $item) {
            $MASP = $item['MASP'];
            $SOLUONG = $item['SOLUONG'];

            $MABAOHANH = $item['MABAOHANH'];
            $NGAYSANXUAT = $item['NGAYSANXUAT'];
            if($NGAYSANXUAT === ''){
                $NGAYSANXUAT = date("Y-m-d");
            }
            themChiTietPhieuNhap($conn,$MAPN,$MANCC,$MASP,$SOLUONG);
            updateTongGiaTien($conn,$MAPN);
            updateSoLuongSP($conn,$MASP,$SOLUONG);
            updateSerial($conn,$MASP,$SOLUONG,$MABAOHANH,$NGAYSANXUAT);
        }
    }
?>