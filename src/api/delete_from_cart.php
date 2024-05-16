<?php
include "../../config/connect.php";
global $conn;

$MAGH = $_POST['MAGH'];
$MASP = $_POST['MASP'];

// Prepare the SQL statement
$stmt = $conn->prepare("DELETE FROM chitietgiohang WHERE MAGH = ? AND MASP = ?");
$stmt->bind_param("ss", $MAGH, $MASP);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => $stmt->error]);
}
?>