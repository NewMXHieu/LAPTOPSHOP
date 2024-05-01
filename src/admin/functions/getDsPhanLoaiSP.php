<?php include 'databaseAccess.php'?>
<?php
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();

// Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
$sql = "SELECT sanpham.*, chitietsanpham.*,nhomloaisanpham.*,phanloaisanpham.*,thuonghieu.*,baohanh.MABAOHANH
FROM sanpham
INNER JOIN chitietsanpham ON chitietsanpham.MASP = sanpham.MASP
INNER JOIN nhomloaisanpham ON nhomloaisanpham.MASP = sanpham.MASP
INNER JOIN phanloaisanpham ON phanloaisanpham.MALOAISP = nhomloaisanpham.MALOAISP
INNER JOIN thuonghieu ON chitietsanpham.MATHUONGHIEU = thuonghieu.MATHUONGHIEU
INNER JOIN serial ON serial.MASP = sanpham.MASP
INNER JOIN baohanh ON baohanh.MABAOHANH = serial.MABAOHANH
GROUP BY sanpham.MASP
";
$result = $conn->query($sql);
$products = [];

// Kiểm tra và xử lý kết quả
if ($result->num_rows > 0) {
    // Chuyển kết quả thành mảng JSON và trả về
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $product = [
            'MASP' => $row['MASP'],
            'TENSP' => $row['TENSP'],
            'CPU' => $row['CPU'],
            'SCREEN' => $row['SCREEN'],
            'RAM' => $row['RAM'],
            'VGA' => $row['VGA'],
            'STORAGE' => $row['STORAGE'],
            'OS' => $row['OS'],
            'PIN' => $row['PIN'],
            'WEIGHT' => $row['WEIGHT'],
            'MOTA' => $row['MOTA'],
            'MATHUONGHIEU' => $row['MATHUONGHIEU'],
            'MAU' => $row['MAU'],
            'GIATIEN' => $row['GIATIEN'],
            'HINHSP' => $row['HINHSP'],
            'SOLUONG' => $row['SOLUONG'],
            'MANCC' => $row['MANCC'],
            'TENTHUONGHIEU' => $row['TENTHUONGHIEU'],
            'TRANGTHAI' => $row['TRANGTHAI'],
            'MALOAISP' => $row['MALOAISP'],
            'TENLOAISP' => $row['TENLOAISP'],
            'MABAOHANH' => $row['MABAOHANH']
        ];
        $products[] = $product;
    }
    echo json_encode($products, JSON_UNESCAPED_UNICODE);
} 

// Đóng kết nối
$conn->close();
?>
