<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
  function closePopup(event) {
    event.preventDefault();
    var popupIds = ['popup-register-successful', 'popup-login-successful', 'popup-login-fail', 'popup-register-fail'];
    for (var i = 0; i < popupIds.length; i++) {
      var popup = document.getElementById(popupIds[i]);
      if (popup) {
        popup.classList.remove("open-popup");
      }
    };
  }

  function submitData() {
    $(document).ready(function() {
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
        success: function(response) {
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
            var popup = document.getElementById('popup-register-successful');
            popup.classList.add("open-popup");
          } else if (response.message == "Login Successful" && response.loginRoute == '5') {
            var popup = document.getElementById('popup-login-successful');
            popup.classList.add("open-popup");
          } else if (response.message == "Login Successful" && response.loginRoute == '1') {
            alert("Đăng nhập thành công. Bạn sẽ được chuyển hướng về trang admin.");
            window.location.href = 'admin'; // Chuyển hướng đến trang quản lý
          } else if (response.message == "Login Successful" && response.loginRoute == '2') {
            alert("Đăng nhập thành công. Bạn sẽ được chuyển hướng về trang quản lý.");
            window.location.href = 'admin'; // Chuyển hướng đến trang quản lý
          } else if (response.message == "Login Successful" && response.loginRoute == '3') {
            alert("Đăng nhập thành công. Bạn sẽ được chuyển hướng về trang quản lý.");
            window.location.href = 'admin'; // Chuyển hướng đến trang quản lý
          } else if (response.message == "Vui lòng nhập tên đăng nhập và mật khẩu" || response.message == "Tên tài khoản hoặc mật khẩu sai" || response.message == "Mật khẩu sai" || response.message == "Đã có lỗi xảy ra. Vui lòng thử lại sau.") {
            var popup = document.getElementById('popup-login-fail');
            popup.querySelector('p').textContent = response.message;
            popup.classList.add("open-popup");
          } else if (response.message == "Vui lòng nhập đầy đủ thông tin" || response.message == "Mật khẩu không khớp" || response.message == "Tên tài khoản đã tồn tại") {
            var popup = document.getElementById('popup-register-fail');
            popup.querySelector('p').textContent = response.message;
            popup.classList.add("open-popup");
          } else {
            alert(response.message); // Hiển thị thông báo lỗi
          }
        }
      });
    });
  }
  document.onkeydown = function() {
    if (window.event.keyCode == '13') {
      submitData();
    }
  }
</script>