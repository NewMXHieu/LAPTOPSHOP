<?php
include "../../config/connect.php";
include "../../config/function.php";
?>


<div id="header">
    <div class="logo">
        <a href="trangchu"><img width="80" height="80" src="static/image/laptoplogo.jpg" alt="laptop--v1" /></a>
    </div>

    <!-- <div id="nav">
        <ul>
            <li><a class="nav-link active" href="?action=trangchu">Trang chủ</a></li>
            <li><a class="nav-link" href="?action=sanpham">Sản phẩm</a></li>
            <li><a class="nav-link" href="about">Giới thiệu</a></li>
            <li><a class="nav-link" href="contact">Liên hệ</a></li>
        </ul>
    </div> -->
    <div class="danhmuc"><i class="fa-solid fa-bars"></i> Danh mục</div>
    <div class="search">
        <input class="input-search1" id="txtSearch" type="text" name="fseacrh" placeholder="Nhập từ khóa cần tìm">
        <i class="fa-solid fa-circle-xmark"></i>
        <button class="input-search2" id="bthSearch"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>


    <div class="header-top-right">
        <div class="cart">
            <a href="cart">
                <i class="fa-solid fa-cart-shopping"></i><br>
                <!-- <img src="https://img.icons8.com/ios-glyphs/30/shopping-cart--v1.png" alt="shopping-cart--v1"/><br> -->
                <span>Giỏ hàng</span>
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
    $('.danhmuc').click(function () {
        $('.menu-left-1').toggle();
        $('.overplay').toggle();
    });
    

    $(document).ready(function () {

        // $("#bthSearch").click();
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
        if (window.event.keyCode == '13') {
            $("#bthSearch").click();
        }
    }
    $(".fa-circle-xmark").click(function () {
        search = '';
        localStorage.removeItem('searchValue');
        $('html, body').animate({
            scrollTop: $(".main").offset().top - 160 // Thay ".main" bằng selector của phần hiện sản phẩm của bạn
        }, 'slow');
        delayLoad();
    })



</script>
