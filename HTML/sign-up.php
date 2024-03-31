<?php
  include 'layout/header.php';
?>

<link rel="stylesheet" href="css/style.css">

<div class="log-out">
<a href="index.php"><span class="icon-close"><i class="fa fa-times"></i></span></a>
  <h1>ĐĂNG KÝ</h1>
  <form action="" method="post">

    <div class="item">
      <input type="text" required>
      <label>Tài khoản</label>
    </div>

    <div class="item">
        <input type="password" required>
        <label>Mật khẩu</label>
    </div>

    <div class="item">
        <input type="password" required>
        <label>Nhập lại mật khẩu</label>
    </div>

    <div class="item2">
        Giới tính: 
        <input name="gt" type="radio"> Nam
       <input name="gt" type="radio"> Nữ
    </div>

    <div class="item">
      Đã có tài khoản? <a href="sign-in.php">Đăng nhập ngay</a>
    </div>
    <input type="submit" value="Đăng ký">
  </form>
</div>
<?php
    include 'layout/footer.php';
?>