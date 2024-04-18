<?php include 'databaseAccess.php'?>
<?php 
    
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();

// Khởi tạo một mảng kết hợp để lưu trữ dữ liệu
$response = array();

if (isset($_POST['idProduct'])) {
    // Nhận id từ yêu cầu POST
    $id = $_POST['idProduct'];
    // Truy vấn cơ sở dữ liệu để lấy dữ liệu sản phẩm
    $sql = "select MALOAISP
    from nhomloaisanpham
    where MASP = $id;
    ";
    $result = $conn->query($sql);
    // Kiểm tra xem truy vấn có thành công không
    if ($result) {
        // Lặp qua các hàng kết quả và thêm chúng vào mảng response
        while ($row = $result->fetch_assoc()) {
            $response[] = $row;
        }

        // Trả về mảng response dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Trả về thông báo lỗi nếu truy vấn không thành công
        $response['error'] = "Không thể lấy dữ liệu từ cơ sở dữ liệu";
        echo json_encode($response);
    }
}



?>