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