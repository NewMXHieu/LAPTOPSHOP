<?php
include 'databaseAccess.php';

$conn = connectToDatabase();

// Get the POST data
$MATK = $_POST['MATK'];

function deleteTaiKhoan($conn, $MATK) {
    // Prepare an SQL statement for phanquyen
    $stmt = $conn->prepare("DELETE FROM phanquyen WHERE MATK = ?");
    $stmt->bind_param("s", $MATK);
    $stmt->execute();
    $stmt->close();

    // Prepare an SQL statement for taikhoan
    $stmt = $conn->prepare("DELETE FROM taikhoan WHERE MATK = ?");
    $stmt->bind_param("i", $MATK);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}

deleteTaiKhoan($conn, $MATK);
$conn->close();
?>