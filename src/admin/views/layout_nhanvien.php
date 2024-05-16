<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/admin/css/layout_nhanvien.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Sản Phẩm</title>
</head>

<body>
    <div class="layout">
        <div class="content-item" id="content-nhanvien">
            <div class="content-header">Quản lý nhân viên</div>
            <div class="content-main">
                <div class="content-main-control">
                    <div class="content-main-select">
                        <select name="admin-nhanvien-select" id="admin-nhanvien-select" onchange="showNhanVien()">
                            <option value="0" selected>Tất cả</option>
                            <option value="1">Hoạt động</option>
                            <option value="2">Đã ẩn</option>
                        </select>
                    </div>
                    <div class="content-main-searchbar">
                        <form action="searchbar.php" method="get">
                            <input type="text" id="content-main-searchbar-nhanvien" oninput="showNhanVien()">
                            <i class="fa-solid fa-magnifying-glass" onclick="showNhanVien()"></i>
                        </form>
                    </div>
                    <div class="content-main-control-filter">
                        <?php
                        if (maQuyenTonTai($maquyen, 6)) {
                            echo '<button id="addNewNhanVien"><i class="fa-solid fa-plus"></i></button>';
                        }
                        ?>
                        <button id="resetBtnnhanvien" onclick="resetDataNhanVien()"><i
                                class="fa-solid fa-arrows-rotate"></i></button>
                        <button id="filterByBotToTopBtnnhanvien" onclick="filterByBotToTopNV()"><i
                                class="fa-solid fa-sort-up"></i></button>
                        <button id="filterByToptoBotBtnnhanvien" onclick="filterByTopToBotNV()"><i
                                class="fa-solid fa-sort-down"></i></button>
                    </div>
                </div>
                <div class="content-main-table">
                    <table style="width:100%" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>MÃ NV</th>
                                <th>HỌ VÀ TÊN</th>
                                <th>NGÀY SINH</th>
                                <th>SĐT</th>
                                <th>ĐỊA CHỈ</th>
                                <th>MÃ TK</th>
                                <th>EMAIL</th>
                                <th>CHỨC VỤ</th>
                                <th>TRẠNG THÁI</th>
                                <th>CHỨC NĂNG</th>
                            </tr>
                        </thead>

                        <tbody id="dataNhanVien">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
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
        <?php include 'modal_nhanvien.php' ?>
    </div>

</body>
<script src="static/admin/js/layout_nhanvien.js"></script>

</html>