<?php include 'databaseAccess.php'?>
<?php 
    
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();

// Khởi tạo một mảng kết hợp để lưu trữ dữ liệu

if (isset($_POST['idProduct'])) {
    // Nhận id từ yêu cầu POST
    $id = $_POST['idProduct'];
    // Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
    $sql = "SELECT SANPHAM.MASP,TENSP,MANCC
    FROM sanpham
    INNER JOIN chitietsanpham ON chitietsanpham.MASP = sanpham.MASP
    WHERE MANCC = $id and TRANGTHAI = 1;
    ";
    $result = $conn->query($sql);
    $SPDonHangs = [];
    // Kiểm tra và xử lý kết quả
    if ($result->num_rows > 0) {
        // Chuyển kết quả thành mảng JSON và trả về
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $sp = [
                'MASP' => $row['MASP'],
                'TENSP' => $row['TENSP'],
                'MANCC' => $row['MANCC'],
            ];
            $SPDonHangs[] = $sp;
        }
        echo json_encode($SPDonHangs, JSON_UNESCAPED_UNICODE);
    } 
}
?>