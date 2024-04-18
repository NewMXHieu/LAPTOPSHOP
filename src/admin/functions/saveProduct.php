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
        $tensanpham = isset($_POST['addProduct_tensanpham']) ? check_input($_POST['addProduct_tensanpham']) : '';
        $thuonghieu = isset($_POST['addProduct_select_thuonghieu']) ? check_input($_POST['addProduct_select_thuonghieu']) : '';
        $loaisanpham = isset($_POST['group']) ? $_POST['group'] : array(); // Đây là một mảng nếu sử dụng checkbox
        $hinhsp = isset($_POST['addProduct_hinhsp']) ? check_input($_POST['addProduct_hinhsp']) : '';
        $nhacungcap = isset($_POST['addProduct_select_nhacungcap']) ? check_input($_POST['addProduct_select_nhacungcap']) : '';
        $baohanh = isset($_POST['addProduct_select_baohanh']) ? check_input($_POST['addProduct_select_baohanh']) : '';
        $giatien = isset($_POST['addProduct_giatien']) ? check_input($_POST['addProduct_giatien']) : '';
        $cpu = isset($_POST['addproduct_detail_cpu']) ? check_input($_POST['addproduct_detail_cpu']) : '';
        $screen = isset($_POST['addproduct_detail_screen']) ? check_input($_POST['addproduct_detail_screen']) : '';
        $ram = isset($_POST['addproduct_detail_ram']) ? check_input($_POST['addproduct_detail_ram']) : '';
        $vga = isset($_POST['addproduct_detail_vga']) ? check_input($_POST['addproduct_detail_vga']) : '';
        $storage = isset($_POST['addproduct_detail_storage']) ? check_input($_POST['addproduct_detail_storage']) : '';
        $os = isset($_POST['addproduct_detail_os']) ? check_input($_POST['addproduct_detail_os']) : '';
        $pin = isset($_POST['addproduct_detail_pin']) ? check_input($_POST['addproduct_detail_pin']) : '';
        $weight = isset($_POST['addproduct_detail_weight']) ? check_input($_POST['addproduct_detail_weight']) : '';
        $mota = isset($_POST['addproduct_detail_mota']) ? check_input($_POST['addproduct_detail_mota']) : '';
        $mau = isset($_POST['addproduct_detail_mau']) ? check_input($_POST['addproduct_detail_mau']) : '';
        $manhanvien = isset($_POST['addProduct_nhanvien']) ? check_input($_POST['addProduct_nhanvien']) : '';
        
        $giatien = number_format($giatien, 2, '.', '');

        // Hiển thị các giá trị đã lấy được để kiểm tra
        echo "Tên sản phẩm: " . $tensanpham . "<br>";
        echo "Thương hiệu: " . $thuonghieu . "<br>";
        echo "Loại sản phẩm: ";
        foreach ($loaisanpham as $selected) {
            echo $selected . " ";
        }
        echo "<br>";
        echo "Hình sản phẩm: " . $hinhsp . "<br>";
        echo "Nhà cung cấp: " . $nhacungcap . "<br>";
        echo "Đơn vị bảo hành: " . $baohanh . "<br>";
        echo "Giá tiền: " . $giatien . "<br>";
        echo "CPU: " . $cpu . "<br>";
        echo "Screen: " . $screen . "<br>";
        echo "RAM: " . $ram . "<br>";
        echo "VGA: " . $vga . "<br>";
        echo "Storage: " . $storage . "<br>";
        echo "OS: " . $os . "<br>";
        echo "PIN: " . $pin . "<br>";
        echo "Weight: " . $weight . "<br>";
        echo "Mô tả: " . $mota . "<br>";
        echo "Màu: " . $mau . "<br>";

        $conn = connectToDatabase();

        
        
        // Hàm thêm sản phẩm
        function themSanPham($conn, $hinhsp, $manhanvien, $nhacungcap) {
            $sql_sanpham = "INSERT INTO SANPHAM(HINHSP,MANV,SOLUONG,MANCC,TRANGTHAI) VALUES ('$hinhsp','$manhanvien',1,'$nhacungcap',1)";
            if ($conn->query($sql_sanpham) === TRUE) {
                echo "Thêm sản phẩm thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        // Hàm lấy mã sản phẩm mới
        function layMaSPMoi($conn) {
            $sql_laymasp = "SELECT COUNT(*) AS total FROM SANPHAM";
            $result = $conn->query($sql_laymasp);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row["total"];
            } else {
                return 0;
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
        function themChiTietSanPham($conn, $masp, $tensanpham, $cpu, $screen, $ram, $vga, $storage, $os, $pin, $weight, $mota, $thuonghieu, $mau, $giatien, $baohanh) {
            $sql_chitietsanpham = "INSERT INTO CHITIETSANPHAM(MASP,TENSP,CPU,SCREEN,RAM,VGA,STORAGE,OS,PIN,WEIGHT,MOTA,MATHUONGHIEU,MAU,GIATIEN,MABAOHANH) VALUES ($masp,'$tensanpham','$cpu','$screen','$ram','$vga','$storage','$os','$pin','$weight','$mota',$thuonghieu,'$mau',$giatien,$baohanh)";
            if ($conn->query($sql_chitietsanpham) === TRUE) {
                echo "Thêm chi tiết sản phẩm thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        // Sử dụng các hàm trên
        // Thêm sản phẩm
        themSanPham($conn, $hinhsp, $manhanvien, $nhacungcap);

        // Lấy mã sản phẩm mới
        $masp_moi = layMaSPMoi($conn);

        // Thêm nhóm loại sản phẩm
        themNhomLoaiSanPham($conn, $masp_moi, $loaisanpham);

        // Thêm chi tiết sản phẩm
        themChiTietSanPham($conn, $masp_moi, $tensanpham, $cpu, $screen, $ram, $vga, $storage, $os, $pin, $weight, $mota, $thuonghieu, $mau, $giatien, $baohanh);

    }
?>