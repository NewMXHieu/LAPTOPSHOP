<?php
include 'config.php'; // include your database connection file
// get the user id from the session or wherever you stored it
$userId = $_SESSION['id'];

// create the SQL query
$query = "SELECT khachhang.*, taikhoan.* FROM khachhang 
          INNER JOIN taikhoan ON khachhang.matk = taikhoan.matk 
          WHERE taikhoan.matk = $userId";

// execute the query
$result = mysqli_query($conn, $query);

// fetch the data
$userData = mysqli_fetch_assoc($result);

?>

<link rel="stylesheet" href="static/css/profile.css">
<div class="user-container">
    <div class="row">
        <div class="main-content" class="col-lg-12">
            <div id="user-information">
                <div class="panel-heading">
                    <span>Thông tin người dùng</span>
                </div>
                <div class="panel-body">
                    <form action="" method="post" class="user-form">
                        <div class="form-group row">
                            <label for="fullname" class="control-label">Họ và tên </label>
                        </div>
                        <div class="user-input">        
                            <input name="txtfullname" type="text" id="txtfullname" class="form-control"  value="<?php echo $userData['TEN']; ?>">
                        </div>
                        <div class="form-group row">
                            <label for="email" class="control-label">Email  </label>
                        </div>
                        <div class="user-input">                  
                            <input name="txtEmail" type="text" id="txtEmail" class="form-control" value="<?php echo $userData['EMAIL']; ?>">
                        </div>
                        <div class="form-group row">
                            <label for="birthday" class="control-label">Ngày sinh </label>
                        </div>
                        <div class="user-input">                  
                            <input name="txtBirthday" type="date" id="txtBirthday" class="form-control"  value="<?php echo $userData['NGAYSINH']; ?>">
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="control-label">Số điện thoại  </label>
                        </div>
                        <div class="user-input">                  
                            <input name="txtPhone" type="text" id="txtPhone" class="form-control"  value="<?php echo $userData['SDT']; ?>">
                        </div>
                        <div class="form-group row">
                            <label for="address" class="control-label">Địa chỉ  </label>
                        </div>
                        <div class="user-input">                  
                            <input name="txtAddress" type="text" id="txtAddress" class="form-control"  value="<?php echo $userData['DIACHI']; ?>">
                        </div>
                        <div class="form-group row">
                            <div class="form-button">
                                <input type="submit" name="" value="Lưu thay đổi" class="btn-info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['id'];

    $fullname = $_POST['txtfullname'];
    $email = $_POST['txtEmail'];
    $birthday = $_POST['txtBirthday'];
    $phone = $_POST['txtPhone'];
    $address = $_POST['txtAddress'];

    // create the SQL query
    $query = "UPDATE khachhang, taikhoan 
              SET khachhang.TEN ='$fullname', khachhang.EMAIL = '$email', khachhang.NGAYSINH = '$birthday', khachhang.SDT = '$phone', khachhang.DIACHI = '$address'
              WHERE khachhang.MATK = taikhoan.MATK AND taikhoan.MATK = $userId";
    // execute the query
    mysqli_query($conn, $query);
    // check if any rows were affected
    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Thay đổi thành công!'); location.reload();</script>";
    }
}
?>