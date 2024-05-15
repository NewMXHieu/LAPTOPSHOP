<?php include 'databaseAccess.php'?>
<?php 
    
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();

// Khởi tạo một mảng kết hợp để lưu trữ dữ liệu

if (isset($_POST['idProduct'])) {
    // Nhận id từ yêu cầu POST
    $id = $_POST['idProduct'];
    // Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
    $sql = "SELECT *, chitietsanpham.GIATIEN
    FROM chitietphieunhap
    INNER JOIN chitietsanpham ON chitietsanpham.MASP = chitietphieunhap.MASP
    WHERE MAPN = $id
    ";
    $result = $conn->query($sql);
    $spPhieuNhaps = [];
    // Kiểm tra và xử lý kết quả
    if ($result->num_rows > 0) {
        // Chuyển kết quả thành mảng JSON và trả về
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $sp = [
                'MAPN' => $row['MAPN'],
                'MANCC' => $row['MANCC'],
                'MASP' => $row['MASP'],
                'SOLUONG' => $row['SOLUONG'],
                'GIATIEN'=> $row['GIATIEN'],
            ];
            $spPhieuNhaps[] = $sp;
        }
        echo json_encode($spPhieuNhaps, JSON_UNESCAPED_UNICODE);
    } 
}
?>