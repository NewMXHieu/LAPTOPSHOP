<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require '../../config/connect.php';
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

  if (empty($username) || empty($password) || empty($confirm_password)) {
    echo json_encode(array("message" => "Please enter your username and password"));
    exit;
  }
  if ($password != $confirm_password) {
    echo json_encode(array("message" => "Passwords do not match"));
    exit;
  }

  $user = mysqli_query($conn, "SELECT * FROM taikhoan WHERE tendn = '$username'");
  if (mysqli_num_rows($user) > 0) {
    echo json_encode(array("message" => "Username Has Already Taken"));
    exit;
  }

  $query = "INSERT INTO taikhoan VALUES('','$currentDateTime', '$username', '$password', '$state')";
  mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  $query = "INSERT INTO khachhang VALUES('','$fullname','','','','$last_id','')";
  mysqli_query($conn, $query);
  $query = "INSERT INTO phanquyen VALUES('$last_id','5')";
  mysqli_query($conn, $query);
  echo json_encode(array("message" => "Registration Successful"));
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
        $query_permission = "SELECT * FROM phanquyen WHERE MATK = " . $row['MATK'];
        $result_permission = mysqli_query($conn, $query_permission);
        $permission = mysqli_fetch_assoc($result_permission);
        switch ($permission['MANHOMQUYEN']) {
          case 1: // Admin
            $accountTableName = 'nhanvien';
            break;
          case 2: // Quản lý
            $accountTableName = 'nhanvien';
            break;
          case 3: // Nhân viên
            $accountTableName = 'nhanvien';
            break;
          case 4: // Thủ kho
            $accountTableName = 'nhanvien';
            break;
          case 5: // Khách hàng
            $accountTableName = 'khachhang';
            break;
        }
        $userInfoSQLResult = mysqli_query($conn, "SELECT * FROM $accountTableName WHERE MATK = '{$row['MATK']}'");

        // check if user not exists
        if (mysqli_num_rows($userInfoSQLResult) <= 0) {
          echo "Tài khoản chưa được kích hoạt hoặc không tồn hoạt. Vui lòng liên hệ với quản trị viên.";
          exit;
        }

        $userInfo = mysqli_fetch_assoc($userInfoSQLResult);

        // Get user's role
        

        // response with userInfo and loginRoute
        $dataRespone = json_encode(array("message" => "Login Successful", "loginRoute" => $permission['MANHOMQUYEN']));
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["MATK"];
        $_SESSION["username"] = $userInfo["TEN"];
        $_SESSION["MANHOMQUYEN"] = $permission['MANHOMQUYEN'];
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
    echo json_encode(array("message" => "Đã có lỗi xảy ra. Vui lòng thử lại sau."));
  }
}
?>