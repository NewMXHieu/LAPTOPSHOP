<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/admin/css/layout_sanpham.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Sản Phẩm</title>
</head>

<body>
    <div class="layout">
        <div class="content-item" id="content-sanpham">
            <div class="content-header">Quản lý sản phẩm</div>
            <div class="content-main">
                <?php include 'header_sanpham.php' ?>
                <div class="content-main-table">
                    <div class="content-main-list" id="content-main-list">
                        <div class="item-list">
                            <div id="show-product"></div>
                            <div class="page-nav">
                                <ul class="page-nav-list"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'modal_sanpham.php' ?>
    </div>

</body>
<script src="static/admin/js/layout_sanpham.js"></script>

</html>