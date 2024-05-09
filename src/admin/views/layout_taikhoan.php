<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>phân quyền tài khoản</title>
</head>

<body>
    <div class="layout">
        <div class="content-item" id="content-phanquyen-taikhoan">
            <div class="content-header">Quản lý tài khoản</div>
            <div class="content-main">
                <div class="content-main-control">
                    <div class="content-main-select">
                        <select name="admin-taikhoan-select" id="admin-taikhoan-select" onchange="showTaiKhoan()">
                            <option value="0">Tất cả </option>
                            <option value="1">Admin</option>
                            <option value="2">Quản lý</option>
                            <option value="3">Nhân viên</option>
                            <option value="4">Thủ kho</option>
                            <option value="5">Khách hàng</option>
                        </select>
                    </div>
                    <div class="content-main-searchbar">
                        <form action="searchbar.php" method="get">
                            <input type="text" id="content-main-searchbar-taikhoan" oninput="showTaiKhoan()">
                            <i class="fa-solid fa-magnifying-glass" onclick="showTaiKhoan()"></i>
                        </form>
                    </div>
                    <div class="content-main-control-filter">
                        <button id="addNewTaiKhoan"><i class="fa-solid fa-plus"></i></button>
                        <button id="resetBtnTaiKhoan" onclick="resetDataTaiKhoan()"><i
                                class="fa-solid fa-arrows-rotate"></i></button>
                        <button id="filterByBotToTopBtnTaiKhoan" onclick="filterByBotToTopTaiKhoan()"><i
                                class="fa-solid fa-sort-up"></i></button>
                        <button id="filterByToptoBotBtnTaiKhoan" onclick="filterByTopToBotTaiKhoan()"><i
                                class="fa-solid fa-sort-down"></i></button>
                    </div>
                </div>
                <div class="content-main-table">
                    <table style="width:100%" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>MÃ TÀI KHOẢN</th>
                                <th>TÊN ĐĂNG NHẬP</th>
                                <th>MÂT KHẨU</th>
                                <th>NGÀY TẠO</th>
                                <th>NHÓM QUYỀN</th>
                                <th>TRẠNG THÁI</th>
                                <th>CHỨC NĂNG</th>
                            </tr>
                        </thead>

                        <tbody id="dataTaiKhoan">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <?php include 'modal_taikhoan.php' ?>
    </div>

</body>
<script src="static/admin/js/layout_taikhoan.js"></script>

</html>