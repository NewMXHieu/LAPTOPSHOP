<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/admin/css/layout_nhaphang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Sản Phẩm</title>
</head>

<body>
    <div class="layout">
        <div class="content-item" id="content-nhaphang">
            <div class="content-header">PHIẾU NHẬP</div>
            <div class="content-main">
                <div class="content-main-control">
                    <div class="content-main-select">
                        <select name="admin-content-select-nhaphang" id="admin-content-select-nhaphang" onchange="showPhieuNhap()">
                            <option value="0" selected>Tất cả</option>
                            <option value="1">Đã xử lý</option>
                            <option value="2">Chưa xử lý</option>
                        </select>
                    </div>
                    <div class="content-main-select-nhaphang">
                        <div class="centerText">
                            <p>Từ</p>
                        </div>
                        <input type="date" id='admin-nhaphang-select-dateStart' name='admin-nhaphang-select-dateStart' onchange="showPhieuNhap()">
                    </div>
                    <div class="content-main-select-nhaphang">
                        <div class="centerText">
                            <p>Đến</p>
                        </div>
                        <input type="date" id='admin-nhaphang-select-dateEnd' name='admin-nhaphang-select-dateEnd' onchange="showPhieuNhap()">
                    </div>
                    <div class="content-main-searchbar">
                        <form action="searchbar.php" method="get">
                            <input type="text" id="content-main-searchbar-nhaphang" oninput="showPhieuNhap()">
                            <i class="fa-solid fa-magnifying-glass" onclick="showPhieuNhap()"></i>
                        </form>
                    </div>
                    <div class="content-main-control-filter">
                        <button id="addNewPhieuNhap"><i class="fa-solid fa-plus"></i></button>
                        <button id="resetBtnnhaphang" onclick="resetDataPhieuNhap()"><i class="fa-solid fa-arrows-rotate"></i></button>
                        <button id="filterByBotToTopBtnnhaphang" onclick="filterByBotToTopPhieuNhap()"><i class="fa-solid fa-sort-up"></i></button>
                        <button id="filterByToptoBotBtnnhaphang" onclick="filterByTopToBotPhieuNhap()"><i class="fa-solid fa-sort-down"></i></button>
                    </div>
                </div>
                <div class="content-main-table">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>MÃ PHIẾU NHẬP</th>
                                <th>MÃ NHÂN VIÊN</th>
                                <th>NGÀY NHẬP</th>
                                <th>TỔNG TIỀN</th>
                                <th>TRẠNG THÁI</th>
                                <th>CHỨC NĂNG</th>
                            </tr>
                        </thead>

                        <tbody id="dataNhapHang">
                            <tr>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <?php include 'modal_nhaphang.php'?>
</body>
<script src="static/admin/js/layout_nhaphang.js"></script>

</html>