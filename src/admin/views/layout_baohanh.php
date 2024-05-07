<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/admin/css/layout_baohanh.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Sản Phẩm</title>
</head>

<body>
    <div class="layout">
        <div class="content-item" id="content-baohanh">
            <div class="content-header">THÔNG TIN BẢO HÀNH</div>
            <div class="content-main">
                <div class="content-main-control">
                    <div class="content-main-select">
                        <select name="admin-content-select-baohanh" id="admin-content-select-baohanh" onchange="showBaoHanh()">
                            <option value="0" selected>Tất cả</option>
                            <option value="1">CÒN HẠN</option>
                            <option value="2">HẾT HẠN</option>
                        </select>
                    </div>
                    <div class="content-main-select-baohanh">
                        <div class="centerText">
                            <p>Từ</p>
                        </div>
                        <input type="date" id='admin-baohanh-select-dateStart' name='admin-baohanh-select-dateStart' onchange="showBaoHanh()">
                    </div>
                    <div class="content-main-select-baohanh">
                        <div class="centerText">
                            <p>Đến</p>
                        </div>
                        <input type="date" id='admin-baohanh-select-dateEnd' name='admin-baohanh-select-dateEnd' onchange="showBaoHanh()">
                    </div>
                    <div class="content-main-searchbar">
                        <form action="searchbar.php" method="get">
                            <input type="text" id="content-main-searchbar-baohanh" oninput="showBaoHanh()">
                            <i class="fa-solid fa-magnifying-glass" onclick="showBaoHanh()"></i>
                        </form>
                    </div>
                    <div class="content-main-control-filter">
                        <button id="addNewBaoHanh"><i class="fa-solid fa-plus"></i></button>
                        <button id="resetBtnbaohanh" onclick="resetDataBaoHanh()"><i class="fa-solid fa-arrows-rotate"></i></button>
                        <button id="filterByBotToTopBtnbaohanh" onclick="filterByBotToTopBaoHanh()"><i class="fa-solid fa-sort-up"></i></button>
                        <button id="filterByToptoBotBtnbaohanh" onclick="filterByTopToBotBaoHanh()"><i class="fa-solid fa-sort-down"></i></button>
                    </div>
                </div>
                <div class="content-main-table">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>MÃ BẢO HÀNH</th>
                                <th>ĐƠN VỊ BẢO HÀNH</th>
                                <th>THỜI HẠN (NĂM)</th>
                                <th>TRẠNG THÁI</th>
                                <th>CHỨC NĂNG</th>
                            </tr>
                        </thead>

                        <tbody id="dataBaoHanh">
                            <tr>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <?php include 'modal_baohanh.php'?>
</body>
<script src="static/admin/js/layout_baohanh.js"></script>

</html>