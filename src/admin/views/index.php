<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/admin/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Trang quản lý</title>
</head>

<body>

    <!-- sidebar -->
    <div class="sidebar">

        <div class="sidebar-header">
            <a href="#">
                <div class="sidebar-header-image">
                    <i class="fa-solid fa-laptop"></i>
                </div>
                <p class="sidebar-header-name">Cửa hàng laptop</p>
            </a>
        </div>

        <div class="sidebar-content">
            <div class="sidebar-content-name">Bảng điều khiển</div>
            <ul class="sidebar-control-list">

                <!-- layout trang chủ -->
                <li class="sidebar-control-list-item" id="admin-trangchu-layout" name="admin-trangchu-layout">
                    <a href="#content-trangchu">
                        <div class="sidebar-item-image">
                            <i class="fa-solid fa-house"></i>
                        </div>
                        <div class="sidebar-item-name">Trang chủ</div>
                    </a>
                </li>


                <!-- layout nhân viên -->
                <li class="sidebar-control-list-item" id="admin-nhanvien-layout" name="admin-nhanvien-layout">
                    <a href="#content-nhanvien">
                        <div class="sidebar-item-image">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="sidebar-item-name">Quản lý nhân viên</div>
                    </a>
                </li>

                <!-- layout khách hàng -->
                <li class="sidebar-control-list-item" id="admin-khachhang-layout" name="admin-khachhang-layout">
                    <a href="#content-khachhang">
                        <div class="sidebar-item-image">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="sidebar-item-name">Quản lý khách hàng</div>
                    </a>
                </li>

                <!-- layout sản phẩm -->
                <li class="sidebar-control-list-item" id="admin-sanpham-layout" name="admin-sanpham-layout">
                    <a href="#content-sanpham">
                        <div class="sidebar-item-image">
                            <i class="fa-solid fa-laptop"></i>
                        </div>
                        <div class="sidebar-item-name">Quản lý sản phẩm</div>
                    </a>
                </li>
                <!-- layout đơn hàng -->
                <li class="sidebar-control-list-item" id="admin-sanpham-layout" name="admin-sanpham-layout">
                    <a href="#content-donhang">
                        <div class="sidebar-item-image">
                            <i class="fa-solid fa-laptop"></i>
                        </div>
                        <div class="sidebar-item-name">Quản lý đơn hàng</div>
                    </a>
                </li>

                <!-- layout thống kê -->
                <li class="sidebar-control-list-item" id="admin-thongke-layout" name="admin-thongke-layout">
                    <a href="#content-thongke">
                        <div class="sidebar-item-image">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div class="sidebar-item-name">Thống kê</div>
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-footer">

            <div class="sidebar-footer-name">Chức năng khác</div>

            <ul class="sidebar-footer-control-list">
                <li class="sidebar-footer-control-list-item" id="admin-username" name="admin-username">
                    <a href="#">
                        <div class="sidebar-item-image">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <div class="sidebar-item-name">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo $_SESSION['username'];
                            } else {
                                echo "Null admin";
                            }
                            ?>
                        </div>
                    </a>
                </li>

                <li class="sidebar-footer-control-list-item" id="admin-back-btn" name="admin-back-btn">
                    <a href="trangchu">
                        <div class="sidebar-item-image">
                            <i class="fa-solid fa-arrow-left"></i>
                        </div>
                        <div class="sidebar-item-name">Trở lại trang chính</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- content -->
    <div class="content">
        <!-- layout trang chủ -->
        <div class="content-item" id="content-trangchu">
            <div class="content-header">Trang chủ</div>
            <div class="content-main">
                <div class="content-main-trangchu-cards">
                    <!-- item user -->
                    <div class="content-main-trangchu-card 1">
                        <div class="content-main-trangchu-card-header">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="content-main-trangchu-card-name">Users</div>
                        <div class="content-main-trangchu-card-detail">
                            <div class="content-main-trangchu-card-detail-nhanvien" id="admin-trangchu-user-nhanvien"
                                name="admin-trangchu-user-nhanvien"></div>
                            <div class="content-main-trangchu-card-detail-khachhang" id="admin-trangchu-user-khachhang"
                                name="admin-trangchu-user-khachhang"></div>
                        </div>
                    </div>

                    <!-- item product -->
                    <div class="content-main-trangchu-card 2">
                        <div class="content-main-trangchu-card-header">
                            <i class="fa-solid fa-laptop"></i>
                        </div>
                        <div class="content-main-trangchu-card-name">Products</div>
                        <div class="content-main-trangchu-card-detail">
                            <div class="content-main-trangchu-card-detail-nhanvien" id="admin-trangchu-product"
                                name="admin-trangchu-product"></div>
                            <div class="content-main-trangchu-card-detail-khachhang" id="admin-trangchu-product"
                                name="admin-trangchu-product"></div>
                        </div>
                    </div>

                    <!-- item doanh thu -->
                    <div class="content-main-trangchu-card 3">
                        <div class="content-main-trangchu-card-header">
                            <i class="fa-solid fa-money-bill"></i>
                        </div>
                        <div class="content-main-trangchu-card-name">Doanh thu</div>
                        <div class="content-main-trangchu-card-detail">
                            <div class="content-main-trangchu-card-detail-nhanvien" id="admin-trangchu-doanhthu"
                                name="admin-trangchu-doanhthu">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- layout nhân viên -->
        <?php include 'layout_nhanvien.php' ?>

        <!-- layout khách hàng -->
        <?php include 'layout_khachhang.php' ?>

        <!-- layout Sản phẩm -->
        <?php include 'layout_sanpham.php' ?>

        <!-- layout Đơn hàng -->
        <?php include 'layout_donhang.php' ?>
        <!-- layout thống kê -->
        <?php include 'layout_thongke.php' ?>
    </div>



    <script src="static/admin/js/admin.js"></script>
</body>

</html>