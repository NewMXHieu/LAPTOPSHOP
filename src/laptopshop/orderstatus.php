<?php
$userId = $_SESSION['id'];

global $conn;
// create the SQL query
$query = "SELECT hoadon.* , shipper.TEN, shipper.SDT
          FROM khachhang 
          INNER JOIN hoadon ON khachhang.makh = hoadon.makh
          LEFT JOIN shipper ON hoadon.mashipper = shipper.mashipper
          WHERE khachhang.matk = $userId
                        AND hoadon.trangthai != 3";
$result = mysqli_query($conn, $query);
$order = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) > 0 && $order['TRANGTHAI'] != 3) {
    ?>
    <link rel="stylesheet" href="static/css/orderstatus.css">

    <div class="container">
        <article class="card">
            <header class="card-header"> ĐƠN HÀNG CỦA TÔI </header>
            <div class="card-body">
                <h6 style="margin-bottom: 14px;">Mã đơn hàng: <?= $order['MAHD'] ?></h6>
                <article class="card">
                    <div class="card-body row">
                        <div class="col"> <strong>Ngày đặt hàng</strong>
                            <br><?= date('d/m/Y', strtotime($order['NGAYTAO'])) ?> <br>
                        </div>
                        <div class="col"> <strong>Được giao bởi</strong> <br> <?= isset($order['TEN']) ? $order['TEN'] : '' ?><i class="fa fa-phone"></i>
                            <?= isset($order['SDT']) ? $order['SDT'] : ''  ?> </div>
                        <div class="col"> <strong>Tình trạng</strong> <br>
                            <?php
                            switch ($order['TRANGTHAI']) {
                                case 0:
                                    echo "Đang xác nhận";
                                    break;
                                case 1:
                                    echo "Đã xác nhận";
                                    break;
                                case 2:
                                    echo "Đang giao";
                                    break;
                                case 3:
                                    echo "Đã nhận được hàng";
                                    break;
                            }
                            ?>
                        </div>
                        <div class="col"> <strong>Liên hệ hỗ trợ</strong> <br> 023984742 </div>
                    </div>
                </article>
                <div class="track">
                    <div class="step <?= $order['TRANGTHAI'] >= 0 ? 'active' : '' ?>">
                        <span class="icon"> <i class="fa fa-user"></i> </span>
                        <span class="text">Đang xác nhận</span>
                    </div>
                    <div class="step <?= $order['TRANGTHAI'] >= 1 ? 'active' : '' ?>">
                        <span class="icon"> <i class="fa fa-check"></i> </span>
                        <span class="text">Đã xác nhận</span>
                    </div>
                    <div class="step <?= $order['TRANGTHAI'] >= 2 ? 'active' : '' ?>">
                        <span class="icon"> <i class="fa fa-truck"></i> </span>
                        <span class="text">Đang giao</span>
                    </div>
                    <div class="step">
                        <span class="icon"> <i class="fa fa-box"></i> </span>
                        <span class="text">Đã nhận được hàng</span>
                    </div>
                </div>
            </div>
            <hr class="mb-3">
            <?php
            function get_currency()
            {
                return '₫';
            }
            function format_money($amount, $currency = false)
            {
                if ($currency) {
                    return number_format($amount, 0, '.', '.') . '' . get_currency();
                }
                return number_format($amount, 0, '.', '.');
            }

            $query = "SELECT hoadon.MAHD, COUNT(chitiethoadon.MASP) AS SL, chitietsanpham.*, sanpham.HINHSP 
            FROM hoadon 
            INNER JOIN chitiethoadon ON hoadon.MAHD = chitiethoadon.MAHD 
            INNER JOIN chitietsanpham ON chitiethoadon.MASP = chitietsanpham.MASP 
            INNER JOIN sanpham ON chitietsanpham.MASP = sanpham.MASP WHERE hoadon.MAHD = " . $order['MAHD'] . "
            GROUP BY chitiethoadon.MASP;";
            $result = mysqli_query($conn, $query);
            ?>
            <?php while ($product = mysqli_fetch_assoc($result)) { ?>

                <ul class="row">
                    <li class="col-md-4">
                        <figure class="itemside mb-3">
                            <div class="aside"><img src="static/image/products/<?= $product['HINHSP'] ?>" class="img-sm border">
                            </div>
                            <figcaption class="info align-self-center">
                                <p class="title"><?= $product['TENSP'] ?><br> <?= $product['RAM'] ?></p>
                                <span class="text-muted">Số lượng: <?= $product['SL'] ?></span> <br>
                                <span class="text-muted">Đơn giá: <?= format_money($product['GIATIEN'], true) ?></span>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
                <hr class="mb-3">
            <?php } ?>
            <?php
            if ($order['TRANGTHAI'] == 0) { ?>
                <div class="cancel-order">
                    <button class="btn btn-light" data-abc="true" style="width: 600px;" onclick="openPopup()">
                        <i class="fa fa-solid fa-xmark"></i>Huỷ đơn hàng
                    </button>
                    <div class="popup_cancel-order" id="popup-order">
                        <h2>Thông báo</h2>
                        <p>Bạn có chắc chắn muốn hủy đơn hàng này không?</p>
                        <div class="action-btn">
                            <button onclick="closePopup()">Hủy</button>
                            <button data-order-id="<?php echo $order['MAHD']; ?>" onclick="deleteOrder(this)">OK</button>
                        </div>
                    </div>
                </div>
                <script src="static/js/popup.js"></script>
            <?php } else { ?>
                <div class="cancel-order">
                    <span href="" class="btn btn-light" data-abc="true" style="width: 600px;">
                        <i class="fa fa-solid fa-check"></i>Đơn hàng đã được xác nhận, bạn không thể huỷ đơn hàng
                    </span>
                </div>
            <?php } ?>
            <br class="mb-3">
        </article>
    </div>
    <?php
} else { ?>
    <link rel="stylesheet" href="static/css/orderstatus.css">
    <div class="data-order__empty">
        <div class="order_empty_item">
            <div>
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-xmark"></i>
                <i class="fa fa-solid fa-shopping-bag"></i>
            </div>
            <p class="alert-empty">Quý khách chưa có đơn hàng nào.</p>
            <div><a href="trangchu" class="button">TIẾP TỤC MUA HÀNG</a></div>
        </div>
    </div>
<?php } ?>