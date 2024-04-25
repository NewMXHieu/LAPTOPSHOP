<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION["id"])) {
  echo "<script>window.location.href = 'trangchu';</script>";
  exit();
}
?>


<link rel="stylesheet" href="static/css/style.css">

<div class="log-in">
  <a href="trangchu"><span class="icon-close"><i class="fa fa-times"></i></span></a>
  <h1>ĐĂNG NHẬP</h1>
  <form autocomplete="off" action="" method="">
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
    <div class="popup_button" id="popup-login-successful">
      <img src="static/image/404-tick.png" alt="">
      <h2>Thông báo</h2>
      <p>Đăng nhập thành công, bạn sẽ chuyển hướng sang trang chủ</p>
      <div class="action-btn">
        <button><a href="trangchu" class="button-link">OK</a></button>
      </div>
    </div>
    <div class="popup_button" id="popup-login-fail">
      <img src="static/image/delete.png" alt="">
      <h2>Thông báo</h2>
      <p></p>
      <div class="action-btn">
        <button onclick="closePopup(event)">OK</button>
      </div>
    </div>
  </form>
</div>

<?php require 'script.php'; ?>