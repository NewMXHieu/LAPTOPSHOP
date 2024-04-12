<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$conn = mysqli_connect("localhost", "root", "", "cuahanglaptop");

// IF
if (isset($_POST["action"])) {
  if ($_POST["action"] == "register") {
    register();
  } else if ($_POST["action"] == "login") {
    login();
  }
}

// REGISTER
function register()
{
  global $conn;


  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];
  $currentDateTime = date('Y-m-d');
  $state = 1;
  $accountType = 'KH';

  if (empty($username) || empty($password) || empty($confirm_password)) {
    echo "Please Fill Out The Form!";
    exit;
  }
  if ($password != $confirm_password) {
    echo "Passwords Do Not Match";
    exit;
  }

  $user = mysqli_query($conn, "SELECT * FROM taikhoan WHERE tendn = '$username'");
  if (mysqli_num_rows($user) > 0) {
    echo "Username Has Already Taken";
    exit;
  }

  $query = "INSERT INTO taikhoan VALUES('','$currentDateTime', '$username', '$password', '$state', '$accountType')";
  mysqli_query($conn, $query);
  echo "Registration Successful";
}

function getAccountTableName($accountType)
{
  if ($accountType == 'NV') {
    return 'nhanvien';
  } else if ($accountType == 'KH') {
    return 'khachhang';
  }
  // else if($accountType == 'QL'){
  //   return 'quanly';
  // }
  return 'khachhang';
}

// LOGIN
function login()
{
  try {
    global $conn;

    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = mysqli_query($conn, "SELECT * FROM taikhoan WHERE tendn = '$username'");

    if (mysqli_num_rows($user) > 0) {

      $row = mysqli_fetch_assoc($user);

      if ($password == $row['MATKHAU']) {
        $accountType = $row['LOAITK'];
        $accountTableName = getAccountTableName($accountType);
        $userInfoSQLResult = mysqli_query($conn, "SELECT * FROM $accountTableName WHERE MATK = '{$row['MATK']}'");

        // check if user not exists
        if (mysqli_num_rows($userInfoSQLResult) <= 0) {
          echo "Tài khoản chưa được kích hoạt hoặc không tồn hoạt. Vui lòng liên hệ với quản trị viên.";
          exit;
        }

        $userInfo = mysqli_fetch_assoc($userInfoSQLResult);

        echo "Login Successful";
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["MATK"];
        $_SESSION["username"] = $userInfo["TEN"];
      } else {
        echo "Mật khẩu không đúng";
        exit;
      }
    } else {
      echo "Tên đăng nhập hoặc mật khẩu không đúng.";
      exit;
    }
  } catch (Exception $e) {
    echo "Đã có lỗi xảy ra, vui lòng thử lại sau. ";
  }

}
?>