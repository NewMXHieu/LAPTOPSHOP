<?php
include "../../config/connect.php";
include "../../config/function.php";
$cartCount = 0;
if (isset($_SESSION['product_cart'])) {
    $cartCount = count($_SESSION['product_cart']);
}
?>


<div id="header">
    <div class="logo">
        <a href="trangchu"><img width="80" height="80" src="static/image/laptoplogo.png" alt="laptop--v1" /></a>
    </div>

    <div class="danhmuc"><i class="fa-solid fa-bars"></i> Danh mục</div>
    <div class="search">
        <input class="input-search1" id="txtSearch" type="text" name="fseacrh" placeholder="Nhập từ khóa cần tìm">
        <i class="fa-solid fa-circle-xmark"></i>
        <button class="input-search2" id="bthSearch"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>


    <div class="header-top-right">
        <div class="cart">
            <div class="notify-cart"><?php echo $cartCount; ?></div>
            <a href="cart">
                <i class="fa-solid fa-cart-shopping"></i><br>
                <span>Giỏ hàng</span>
                <div id="quantity">0</div>
            </a>
        </div>

        <?php if (isset($_SESSION['username'])) { ?>
            <div id="account_logged" class="dropdown">
                <button class="dropbtn">
                    <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?>
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="profile">Thông tin cá nhân</a>
                    <a href="orderstatus">Đơn hàng</a>
                    <a href="logout">Đăng xuất</a>
                </div>
            </div>
        <?php } else { ?>
            <div class="login">
                <a href="sign-in">
                    <i class="fa-regular fa-circle-user"></i><br>
                    <!-- <img src="https://img.icons8.com/pulsar-line/48/guest-male.png" alt="guest-male"/><br> -->
                    <span>Đăng nhập</span>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    var count = 0;
    function updateCartCount() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'api/get_cart_count.php', true);
        xhr.onload = function () {
            if (this.status == 200) {
                count = this.responseText;
                console.log(count);
                var cartNotification = document.querySelector('.notify-cart');
                if (cartNotification) {
                    cartNotification.textContent = count;
                }
            }
        };
        xhr.send();
    }
</script>
<script>
    $('.danhmuc').click(function () {
        $('.menu-left-1').toggle();
        $('.overplay').toggle();
    });


    $(document).ready(function () {
        delayLoad();
    });
    $("#bthSearch").click(function () {
        search = $("#txtSearch").val().trim();
        if (window.location.href !== "/laptopshop/trangchu#") {
            localStorage.setItem('searchValue', search);
            window.location.href = "http://localhost/laptopshop/trangchu#";
        }
        delayLoad();
        $("#resetBtn").click();
        $('html, body').animate({
            scrollTop: $(".main").offset().top - 160 // Thay ".main" bằng selector của phần hiện sản phẩm của bạn
        }, 'slow');
    })

    function delayLoad() {
        page = 1;
        if (localStorage.getItem('searchValue')) {
            search = localStorage.getItem('searchValue');
            // localStorage.removeItem('searchValue');
        }

        $("#txtSearch").val(search);
        readData(search);
        Pagination(search);
    }
    document.onkeydown = function () {
        $("#txtSearch").keydown(function(event){
            if (event.keyCode == 13) {
                $("#bthSearch").click();
            }
        })
    }
    $(".fa-circle-xmark").click(function () {
        search = '';
        localStorage.removeItem('searchValue');
        $('html, body').animate({
            scrollTop: $(".main").offset().top - 160 // Thay ".main" bằng selector của phần hiện sản phẩm của bạn
        }, 'slow');
        $("#resetBtn").click();
        delayLoad();
    })

</script>