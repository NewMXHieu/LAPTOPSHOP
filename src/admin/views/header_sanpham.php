<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/admin/css/header_control.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>header control</title>
</head>

<body>
    <div class="content-main-control">
        <div class="content-main-select">
            <select name="admin-sanpham-select" id="admin-sanpham-select" onchange="showProduct()">
                <option value="0" selected>Tất cả</option>
                <option value="1">Laptop Doanh Nghiệp</option>
                <option value="2">Laptop Doanh Nhân</option>
                <option value="3">Laptop Gaming</option>
                <option value="4">Laptop Học Sinh - Sinh Viên</option>
                <option value="5">Laptop Văn Phòng</option>
                <option value="6">Laptop Đồ Họa - Kỹ Thuật</option>
                <option value="7">Đã ẩn</option>
            </select>
        </div>
        <div class="content-main-select">
            <select name="admin-sanpham-type-select" id="admin-sanpham-type-select" onchange="showProduct()">
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
                <input type="text" id="content-main-searchbar-sanpham" oninput="showProduct()">
                <i class="fa-solid fa-magnifying-glass" onclick="showProduct()"></i>
            </form>
        </div>
        <div class="content-main-control-filter">
            <button id="addNewItemBtn"><i class="fa-solid fa-plus"></i></button>
            <button id="resetBtnSanPham" onclick="resetData()"><i class="fa-solid fa-arrows-rotate"></i></button>
            <button id="filterByBotToTopBtnSanPham" onclick="filterByBotToTop()"><i
                    class="fa-solid fa-sort-up"></i></button>
            <button id="filterByToptoBotBtnSanPham" onclick="filterByTopToBot()"><i
                    class="fa-solid fa-sort-down"></i></button>
        </div>
    </div>
</body>

</html>