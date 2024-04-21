
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
chitietgiohang.MASP,
chitietsanpham.TENSP, 
SUM(chitietgiohang.SOLUONG) AS TONGSOLUONG, 
SUM(chitietgiohang.SOLUONG * chitietsanpham.GIATIEN) AS TONGGIATIEN 
FROM giohang 
INNER JOIN chitietgiohang on chitietgiohang.MAGH = giohang.MAGH
INNER JOIN chitietsanpham ON chitietsanpham.MASP = chitietgiohang.MASP 
INNER JOIN nhomloaisanpham ON nhomloaisanpham.MASP = chitietgiohang.MASP
INNER JOIN phanloaisanpham on phanloaisanpham.MALOAISP = nhomloaisanpham.MALOAISP
INNER JOIN thuonghieu ON thuonghieu.MATHUONGHIEU = chitietgiohang.MASP
GROUP BY chitietgiohang.MASP, chitietsanpham.TENSP;";
$result = $conn->query($sql);
$thongkes = [];

// Kiểm tra và xử lý kết quả
if ($result->num_rows > 0) {
    // Chuyển kết quả thành mảng JSON và trả về
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $tk = [
            'MALOAISP' => $row['MALOAISP'],
            'TENLOAISP' => $row['TENLOAISP'],
            'MATHUONGHIEU' => $row['MATHUONGHIEU'],
            'TENTHUONGHIEU' => $row['TENTHUONGHIEU'],
            'MASP' => $row['MASP'],
            'TENSP' => $row['TENSP'],
            'TONGSOLUONG' => $row['TONGSOLUONG'],
            'TONGGIATIEN' => $row['TONGGIATIEN'],
        ];
        $thongkes = $tk;
    }
    echo json_encode($thongkes, JSON_UNESCAPED_UNICODE);
} 

// Đóng kết nối
$conn->close();
?>
