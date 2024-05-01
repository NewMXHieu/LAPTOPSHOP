<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/admin/css/layout_thongke.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Sản Phẩm</title>
</head>

<body>
    <div class="layout">
        <div class="content-item" id="content-thongke">
            <div class="content-header">THỐNG KÊ SẢN PHẨM</div>
            <div class="content-main">
                <div class="content-main-control">
                    <div class="content-main-select">
                        <select name="admin-thongke-select" id="admin-thongke-select" onchange="showThongKe()">
                            <option value="0" selected>Tất cả</option>
                            <option value="1">Laptop Doanh Nghiệp</option>
                            <option value="2">Laptop Doanh Nhân</option>
                            <option value="3">Laptop Gaming</option>
                            <option value="4">Laptop Học Sinh - Sinh Viên</option>
                            <option value="5">Laptop Văn Phòng</option>
                            <option value="6">Laptop Đồ Họa - Kỹ Thuật</option>
                        </select>
                    </div>
                    <div class="content-main-select">
                        <select name="admin-thongke-type-select" id="admin-thongke-type-select" onchange="showThongKe()">
                            <option value="0" selected>Tất cả</option>
                            <option value="1">ACER</option>
                            <option value="2">APPLE</option>
                            <option value="3">ASUS</option>
                            <option value="4">DELL</option>
                            <option value="5">GIGABYTE</option>
                            <option value="6">HP</option>
                            <option value="7">LG</option>
                            <option value="8">LENOVO</option>
                            <option value="9">MSI</option>
                        </select>
                    </div>
                    <div class="content-main-searchbar">
                        <form action="searchbar.php" method="get">
                            <input type="text" id="content-main-searchbar-thongke" oninput="showThongKe()">
                            <i class="fa-solid fa-magnifying-glass" onclick="showThongKe()"></i>
                        </form>
                    </div>
                    <div class="content-main-control-filter">
                        <button id="resetBtnthongke" onclick="resetDataThongKe()"><i class="fa-solid fa-arrows-rotate"></i></button>
                        <button id="filterByBotToTopBtnthongke" onclick="filterByBotToTopThongKe()"><i class="fa-solid fa-sort-up"></i></button>
                        <button id="filterByToptoBotBtnthongke" onclick="filterByTopToBotThongKe()"><i class="fa-solid fa-sort-down"></i></button>
                    </div>
                </div>
                <div class="dataThongKeShow">
                    <h1>Loại sản phẩm: </h1>
                    <h2>1.000.000đ</h2>
                </div>
                <div class="content-main-table">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>TÊN LOẠI SP</th>
                                <th>THƯƠNG HIỆU</th>
                                <th>TÊN SẢN PHẨM</th>
                                <th>TỔNG SỐ LƯỢNG</th>
                                <th>ĐƠN GIÁ</th>
                                <th>TỔNG TIỀN</th>
                            </tr>
                        </thead>

                        <tbody id="dataThongKe">
                            <tr>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

</body>
<script src="static/admin/js/layout_thongke.js"></script>

</html>