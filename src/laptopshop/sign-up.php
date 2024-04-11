

<link rel="stylesheet" href="static/css/style.css">

<div class="log-out">
<a href="index.php"><span class="icon-close"><i class="fa fa-times"></i></span></a>
  <h1>ĐĂNG KÝ</h1>
  <form action="" method="post">
    <input type="hidden" id="action" value="register">
    <div class="item">
      <input id="username" type="text" name="username" required>
      <label>Tài khoản</label>
    </div>

    <div class="item">
        <input id="password" type="password" name="password"required>
        <label>Mật khẩu</label>
    </div>

    <div class="item">
        <input id="confirm_password" type="password" name="confirm_password"required>
        <label>Nhập lại mật khẩu</label>
    </div>

      <div class="item">
      Đã có tài khoản? <a href="sign-in.php">Đăng nhập ngay</a>
    </div>
    <input onclick="submitData()" type="submit" value="Đăng ký">
  </form>
</div>

<?php require 'script.php'; ?>