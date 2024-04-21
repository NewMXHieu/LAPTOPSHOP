<?php
include "header.php"
?>
<?php
include '../../config/connect.php';
session_start();
$MATK = $_SESSION['MATK'];

$sql = "SELECT giohang.MASP, chitietsanpham.TENSP, chitietsanpham.GIA, chitietsanpham.HINHANH, giohang.SOLUONG
            FROM giohang
            JOIN chitietsanpham ON giohang.MASP = chitietsanpham.MASP
            JOIN khachhang ON giohang.MAGH = khachhang.MAGH
            WHERE khachhang.MATK = $MATK";

$result = $conn->query($sql);
$GIOHANG = $result->fetch_all(MYSQLI_ASSOC);
?>
<link rel="stylesheet" href="static/css/cart.css">
<div class="cart-container">
    <div class="cart-header">
        <h2 class="cart-title">Giỏ hàng</h2>
        <button class="delete-all-btn">Xóa tất cả</button>
    </div>
    <div class="cart-items">
        <?php foreach ($GIOHANG as $item) { ?>
            <div class="cart-item">
                <img src="<?php echo $item['hinhanh']; ?>" alt="" class="product-image">
                <div class="product-details">
                    <div class="product-name"><?php echo $item['ten']; ?></div>
                    <div class="product-price"><?php echo number_format($item['gia']); ?>đ</div>
                    <div class="product-quantity"><?php echo $item['soluong']; ?></div>
                    <div class="product-total"><?php echo number_format($item['gia'] * $item['soluong']); ?>đ</div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="cart-summary">
        <div class="total-amount">Tổng tiền hàng: <?php echo number_format($tongtien); ?>đ</div>
        <div class="shipping-fee">Phí vận chuyển: Miễn phí</div>
        <div class="total-price">Tổng cộng: <?php echo number_format($tongtien); ?>đ</div>
    </div>
    <button type="button" class="checkout-btn">Thanh toán</button>
</div>

<?php
include "footer.php"
?>