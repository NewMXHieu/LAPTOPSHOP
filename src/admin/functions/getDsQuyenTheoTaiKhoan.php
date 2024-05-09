<?php
include 'databaseAccess.php';
$conn = connectToDatabase();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT quyen.MAQUYEN
    FROM quyen, nhomquyen, taikhoan, phanquyen
    WHERE quyen.MAQUYEN = nhomquyen.MAQUYEN
            AND taikhoan.MATK = phanquyen.MATK
            AND phanquyen.MANHOMQUYEN = nhomquyen.MANHOMQUYEN
            AND TAIKHOAN.MATK = $id;";
    $result = $conn->query($sql);
    $maquyen = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $maquyen[] = $row['MAQUYEN'];
        }
    }
}
?>