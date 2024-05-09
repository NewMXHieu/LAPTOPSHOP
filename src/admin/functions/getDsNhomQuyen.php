<?php
include 'databaseAccess.php';
// Kết nối đến cơ sở dữ liệu
$conn = connectToDatabase();

// Truy vấn cơ sở dữ liệu để lấy dữ liệu nhóm quyền
if(isset($_POST['idNhomQuyen'])){
    $id = $_POST['idNhomQuyen'];
    $sql = "SELECT DISTINCT nhomquyen.MANHOMQUYEN, nhomquyen.TENNHOMQUYEN, motanhomquyen.MOTA 
    FROM nhomquyen, motanhomquyen 
    WHERE nhomquyen.MANHOMQUYEN = motanhomquyen.MANHOMQUYEN AND nhomquyen.MANHOMQUYEN = $id;";
    $result = $conn->query($sql);
    $nhomquyens = [];
    // Chuyển kết quả thành mảng JSON và trả về
    if ($result->num_rows > 0) {
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $nhomquyen = [
                'MANHOMQUYEN' => $row['MANHOMQUYEN'],
                'TENNHOMQUYEN' => $row['TENNHOMQUYEN'],
                'MOTA' => $row['MOTA'],
            ];
            array_push($nhomquyens, $nhomquyen);
        }
        echo json_encode($nhomquyens);
    } else {
        echo "0 results";
    }
} else {
    echo "0 results";
}
?>