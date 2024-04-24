<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
  function submitData() {
    $(document).ready(function () {
      console.log('submitData');
      var data = {
        fullname: $("#fullname").val(),
        username: $("#username").val(),
        password: $("#password").val(),
        confirm_password: $("#confirm_password").val(),
        action: $("#action").val(),
      };

      $.ajax({
        url: 'api/login-register.php',
        type: 'post',
        data: data,
        success: function (response) {
          if (response) {
            try {
              response = JSON.parse(response);
            } catch (e) {
              console.error('Invalid JSON:', response);
            }
          } else {
            console.error('Response is empty');
          }

          if (response.message == "Registration Successful") {
            alert("Đăng ký thành công. Bạn có muốn đăng nhập ngay không?");
            window.location.href = 'sign-in'; // Chuyển hướng đến trang đăng nhập
          }
          else if (response.message == "Login Successful" && response.loginRoute == '5') {
            alert("Đăng nhập thành công. Bạn sẽ được chuyển hướng về trang chủ.");
            window.location.href = 'trangchu'; // Chuyển hướng đến trang chủ
          }
          else if (response.message == "Login Successful" && response.loginRoute == '1') {
            alert("Đăng nhập thành công. Bạn sẽ được chuyển hướng về trang admin.");
            window.location.href = 'admin'; // Chuyển hướng đến trang quản lý
          }
          else if (response.message == "Login Successful" && response.loginRoute == '2') {
            alert("Đăng nhập thành công. Bạn sẽ được chuyển hướng về trang quản lý.");
            window.location.href = 'admin'; // Chuyển hướng đến trang quản lý
          }
          else if (response.message == "Login Successful" && response.loginRoute == '3') {
            alert("Đăng nhập thành công. Bạn sẽ được chuyển hướng về trang quản lý.");
            window.location.href = 'admin'; // Chuyển hướng đến trang quản lý
          }
          else {
            alert(response.message); // Hiển thị thông báo lỗi
          }
        }
      });
    });
  }
  document.onkeydown=function(){
    if(window.event.keyCode=='13'){
        submitData();
    }
  }
</script>