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
        $tensanpham = isset($_POST['editProduct_tensanpham']) ? check_input($_POST['editProduct_tensanpham']) : '';
        $thuonghieu = isset($_POST['editProduct_select_thuonghieu']) ? check_input($_POST['editProduct_select_thuonghieu']) : '';
        $loaisanpham = isset($_POST['group']) ? $_POST['group'] : array(); // Đây là một mảng nếu sử dụng checkbox
        $hinhsave = isset($_POST['editProduct_savehinhsp_cuu']) ? check_input($_POST['editProduct_savehinhsp_cuu']) : '';
        $hinhsp = isset($_POST['editProduct_hinhsp']) ? check_input($_POST['editProduct_hinhsp']) : '';
        $nhacungcap = isset($_POST['editProduct_select_nhacungcap']) ? check_input($_POST['editProduct_select_nhacungcap']) : '';
        $baohanh = isset($_POST['editProduct_select_baohanh']) ? check_input($_POST['editProduct_select_baohanh']) : '';
        $giatien = isset($_POST['editProduct_giatien']) ? check_input($_POST['editProduct_giatien']) : '';
        $cpu = isset($_POST['editproduct_detail_cpu']) ? check_input($_POST['editproduct_detail_cpu']) : '';
        $screen = isset($_POST['editproduct_detail_screen']) ? check_input($_POST['editproduct_detail_screen']) : '';
        $ram = isset($_POST['editproduct_detail_ram']) ? check_input($_POST['editproduct_detail_ram']) : '';
        $vga = isset($_POST['editproduct_detail_vga']) ? check_input($_POST['editproduct_detail_vga']) : '';
        $storage = isset($_POST['editproduct_detail_storage']) ? check_input($_POST['editproduct_detail_storage']) : '';
        $os = isset($_POST['editproduct_detail_os']) ? check_input($_POST['editproduct_detail_os']) : '';
        $pin = isset($_POST['editproduct_detail_pin']) ? check_input($_POST['editproduct_detail_pin']) : '';
        $weight = isset($_POST['editproduct_detail_weight']) ? check_input($_POST['editproduct_detail_weight']) : '';
        $mota = isset($_POST['editproduct_detail_mota']) ? check_input($_POST['editproduct_detail_mota']) : '';
        $mau = isset($_POST['editproduct_detail_mau']) ? check_input($_POST['editproduct_detail_mau']) : '';
        $manhanvien = isset($_POST['editProduct_nhanvien']) ? check_input($_POST['editProduct_nhanvien']) : '';
        $trangthai = isset($_POST['trangthaiProduct']) ? check_input($_POST['trangthaiProduct']) : 0;
        $giatien = number_format($giatien, 0, '.', '');

        // Hiển thị các giá trị đã lấy được để kiểm tra
        echo "Mã SP: " . $masp . "<br>";
        echo "Tên sản phẩm: " . $tensanpham . "<br>";
        echo "Thương hiệu: " . $thuonghieu . "<br>";
        echo "Loại sản phẩm: ";
        foreach ($loaisanpham as $selected) {
            echo $selected . " ";
        }
        echo "<br>";
        echo "Hình sản phẩm: " . $hinhsp . "<br>";
        echo "Hình cũ sản phẩm: " . $hinhsave . "<br>";
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
        echo "Trạng thái: " . $trangthai . "<br>";

        $conn = connectToDatabase();

        
        
        // Hàm thêm sản phẩm
        function themSanPham($conn, $masp, $hinhsp,$hinhcuu, $manhanvien, $nhacungcap, $trangthai) {
            if($hinhsp === ''){
                $hinhsp = $hinhcuu;
            }
            $sql_sanpham = "UPDATE sanpham 
            SET HINHSP = '$hinhsp',MANV = '$manhanvien',SOLUONG = 1,MANCC = '$nhacungcap',TRANGTHAI = '$trangthai'
            WHERE MASP = '$masp'";
            if ($conn->query($sql_sanpham) === TRUE) {
                echo "Thêm sản phẩm thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        function xoaNhomLoaiSanPhamCuu($conn, $masp){
            $sql_nhomloaisanphamcuu = "DELETE FROM nhomloaisanpham
                                    WHERE MASP = '$masp';
            ";
            if ($conn->query($sql_nhomloaisanphamcuu) !== TRUE) {
                    echo "Lỗi: " . $conn->error;
            }
        }
        // Hàm thêm nhóm loại sản phẩm
        function themNhomLoaiSanPham($conn, $masp, $loaisanpham) {
            xoaNhomLoaiSanPhamCuu($conn, $masp);
            foreach ($loaisanpham as $selected) {
                $sql_nhomloaisanpham = "INSERT INTO nhomloaisanpham (MASP,MALOAISP) VALUES
                                        ($masp,$selected)";
                if ($conn->query($sql_nhomloaisanpham) !== TRUE) {
                    echo "Lỗi: " . $conn->error;
                }
            }
        }

        // Hàm thêm chi tiết sản phẩm
        function themChiTietSanPham($conn, $masp, $tensanpham, $cpu, $screen, $ram, $vga, $storage, $os, $pin, $weight, $mota, $thuonghieu, $mau, $giatien, $baohanh) {
            $sql_chitietsanpham = "UPDATE CHITIETSANPHAM
                                    SET TENSP = '$tensanpham',
                                        CPU = '$cpu',
                                        SCREEN = '$screen',
                                        RAM = '$ram',
                                        VGA = '$vga',
                                        STORAGE = '$storage',
                                        OS = '$os',
                                        PIN = '$pin',
                                        WEIGHT = '$weight',
                                        MOTA = '$mota',
                                        MATHUONGHIEU = $thuonghieu,
                                        MAU = '$mau',
                                        GIATIEN = $giatien,
                                        MABAOHANH = $baohanh
                                    WHERE MASP = $masp;
            ";
            if ($conn->query($sql_chitietsanpham) === TRUE) {
                echo "Thêm chi tiết sản phẩm thành công";
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }

        // Sử dụng các hàm trên
        // Thêm sản phẩm
        themSanPham($conn, $masp, $hinhsp,$hinhsave, $manhanvien, $nhacungcap, $trangthai);

        // Thêm nhóm loại sản phẩm
        themNhomLoaiSanPham($conn, $masp, $loaisanpham);

        // Thêm chi tiết sản phẩm
        themChiTietSanPham($conn, $masp, $tensanpham, $cpu, $screen, $ram, $vga, $storage, $os, $pin, $weight, $mota, $thuonghieu, $mau, $giatien, $baohanh);

    } else{
        echo "không nhận được";
    }

    header("Location: ../../GiaoDien/admin/#content-sanpham");
?>