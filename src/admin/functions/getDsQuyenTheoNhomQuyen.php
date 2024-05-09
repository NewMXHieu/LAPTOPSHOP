<?php
include 'databaseAccess.php';
$conn = connectToDatabase();
if(isset($_POST['idNhomQuyen'])){
    $id = $_POST['idNhomQuyen'];
    $sql = "SELECT MAQUYEN FROM NHOMQUYEN WHERE MANHOMQUYEN = $id;";
    $result = $conn->query($sql);
    $maquyens = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $maquyens[] = $row['MAQUYEN'];
        }
    }
    echo json_encode($maquyens);
}
?>