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
        $tensanpham = isset($_POST['tensp']) ? check_input($_POST['tensp']) : '';
        $thuonghieu = isset($_POST['mathuonghieu']) ? check_input($_POST['mathuonghieu']) : '';
        $loaisanpham = isset($_POST['loaisp']) ? $_POST['loaisp'] : array(); // Đây là một mảng nếu sử dụng checkbox
        $hinhsp = isset($_POST['hinhsp']) ? check_input($_POST['hinhsp']) : '';
        $nhacungcap = isset($_POST['mancc']) ? check_input($_POST['mancc']) : '';
        $giatien = isset($_POST['giatien']) ? check_input($_POST['giatien']) : '';
        $cpu = isset($_POST['cpu']) ? check_input($_POST['cpu']) : '';
        $screen = isset($_POST['screen']) ? check_input($_POST['screen']) : '';
        $ram = isset($_POST['ram']) ? check_input($_POST['ram']) : '';
        $vga = isset($_POST['vga']) ? check_input($_POST['vga']) : '';
        $storage = isset($_POST['storage']) ? check_input($_POST['storage']) : '';
        $os = isset($_POST['os']) ? check_input($_POST['os']) : '';
        $pin = isset($_POST['pin']) ? check_input($_POST['pin']) : '';
        $weight = isset($_POST['weight']) ? check_input($_POST['weight']) : '';
        $mota = isset($_POST['mota']) ? check_input($_POST['mota']) : '';
        $mau = isset($_POST['mau']) ? check_input($_POST['mau']) : '';
        $mabaohanh = isset($_POST['mabaohanh']) ? check_input($_POST['mabaohanh']) : '';
        // // Hiển thị các giá trị đã lấy được để kiểm tra
        // echo "Tên sản phẩm: " . $tensanpham . "<br>";
        // echo "Thương hiệu: " . $thuonghieu . "<br>";
        // echo "Loại sản phẩm: ";
        // foreach ($loaisanpham as $selected) {
        //     echo $selected . " ";
        // }
        // echo "<br>";
        // echo "Hình sản phẩm: " . $hinhsp . "<br>";
        // echo "Nhà cung cấp: " . $nhacungcap . "<br>";
        // echo "CPU: " . $cpu . "<br>";
        // echo "Screen: " . $screen . "<br>";
        // echo "RAM: " . $ram . "<br>";
        // echo "VGA: " . $vga . "<br>";
        // echo "Storage: " . $storage . "<br>";
        // echo "OS: " . $os . "<br>";
        // echo "PIN: " . $pin . "<br>";
        // echo "Weight: " . $weight . "<br>";
        // echo "Mô tả: " . $mota . "<br>";
        // echo "Màu: " . $mau . "<br>";
        // echo "Giá tiền: " . $giatien . "<br>";

        $conn = connectToDatabase();

        
        
        // Hàm thêm sản phẩm
        function themSanPham($conn, $hinhsp, $nhacungcap) {
            $sql_sanpham = "INSERT INTO SANPHAM(HINHSP,SOLUONG,MANCC,TRANGTHAI) VALUES ('$hinhsp',1,'$nhacungcap',1)";
            if ($conn->query($sql_sanpham) === TRUE) {
                // echo "Thêm sản phẩm thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        // Hàm lấy mã sản phẩm mới
        function layMaSPMoi($conn) {
            $sql_laymanv = "SELECT MASP
            FROM SANPHAM
            ORDER BY MASP DESC
            LIMIT 1";
            $result = $conn->query($sql_laymanv);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row["MASP"];
            } else {
                return 1;
            }
        }

        // Hàm thêm nhóm loại sản phẩm
        function themNhomLoaiSanPham($conn, $masp, $loaisanpham) {
            foreach ($loaisanpham as $selected) {
                $sql_nhomloaisanpham = "INSERT INTO NHOMLOAISANPHAM (MASP, MALOAISP) VALUES ($masp, '$selected')";
                if ($conn->query($sql_nhomloaisanpham) !== TRUE) {
                    echo "Lỗi: " . $conn->error;
                }
            }
        }

        // Hàm thêm chi tiết sản phẩm
        function themChiTietSanPham($conn, $masp, $tensanpham, $cpu, $screen, $ram, $vga, $storage, $os, $pin, $weight, $mota, $thuonghieu, $mau, $giatien) {
            $sql_chitietsanpham = "INSERT INTO CHITIETSANPHAM(MASP,TENSP,CPU,SCREEN,RAM,VGA,STORAGE,OS,PIN,WEIGHT,MOTA,MATHUONGHIEU,MAU,GIATIEN) VALUES ($masp,'$tensanpham','$cpu','$screen','$ram','$vga','$storage','$os','$pin','$weight','$mota',$thuonghieu,'$mau',$giatien)";
            if ($conn->query($sql_chitietsanpham) === TRUE) {
                // echo "Thêm chi tiết sản phẩm thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        function themSerial($conn,$soluong,$masp,$ngaysanxuat,$mabaohanh){
            // Tạo số seri cho mỗi sản phẩm
            $serial_prefix = 'SN' . str_pad($masp, 4, '0', STR_PAD_LEFT);
            while ($soluong > 0) {
                $serial_no = $serial_prefix . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);        
                // Thêm số seri vào bảng serial
                $insert_query = "INSERT INTO serial (MASERI, MASP, NGAYSANXUAT, MABAOHANH, TRANGTHAI) VALUES ('$serial_no', '$masp', '$ngaysanxuat',$mabaohanh,1)";
                $conn->query($insert_query);
                $soluong--;
            }
        }
        
        if($tensanpham == ''){
            echo 'thiếu tên sản phẩm';
        } else if($hinhsp == ''){
            echo 'thiếu hình sp';
        } else if($nhacungcap == ''){
            echo 'thiếu nhà cung cấp';
        } else if($cpu == ''){
            echo 'thiếu cpu';
        } else if($screen == ''){
            echo 'thiếu screen';
        } else if($ram == ''){
            echo 'thiếu ram';
        } else if($vga == ''){
            echo 'thiếu vga';
        } else if($storage == ''){
            echo 'thiếu storage';
        } else if($os == ''){
            echo 'thiếu os';
        } else if($pin == ''){
            echo 'thiếu pin';
        } else if($weight == ''){
            echo 'thiếu weight';
        } else if($mau == ''){
            echo 'thiếu mau';
        } else if($giatien == ''){
            echo 'thiếu giatien';
        } else{
        // Sử dụng các hàm trên
            // Thêm sản phẩm
            themSanPham($conn, $hinhsp, $nhacungcap);

            // Lấy mã sản phẩm mới
            $masp_moi = layMaSPMoi($conn);

            // Thêm nhóm loại sản phẩm
            themNhomLoaiSanPham($conn, $masp_moi, $loaisanpham);
            $giatien = number_format($giatien, 0, '.', '');
            
            // Thêm chi tiết sản phẩm
            themChiTietSanPham($conn, $masp_moi, $tensanpham, $cpu, $screen, $ram, $vga, $storage, $os, $pin, $weight, $mota, $thuonghieu, $mau, $giatien);

            $ngaysanxuat = new DateTime();
            $ngaysanxuat = $ngaysanxuat->format('Y-m-d');;
            $soluong = 0;
            themSerial($conn,$soluong,$masp_moi,$ngaysanxuat,$mabaohanh);
            echo 'thêm sản phẩm thành công';
        }
        
    }
?>