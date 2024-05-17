<?php
// Include your database connection file
require '../../config/connect.php';

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = $_POST;
    $userId = $formData['userId'];
    $fullname = $formData['fullname'];
    $email = $formData['email'];
    $phone = $formData['phone'];
    $address = $formData['address'];
    $provine = $formData['province'];
    $district = $formData['district'];
    $ward = $formData['ward'];
    $cart_detail = $formData['cart_detail'];

    $errors = [];

    if (!preg_match("/\S+/", $fullname)) {
        $errors[] = "Tên không được để trống";
    }

    if (!preg_match("/\S+/", $email)) {
        $errors[] = "Email không được để trống";
    }

    if (!preg_match("/\S+/", $phone)) {
        $errors[] = "Số điện thoại không được để trống";
    }

    if (!preg_match("/\S+/", $address)) {
        $errors[] = "Địa chỉ không được để trống";
    }

    if (!preg_match("/\S+/", $provine)) {
        $errors[] = "Tỉnh/Thành phố không được để trống";
    }

    if (!preg_match("/\S+/", $district)) {
        $errors[] = "Quận/Huyện không được để trống";
    }

    if (!preg_match("/\S+/", $ward)) {
        $errors[] = "Phường/Xã không được để trống";
    }

    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $errors[] = "Email không hợp lệ";
    }
    if (!preg_match("/^0[0-9]{9,10}$/", $phone)) {
        $errors[] = "Số điện thoại không hợp lệ";
    }

    if (!empty($errors)) {
        echo json_encode(['errors' => $errors]);
        exit;
    }

    $response = ['message' => ''];

    $allQueriesSuccessful = true;

    global $conn;

    $sql = "INSERT INTO hoadon (MAKH, MANV, NGAYTAO, TRANGTHAI) VALUES ('$userId', '1', NOW(), '0')";
    // execute the query
    mysqli_query($conn, $sql);
    $last_id = mysqli_insert_id($conn);
    // check if any rows were affected
    if (mysqli_affected_rows($conn) <= 0) {
        $allQueriesSuccessful = false;
        $response['message'] .= 'Cập nhật hóa đơn thất bại! ';
    }

    foreach ($cart_detail as $item) {
        $id = $item['id'];
        $quantity = $item['quantity'];
        for ($i = 0; $i < $quantity; $i++) {
            // Get all MASERI from serial that are not in chitiethoadon for this MASP
            $sql = "SELECT MASERI FROM serial WHERE MASP = '$id' AND MASERI NOT IN (SELECT MASERI FROM chitiethoadon WHERE MASP = '$id')";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // Fetch the first row from the result
                $row = mysqli_fetch_assoc($result);
                $maseri = $row['MASERI'];

                // Insert MAHD, MASP, and MASERI into chitiethoadon
                $sql = "INSERT INTO chitiethoadon (MAHD, MASP, MASERI) VALUES ('$last_id', '$id', '$maseri')";
                mysqli_query($conn, $sql);
                if (mysqli_affected_rows($conn) <= 0) {
                    $allQueriesSuccessful = false;
                    $response['message'] .= 'Cập nhật chi tiết giỏ hàng thất bại! ';
                }
            } else {
                $response['message'] .= 'Không có MASERI nào còn lại cho MASP này. ';
                $allQueriesSuccessful = false;
            }
        }
    }

    $sql = "INSERT INTO diachidathang (MAHD, TINH, HUYEN, XA) VALUES ('$last_id','$provine', '$district', '$ward')";
    // execute the query
    mysqli_query($conn, $sql);
    // check if any rows were affected
    if (mysqli_affected_rows($conn) <= 0) {
        $allQueriesSuccessful = false;
        $response['message'] .= 'Cập nhật địa chỉ đặt hàng thất bại! ';
    }

    // Fetch MAGH from giohang where MAKH is $userId
    $sql = "SELECT MAGH FROM giohang WHERE MAKH = '$userId'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Fetch the first row from the result
        $row = mysqli_fetch_assoc($result);
        $magh = $row['MAGH'];

        // Delete from chitiethoadon where MAGH is $magh
        $sql = "DELETE FROM chitietgiohang WHERE MAGH = '$magh'";
        mysqli_query($conn, $sql);
        if (mysqli_affected_rows($conn) <= 0) {
            $allQueriesSuccessful = false;
            $response['message'] .= 'Xóa chi tiết giỏ hàng thất bại! ';
        }
    } else {
        $response['message'] .= 'Không tìm thấy MAGH cho MAKH này. ';
    }
    // update quantity of product
    foreach ($cart_detail as $item) {
        $id = $item['id'];
        $quantity = $item['quantity'];
        $sql = "UPDATE sanpham SET SOLUONG = SOLUONG - $quantity WHERE MASP = '$id'";
        mysqli_query($conn, $sql);
        if (mysqli_affected_rows($conn) <= 0) {
            $allQueriesSuccessful = false;
            $response['message'] .= 'Cập nhật số lượng sản phẩm thất bại! ';
        }
    }

    if ($allQueriesSuccessful) {
        $response['message'] = 'Đặt hàng thành công!';
    } else {
        $response['message'] = 'Đặt hàng thất bại!';
    }

    echo json_encode($response);
}
?>