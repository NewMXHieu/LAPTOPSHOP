<?php
// Kết nối tới cơ sở dữ liệu
include 'databaseAccess.php';
$conn = connectToDatabase();

// Nhận dữ liệu từ yêu cầu AJAX
$idNhomQuyen = $_POST['idNhomQuyen'];
$tenNhomQuyen = $_POST['tenNhomQuyen'];
$moTa = $_POST['moTa'];
$maquyens = $_POST['maquyens'];

// Xóa quyền cũ
xoaPhanQuyenCu($conn, $idNhomQuyen);

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
function xoaPhanQuyenCu($conn, $idNhomQuyen)
{
    // Cập nhật các hàng tham chiếu trong bảng phanquyen
    $sql = "UPDATE phanquyen SET MANHOMQUYEN = NULL WHERE MANHOMQUYEN = '$idNhomQuyen'";
    if ($conn->query($sql) !== TRUE) {
        echo "Lỗi: " . $conn->error;    
        return;
    }

    // Xóa các hàng tham chiếu trong bảng motanhomquyen
    $sql = "DELETE FROM motanhomquyen WHERE MANHOMQUYEN = '$idNhomQuyen'";
    if ($conn->query($sql) !== TRUE) {
        echo "Lỗi: " . $conn->error;
        return;
    }

    // Sau đó xóa hàng trong bảng NHOMQUYEN
    $sql = "DELETE FROM NHOMQUYEN WHERE MANHOMQUYEN = '$idNhomQuyen'";
    if ($conn->query($sql) !== TRUE) {
        echo "Lỗi: " . $conn->error;
    }
}

// Cập nhật thông tin nhóm quyền
$sql_update = "INSERT INTO motanhomquyen(MANHOMQUYEN, MOTA) VALUES ('$idNhomQuyen','$moTa')";
if ($conn->query($sql_update) !== TRUE) {
    echo "Lỗi: " . $conn->error;
}
// Cập nhật thông tin phân quyền
$sql = "UPDATE phanquyen SET MANHOMQUYEN = '$idNhomQuyen' WHERE MANHOMQUYEN IS NULL";
    if ($conn->query($sql) !== TRUE) {
        echo "Lỗi: " . $conn->error;    
        return;
    }

// Trả về kết quả thành công
echo json_encode(array('success' => true));
?>