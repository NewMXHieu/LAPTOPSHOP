<?php
// Include database connection file
include 'databaseAccess.php';

// Connect to the database
$conn = connectToDatabase();

// Check if id is received
if(isset($_POST['idNhomQuyen'])) {
    $id = $_POST['idNhomQuyen'];
    echo $id;
    // Start transaction
    $conn->begin_transaction();

    try {
        // Delete data from the taikhoan table
        $sql = "DELETE FROM phanquyen WHERE MANHOMQUYEN = ?";
        if($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $id);
            // Attempt to execute the prepared statement
            $stmt->execute();
            // Close statement
            $stmt->close();
        }
        // Delete data from the motanhomquyen table
        $sql = "DELETE FROM motanhomquyen WHERE MANHOMQUYEN = ?";
        if($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $id);
            // Attempt to execute the prepared statement
            $stmt->execute();
            // Close statement
            $stmt->close();
        }

        // Delete data from the nhomquyen table
        $sql = "DELETE FROM nhomquyen WHERE MANHOMQUYEN = ?";
        if($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $id);
            // Attempt to execute the prepared statement
            $stmt->execute();
            // Close statement
            $stmt->close();
        }

        // Commit the transaction
        $conn->commit();
        echo json_encode(array('success' => true));
    } catch (Exception $e) {
        // An error occurred; rollback the transaction
        $conn->rollback();
        echo "ERROR: Could not execute query: $sql. " . $conn->error;
        echo "Exception: " . $e->getMessage();
    }
}

// Close connection
$conn->close();
?>