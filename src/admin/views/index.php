<?php
session_start();
include '../functions/getDsQuyenTheoTaiKhoan.php';

function maQuyenTonTai($maquyen, $maquyenCanKiemTra)
{
    foreach ($maquyen as $key => $value) {
        if ($value == $maquyenCanKiemTra) {
            return true;
        }
    }
    return false;
}
?>
<script>
    var quyen = <?php echo json_encode($maquyen); ?>;
    const fragment = window.location.hash

    const listFragmentsWithPermission = {
        1: '#content-sanpham',
        5: '#content-nhanvien',
        9: '#content-khachhang',
        13: '#content-donhang',
        17: '#content-phanquyen',
        21: '#content-nhaphang',
        25: '#content-baohanh',
        29: '#content-thongke',
    }
    const permittedFragments = quyen.map(permission => listFragmentsWithPermission[permission])
    if(!permittedFragments.includes(fragment)){
        window.location.hash = ''   
    }
    window.onhashchange = () => {
        const fragment = window.location.hash
        if(!permittedFragments.includes(fragment)){
            window.location.hash = ''
        }
    }

</script>
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
                    <img src="static/image/laptoplogo.png" alt="">
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
                <?php
                $functions = [
                    5 => '
                    <!-- layout nhân viên -->
                    <li class="sidebar-control-list-item" id="admin-nhanvien-layout" name="admin-nhanvien-layout">
                        <a href="#content-nhanvien">
                            <div class="sidebar-item-image">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="sidebar-item-name">Quản lý nhân viên</div>
                        </a>
                    </li>',
                    9 => '
                    <!-- layout khách hàng -->
                    <li class="sidebar-control-list-item" id="admin-khachhang-layout" name="admin-khachhang-layout">
                        <a href="#content-khachhang">
                            <div class="sidebar-item-image">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div class="sidebar-item-name">Quản lý khách hàng</div>
                        </a>
                    </li>',
                    1 => '
                    <!-- layout sản phẩm -->
                    <li class="sidebar-control-list-item" id="admin-sanpham-layout" name="admin-sanpham-layout">
                        <a href="#content-sanpham">
                            <div class="sidebar-item-image">
                                <i class="fa-solid fa-laptop"></i>
                            </div>
                            <div class="sidebar-item-name">Quản lý sản phẩm</div>
                        </a>
                    </li>',
                    13 => '
                    <!-- layout đơn hàng -->
                    <li class="sidebar-control-list-item" id="admin-sanpham-layout" name="admin-sanpham-layout">
                        <a href="#content-donhang">
                            <div class="sidebar-item-image">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <div class="sidebar-item-name">Quản lý đơn hàng</div>
                        </a>
                    </li>',
                    17 => '
                <!-- layout phân quyền -->
                <li class="sidebar-control-list-phanquyen" id="admin-phanquyen-layout" name="admin-phanquyen-layout">
                    <div class="dropdown-btn">
                        <div class="sidebar-item-image">
                            <i class="fa-solid fa-sitemap"></i>
                        </div>
                        <div class="sidebar-item-name" style="display: flex">Phân quyền
                            <div class="sidebar-item-image">
                                <i class="fa fa-caret-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-content">
                        <a href="#content-phanquyen-taikhoan">
                            <div class="sidebar-item-image">
                                <i class="fa-solid fa-user-gear"></i>
                            </div>
                            <div class="sidebar-item-name">Tài khoản</div>
                        </a>
                        <a href="#content-phanquyen-nhomquyen">
                            <div class="sidebar-item-image">
                                <i class="fa-solid fa-users-gear"></i>
                            </div>
                            <div class="sidebar-item-name">Nhóm quyền</div>
                        </a>
                    </div>
                </li>
                <script>
                    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
                    var dropdown = document.getElementsByClassName("dropdown-btn");
                    var i;

                    for (i = 0; i < dropdown.length; i++) {
                        dropdown[i].addEventListener("click", function () {
                            this.classList.toggle("active");
                            var dropdownContent = this.nextElementSibling;
                            if (dropdownContent.style.display === "block") {
                                dropdownContent.style.display = "none";
                            } else {
                                dropdownContent.style.display = "block";
                            }
                        });
                    }

                </script>',
                    21 => '
                <!-- layout nhập hàng -->
                <li class="sidebar-control-list-item" id="admin-nhaphang-layout" name="admin-thongke-layout">
                    <a href="#content-nhaphang">
                        <div class="sidebar-item-image">
                            <i class="fa-solid fa-parachute-box"></i>
                        </div>
                        <div class="sidebar-item-name">Nhập hàng</div>
                    </a>
                </li>',
                    25 => '
                <!-- layout bảo hành -->
                <li class="sidebar-control-list-item" id="admin-baohanh-layout" name="admin-thongke-layout">
                    <a href="#content-baohanh">
                        <div class="sidebar-item-image">
                            <i class="fa-solid fa-circle-notch"></i>
                        </div>
                        <div class="sidebar-item-name">Bảo hành</div>
                    </a>
                </li>',
                29 => '
                <!-- layout thống kê -->
                <li class="sidebar-control-list-item" id="admin-thongke-layout" name="admin-thongke-layout">
                    <a href="#content-thongke">
                        <div class="sidebar-item-image">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div class="sidebar-item-name">Thống kê</div>
                    </a>
                </li>',
                ];
                foreach ($maquyen as $key => $value) {
                    if (array_key_exists($value, $functions)) {
                        echo $functions[$value];
                    }
                }
                ?>
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
                    <?php
                    $href = '';
                    if (in_array(30, $maquyen) && count($maquyen) > 1) {
                        $href .= 'trangchu';
                    } else {
                        $href .= 'logout';
                    }
                    ?>
                    <a href="<?php echo $href; ?>">
                        <div class="sidebar-item-image">
                            <i class="fa-solid fa-arrow-left"></i>
                        </div>
                        <div class="sidebar-item-name">Trở lại trang chính</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="toggler">
        <i class="fa-solid fa-bars" id="toggle-bars"></i>
        <i class="fa-solid fa-xmark" id="toggle-cross"></i>
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
                            <div class="content-main-trangchu-card-detail-item" id="admin-trangchu-user-nhanvien"
                                name="admin-trangchu-user-nhanvien"></div>
                            <div class="content-main-trangchu-card-detail-item" id="admin-trangchu-user-khachhang"
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
                            <div style="scale: 400%;" id="dataproduct"></div>
                        </div>
                    </div>

                    <!-- item doanh thu -->
                    <div class="content-main-trangchu-card 3">
                        <div class="content-main-trangchu-card-header">
                            <i class="fa-solid fa-money-bill"></i>
                        </div>
                        <div class="content-main-trangchu-card-name">Doanh thu</div>
                        <div class="content-main-trangchu-card-detail">
                            <div style="scale: 200%;" id="datadoanhthu"></div>
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

        <!-- layout phân quyền -->
        <?php include 'layout_nhomquyen.php' ?>

        <!-- layout tài khoản  -->
        <?php include 'layout_taikhoan.php' ?>

        <!-- layout thống kê -->
        <?php include 'layout_thongke.php' ?>

        <!-- layout nhập hàng -->
        <?php include 'layout_nhaphang.php' ?>

        <!-- layout bảo hành -->
        <?php include 'layout_baohanh.php' ?>
    </div>



    <script src="static/admin/js/admin.js"></script>
</body>

</html>