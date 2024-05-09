<?php
// Kết nối tới cơ sở dữ liệu
include 'databaseAccess.php';
$conn = connectToDatabase();

// Nhận dữ liệu từ yêu cầu AJAX
$idNhomQuyen = $_POST['idNhomQuyen'];
$tenNhomQuyen = $_POST['tenNhomQuyen'];
$moTa = $_POST['moTa'];
$maquyens = $_POST['maquyens'];


// cập nhật những quyền có trong nhóm quyền
foreach ($maquyens as $maquyen) {
    themQuyen($conn, $idNhomQuyen, $maquyen, $tenNhomQuyen);
}
function themQuyen($conn, $idNhomQuyen, $maquyen, $tenNhomQuyen)
{
    $sql = "INSERT INTO NHOMQUYEN(MANHOMQUYEN, MAQUYEN,TENNHOMQUYEN) VALUES ('$idNhomQuyen', '$maquyen', '$tenNhomQuyen')";
    if ($conn->query($sql) !== TRUE) {
        echo "Lỗi: " . $conn->error;
    }
}

// Cập nhật thông tin nhóm quyền
$sql_update = "INSERT INTO motanhomquyen(MANHOMQUYEN, MOTA) VALUES ('$idNhomQuyen','$moTa')";
if ($conn->query($sql_update) !== TRUE) {
    echo "Lỗi: " . $conn->error;
}
// Trả về kết quả thành công
echo json_encode(array('success' => true));
?>