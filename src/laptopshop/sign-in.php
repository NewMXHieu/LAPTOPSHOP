<?php
require '../api/login-register.php';
if (isset($_SESSION["id"])) {
  header("Location: trangchu");
}
?>


<link rel="stylesheet" href="static/css/style.css">

<div class="log-in">
  <a href="trangchu"><span class="icon-close"><i class="fa fa-times"></i></span></a>
  <h1>ĐĂNG NHẬP</h1>
  <form autocomplete="off" action="" method="post">
    <input type="hidden" id="action" value="login">
    <div class="item">
      <input id="username" type="text" name="username" required>
      <label>Tài khoản</label>
    </div>

    <div class="item">
      <input id="password" type="password" name="password" required>
      <label>Mật khẩu</label>
    </div>

    <div class="item">
      Chưa có tài khoản? <a href="sign-up">Đăng ký ngay</a>
    </div>

    <button type="button" onclick="submitData();">Đăng nhập</button>
    <link rel="stylesheet" href="static/css/popup.css">
    <div class="popup_button" id="popup-login">
      <img src="static/image/404-tick.png" alt="">
      <h2>Thông báo</h2>
      <p>Đăng nhập thành công, bạn sẽ chuyển hướng sang trang chủ</p>
      <div class="action-btn">
        <button onclick="closePopup()">OK</button>
      </div>
    </div>
  </form>
</div>

<?php require 'script.php'; ?>