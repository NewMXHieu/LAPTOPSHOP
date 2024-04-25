<?php
require '../api/login-register.php';
if (isset($_SESSION["id"])) {
  header("Location: index.php");
}
?>

<link rel="stylesheet" href="static/css/style.css">

<div class="log-out">
  <a href="trangchu"><span class="icon-close"><i class="fa fa-times"></i></span></a>
  <h1>ĐĂNG KÝ</h1>
  <form action="" method="post">
    <input type="hidden" id="action" value="register">
    <div class="item">
      <input id="fullname" type="text" name="fullname" required>
      <label>Họ tên</label>
    </div>
    <div class="item">
      <input id="username" type="text" name="username" required>
      <label>Tài khoản</label>
    </div>

    <div class="item">
      <input id="password" type="password" name="password" required>
      <label>Mật khẩu</label>
    </div>

    <div class="item">
      <input id="confirm_password" type="password" name="confirm_password" required>
      <label>Nhập lại mật khẩu</label>
    </div>

    <div class="item">
      Đã có tài khoản? <a href="sign-in">Đăng nhập ngay</a>
    </div>
    <button onclick="submitData()" type="button" value="button">Đăng ký</button>
    <link rel="stylesheet" href="static/css/popup.css">
    <div class="popup_button" id="popup-register">
      <img src="static/image/404-tick.png" alt="">
      <h2>Thông báo</h2>
      <p>Đăng ký thành công, bạn có muốn đăng nhập ngay không?</p>
      <div class="action-btn">
        <button onclick="closePopup()">Hủy</button>
        <button><a href="sign-in" class="button-link">OK</a></button>
      </div>
    </div>
  </form>
</div>

<?php require 'script.php'; ?>