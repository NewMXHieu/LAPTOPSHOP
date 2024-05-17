<?php
header('Content-Type: application/json');
include 'connect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['province_id'])) {
    $province_id = $_POST['province_id'];
    $district_query = "SELECT * FROM district WHERE province_id = $province_id";
    $result_district = mysqli_query($conn, $district_query);

    if ($result_district) {
        $districts = $result_district->fetch_all(MYSQLI_ASSOC);
        if (is_array($districts) || is_object($districts)) {
            echo json_encode($districts);
        } else {
            echo json_encode(['error' => 'Dữ liệu không phải là mảng hoặc đối tượng']);
        }
    } else {
        echo json_encode(['error' => 'Không thể lấy dữ liệu quận/huyện']);
    }
}
?>