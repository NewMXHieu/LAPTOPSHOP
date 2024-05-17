
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
chitiethoadon.MASP,
chitietsanpham.TENSP,
COUNT(chitiethoadon.MASP) AS TONGSOLUONG,
chitietsanpham.GIATIEN AS DONGIA,
chitietsanpham.GIATIEN * COUNT(chitiethoadon.MASP) AS TONGGIATIEN,
hoadon.NGAYTAO 
FROM HOADON
INNER JOIN chitiethoadon ON chitiethoadon.MAHD = hoadon.MAHD
INNER JOIN chitietsanpham ON chitietsanpham.MASP = chitiethoadon.MASP 
INNER JOIN nhomloaisanpham ON nhomloaisanpham.MASP = chitiethoadon.MASP
INNER JOIN phanloaisanpham on phanloaisanpham.MALOAISP = nhomloaisanpham.MALOAISP
INNER JOIN thuonghieu ON thuonghieu.MATHUONGHIEU = chitietsanpham.MATHUONGHIEU
INNER JOIN 
    (SELECT MASP, COUNT(MASP) AS TONGSOLUONG FROM chitiethoadon GROUP BY MASP) AS subquery 
    ON subquery.MASP = chitiethoadon.MASP
WHERE HOADON.TRANGTHAI = 1
GROUP BY phanloaisanpham.MALOAISP, chitiethoadon.MASP";
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
            'DONGIA' => $row['DONGIA'],
            'TONGGIATIEN' => $row['TONGGIATIEN'],
            'NGAYTAO' => $row['NGAYTAO']
        ];
        $thongkes[] = $tk;
    }
    echo json_encode($thongkes, JSON_UNESCAPED_UNICODE);
} 

// Đóng kết nối
$conn->close();
?>
