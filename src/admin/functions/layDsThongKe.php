
<?php include 'databaseAccess.php'?>
<?php
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();

// Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
$sql = "SELECT 
phanloaisanpham.MALOAISP,
phanloaisanpham.TENLOAISP,
thuonghieu.MATHUONGHIEU,
thuonghieu.TENTHUONGHIEU,
giohang.MASP,
chitietsanpham.TENSP, 
SUM(giohang.SOLUONG) AS TONGSOLUONG, 
SUM(giohang.SOLUONG * chitietsanpham.GIATIEN) AS TONGGIATIEN 
FROM giohang 
INNER JOIN chitietsanpham ON chitietsanpham.MASP = giohang.MASP 
INNER JOIN nhomloaisanpham ON nhomloaisanpham.MASP = giohang.MASP
INNER JOIN phanloaisanpham on phanloaisanpham.MALOAISP = nhomloaisanpham.MALOAISP
INNER JOIN thuonghieu ON thuonghieu.MATHUONGHIEU = giohang.MASP
GROUP BY giohang.MASP, chitietsanpham.TENSP;";
$result = $conn->query($sql);
$sanphams = [];

// Kiểm tra và xử lý kết quả
if ($result->num_rows > 0) {
    // Chuyển kết quả thành mảng JSON và trả về
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $sp = [
            'MALOAISP' => $row['MALOAISP'],
            'TENLOAISP' => $row['TENLOAISP'],
            'MATHUONGHIEU' => $row['MATHUONGHIEU'],
            'TENTHUONGHIEU' => $row['TENTHUONGHIEU'],
            'MASP' => $row['MASP'],
            'TENSP' => $row['TENSP'],
            'TONGSOLUONG' => $row['TONGSOLUONG'],
            'TONGGIATIEN' => $row['TONGGIATIEN'],

        ];
        $sanphams[] = $sp;
    }
    echo json_encode($sanphams, JSON_UNESCAPED_UNICODE);
} 

// Đóng kết nối
$conn->close();
?>
