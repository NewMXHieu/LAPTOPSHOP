<?php
// include
// include

session_start();
$username = $_SESSION['username'];
?>

<?php
// $slider =  execute("SELECT * FROM  image WHERE type = 0 and status = 0 ORDER BY ordering limit 0,5")->fetch_all(MYSQLI_ASSOC);
// $banner =  execute("SELECT * FROM  image WHERE type = 1 and status = 0 ORDER BY ordering")->fetch_all(MYSQLI_ASSOC);
// $payment =  execute("SELECT * FROM  image WHERE type = 3 and status = 0 ORDER BY ordering DESC limit 0,5")->fetch_all(MYSQLI_ASSOC);
?>

<link rel="stylesheet" href="static/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<div id="header">
    <div class="logo">
        <a href="index.php"><img width="80" height="80" src="static/image/logo.jpg" alt="laptop--v1" /></a>
    </div>

    <div id="nav">
        <ul>
            <li><a class="nav-link active" href="trangchu">Trang chủ</a></li>
            <li><a class="nav-link" href="sanpham">Sản phẩm</a></li>
            <li><a class="nav-link" href="about">Giới thiệu</a></li>
            <li><a class="nav-link" href="contact">Liên hệ</a></li>
        </ul>
    </div>
    <!-- <div class="search">
           <form action="" method="get">
                <input class="input-search1" type="text" name="fseacrh" placeholder="Search in here...">
                <input class="input-search2" type="submit" name="search" value="Search">
            </form>
        </div> -->


    <div class="header-top-right">
        <div class="alert">
            <a href="/">
                <i class="fa-regular fa-bell"></i><br>
                <!-- <img src="https://img.icons8.com/plasticine/100/bell--v1.png" alt="bell--v1"/><br> -->
                <span>Thông báo</span>
            </a>
        </div>
        <div class="cart">
            <a href="cart.php">
                <i class="fa-solid fa-cart-shopping"></i><br>
                <!-- <img src="https://img.icons8.com/ios-glyphs/30/shopping-cart--v1.png" alt="shopping-cart--v1"/><br> -->
                <span>Giỏ hàng</span>
            </a>
        </div>

        <?php if (isset($_SESSION['username'])) { ?>
            <div class="menu-right">
                <a href="logout">
                    <i class="fa-solid fa-sign-out-alt"></i><br>
                    <!-- <img src="https://img.icons8.com/plasticine/100/sign-out--v1.png" alt="sign-out--v1"/><br> -->
                    <span>Đăng xuất</span>
                </a>
            </div>
        <?php } else {?>
        <div class="login">
            <a href="login">
                <i class="fa-regular fa-circle-user"></i><br>
                <!-- <img src="https://img.icons8.com/pulsar-line/48/guest-male.png" alt="guest-male"/><br> -->
                <span>Đăng nhập</span>
            </a>
        </div>
        <?php }?>
    </div>
</div>