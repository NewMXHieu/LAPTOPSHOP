<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>phân quyền</title>
</head>

<body>
    <div class="layout">
        <div class="content-item" id="content-phanquyen-nhomquyen">
            <div class="content-header">Quản lý nhóm quyền</div>
            <div class="content-main">
                <div class="content-main-control">
                    <div class="content-main-select">
                        <select name="admin-phanquyen-select" id="admin-phanquyen-select" onchange="showPhanQuyen()">
                            <option value="0">Tất cả </option>
                            <option value="1">Admin</option>
                            <option value="2">Quản lý</option>
                        </select>
                    </div>
                    <div class="content-main-searchbar">
                        <form action="searchbar.php" method="get">
                            <input type="text" id="content-main-searchbar-phanquyen" oninput="showPhanQuyen()">
                            <i class="fa-solid fa-magnifying-glass" onclick="showPhanQuyen()"></i>
                        </form>
                    </div>
                    <div class="content-main-control-filter">
                        <?php
                        if(maQuyenTonTai($maquyen, 18)){
                            echo '<button id="addNewPhanQuyen"><i class="fa-solid fa-plus"></i></button>';
                        }
                        ?>
                        <button id="resetBtnPhanQuyen" onclick="resetDataPhanQuyen()"><i
                                class="fa-solid fa-arrows-rotate"></i></button>
                        <button id="filterByBotToTopBtnPhanQuyen" onclick="filterByBotToTopPhanQuyen()"><i
                                class="fa-solid fa-sort-up"></i></button>
                        <button id="filterByToptoBotBtnPhanQuyen" onclick="filterByTopToBotPhanQuyen()"><i
                                class="fa-solid fa-sort-down"></i></button>
                    </div>
                </div>
                <div class="content-main-table">
                    <table style="width:100%" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>MÃ NHÓM QUYỀN</th>
                                <th>TÊN NHÓM QUYỀN</th>
                                <th>MÔ TẢ</th>
                                <th>CHỨC NĂNG</th>
                            </tr>
                        </thead>

                        <tbody id="dataPhanQuyen">
                            <tr>
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
        <?php include 'modal_nhomquyen.php' ?>
    </div>

</body>
<script src="static/admin/js/layout_nhomquyen.js"></script>

</html>