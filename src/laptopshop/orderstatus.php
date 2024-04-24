<?php
$userId = $_SESSION['id'];

global $conn;
// create the SQL query
$query = "SELECT hoadon.* 
          FROM khachhang 
          INNER JOIN hoadon ON khachhang.makh = hoadon.makh
          WHERE khachhang.matk = $userId";

// execute the query
$result = mysqli_query($conn, $query);
$order = mysqli_fetch_assoc($result);
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
                    <div class="col"> <strong>Được giao bởi</strong> <br> Nguyễn Văn A <i class="fa fa-phone"></i>
                        +1598675986 </div>
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
                <div class="step <?= $order['TRANGTHAI'] >= 3 ? 'active' : '' ?>">
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

        $query = "SELECT hoadon.MAHD, chitiethoadon.MASP, chitiethoadon.SOLUONG AS SL, chitietsanpham.*, sanpham.HINHSP
        FROM hoadon
        INNER JOIN chitiethoadon ON hoadon.MAHD = chitiethoadon.MAHD
        INNER JOIN chitietsanpham ON chitiethoadon.MASP = chitietsanpham.MASP
        INNER JOIN sanpham ON chitietsanpham.MASP = sanpham.MASP
        WHERE hoadon.MAHD = " . $order['MAHD'];
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
            <form action="" class="cancel-order">
                <button href="" class="btn btn-light" data-abc="true" style="width: 600px;">
                    <i class="fa-solid fa-xmark"></i>Huỷ đơn hàng
                </button>
            </form>
        <?php } else { ?>
            <form action="" class="cancel-order">
                <span href="" class="btn btn-light" data-abc="true" style="width: 600px;">
                    <i class="fa-solid fa-check"></i>Đơn hàng đã được xác nhận, bạn không thể huỷ đơn hàng
                </span>
            </form>
        <?php } ?>
        <br class="mb-3">
</div>
</article>
</div>