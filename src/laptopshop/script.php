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
        url: 'src/laptopshop/function.php',
        type: 'post',
        data: data,
        success: function (response) {
          if (response == "Registration Successful") {
            alert("Đăng ký thành công. Bạn có muốn đăng nhập ngay không?");
            window.location.href = 'sign-in'; // Chuyển hướng đến trang đăng nhập
          }
          else if (response == "Login Successful") {
            alert("Đăng nhập thành công. Bạn sẽ được chuyển hướng về trang chủ.");
            window.location.href = 'trangchu'; // Chuyển hướng đến trang chủ
          }
          else {
            alert(response); // Hiển thị thông báo lỗi
          }
        }
      });
    });
  }
</script>