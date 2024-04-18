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

  $fullname = $_POST["fullname"];
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
  $last_id = mysqli_insert_id($conn);
  $query = "INSERT INTO khachhang VALUES('','$fullname','','','','$last_id','')";
  mysqli_query($conn, $query);
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
        // response with userInfo and accountType 
        $dataRespone = json_encode(array("message" => "Login Successful", "userInfo" => $userInfo, "accountType" => $accountType));
        // echo "Login Successful";
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["MATK"];
        $_SESSION["username"] = $userInfo["TEN"];
        $_SESSION["accountType"] = $accountType;
        echo $dataRespone;
      } else {
        echo json_encode(array("message" => "Mật khẩu sai"));
        exit;
      }
      
    } else {
      echo json_encode(array("message" => "Tên tài khoản hoặc mật khẩu sai"));
      exit;
    }
  } catch (Exception $e) {
    echo json_encode(array("message" => "Đã có lỗi xay ra. Vui lòng thử lại sau."));
  }
}
?>