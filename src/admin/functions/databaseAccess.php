<?php
// Hàm kết nối đến cơ sở dữ liệu
function connectToDatabase() {
    $servername = "localhost"; 
    $username = "root";
    $password = ""; 
    $dbname = "cuahanglaptop";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    return $conn;
}

// Hàm SELECT
function executeSelectQuery($conn, $query) {
    // Chuẩn bị truy vấn với prepared statement
    $stmt = $conn->prepare($query);

    // Thực thi truy vấn
    if ($stmt->execute() === TRUE) {
        // Lấy kết quả từ prepared statement
        $result = $stmt->get_result();

        $data = array(); // Mảng để lưu trữ dữ liệu từ kết quả truy vấn

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        // Đóng prepared statement
        $stmt->close();

        return $data;
    } else {
        return "Lỗi: " . $query . "<br>" . $conn->error;
    }
}


// Hàm CRUD (Create, Read, Update, Delete)
function executeQuery($conn, $query) {
    if ($conn->query($query) === TRUE) {
        return "Thực hiện truy vấn thành công";
    } else {
        return "Lỗi: " . $query . "<br>" . $conn->error;
    }
}

// Hàm đóng kết nối
function closeConnection($conn) {
    $conn->close();
}
?>
