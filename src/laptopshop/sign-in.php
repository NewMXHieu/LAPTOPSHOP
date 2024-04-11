<?php
require 'function.php';
if(isset($_SESSION["id"])){
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
      <input id="username" type="text" name="username"required>
      <label>Tài khoản</label>
    </div>

    <div class="item">
      <input id="password" type="password" name="password" required>
      <label>Mật khẩu</label>
    </div>

    <div class="item">
      Chưa có tài khoản? <a href="?action=sign-up">Đăng ký ngay</a>
    </div>

    <button type="button" onclick="submitData();">Đăng nhập</button>

  </form>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
  function submitData(){
    $(document).ready(function(){
      console.log('submitData');
      var data = {
        username: $("#username").val(),
        password: $("#password").val(),
        confirm_password: $("#confirm_password").val(),
        action: $("#action").val(),
      };

      $.ajax({
        url: 'src/laptopshop/function.php',
        type: 'post',
        data: data,
        success:function(response){
          alert(response);
          if(response == "Login Successful"){
            window.location.reload();
          }
        }
      });
    });
  }
</script>


<!-- <script type="text/javascript">
  function onClickSubmitLogin() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if(!username || !password) {
      alert('Vui lòng nhập đầy đủ thông tin');
      return;
    }

    console.log(username, password);
    fetch('api/login.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        username: username,
        password: password
      })
    }).then(response => response.json())
      .then(data => {
        console.log('GET Response:', data);
          if (data.status === 'success') {
        // Login successful, show a success message and redirect to the home page
        alert(data.message);
        window.location.href = 'index.php';
      } else {
        // Login failed, show an error message
        alert(data.message);
      }
    })
}

</script> -->