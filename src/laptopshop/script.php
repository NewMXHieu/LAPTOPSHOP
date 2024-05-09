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


          // Extracting data from the response
          let message = response.message;
          let quyen = response.quyen;
          console.log(quyen);

          // Handling login based on permissions and message
          let maQuyenAdmin = [1, 5, 9, 13, 17, 21, 25, 29];

          if (message === "Login Successful") {
            if (quyen == 30 && quyen.length == 1) {
              var popup = document.getElementById('popup-login-successful');
              popup.classList.add("open-popup");
              return;
            }
            if(quyen.some(r=> maQuyenAdmin.includes(+r))) {
              alert("Đăng nhập thành công. Bạn sẽ được chuyển hướng về trang quản lý.");
              window.location.href = 'admin';
              return;
            }
          }

          // Handling registration success
          if (message === "Registration Successful") {
            var popup = document.getElementById('popup-register-successful');
            popup.classList.add("open-popup");
          }

          // Handling login failure messages
          if (["Vui lòng nhập tên đăng nhập và mật khẩu", "Tên tài khoản hoặc mật khẩu sai", "Mật khẩu sai", "Đã có lỗi xảy ra. Vui lòng thử lại sau."].includes(message)) {
            var popup = document.getElementById('popup-login-fail');
            popup.querySelector('p').textContent = message;
            popup.classList.add("open-popup");
          }

          // Handling registration failure messages
          else if (["Vui lòng nhập đầy đủ thông tin", "Mật khẩu không khớp", "Tên tài khoản đã tồn tại"].includes(message)) {
            var popup = document.getElementById('popup-register-fail');
            popup.querySelector('p').textContent = message;
            popup.classList.add("open-popup");
          } else {
            alert(message); // Displaying other error messages
          }
        }
      });
    });
  }

  document.onkeydown = function () {
    if (window.event.keyCode == '13') {
      submitData();
    }
  }
</script>