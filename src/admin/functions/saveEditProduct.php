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
        $masp = isset($_POST['masp']) ? check_input($_POST['masp']) : '';
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
        echo "Nhà cung cấp: " . $nhacungcap . "<br>";
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
        $giatien = number_format($giatien, 0, '.', '');
        echo "Giá tiền: " . $giatien . "<br>";


        $conn = connectToDatabase();

        
        
        // Hàm thêm sản phẩm
        function themSanPham($conn, $masp, $hinhsp, $nhacungcap) {
            $sql_sanpham = "UPDATE sanpham 
            SET HINHSP = '$hinhsp',SOLUONG = 1,MANCC = '$nhacungcap'
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
        function themChiTietSanPham($conn, $masp, $tensanpham, $cpu, $screen, $ram, $vga, $storage, $os, $pin, $weight, $mota, $thuonghieu, $mau, $giatien) {
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
                                        GIATIEN = $giatien
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
        themSanPham($conn, $masp, $hinhsp, $nhacungcap);

        // Thêm nhóm loại sản phẩm
        themNhomLoaiSanPham($conn, $masp, $loaisanpham);

        // Thêm chi tiết sản phẩm
        themChiTietSanPham($conn, $masp, $tensanpham, $cpu, $screen, $ram, $vga, $storage, $os, $pin, $weight, $mota, $thuonghieu, $mau, $giatien);

    } else{
        echo "không nhận được";
    }
?>