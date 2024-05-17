<?php
include '../../config/connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['id'])) {
    $ID = $_SESSION['id'];
    $cart_query = "SELECT sanpham.MASP, chitietsanpham.TENSP, chitietsanpham.GIATIEN, sanpham.HINHSP, chitietgiohang.SOLUONG
                FROM taikhoan
                JOIN giohang ON taikhoan.MATK = giohang.MATK
                JOIN chitietgiohang ON giohang.MAGH = chitietgiohang.MAGH
                JOIN chitietsanpham ON chitietgiohang.MASP = chitietsanpham.MASP
                JOIN sanpham ON chitietsanpham.MASP = sanpham.MASP
                WHERE taikhoan.MATK = $ID";

    $result_cart = mysqli_query($conn, $cart_query);
    if (!$result_cart) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $GIOHANG = $result_cart->fetch_all(MYSQLI_ASSOC);

    // Kiểm tra xem $GIOHANG có rỗng không
    if (empty($GIOHANG)) {
?>
        <link rel="stylesheet" href="laptopshop/static/css/checkout.css">
        <script src="laptopshop/static/js/address.js"></script>
        <div class="my-store-checkout-content">
            <span> Không có sản phẩm<> </span>
        </div>
    <?php
    } else {
    ?>
        <link rel="stylesheet" href="laptopshop/static/css/cart.css">
        <div class="my-store-cart-content">
            <div class="cart-header">
                <h2 class="cart-title">Giỏ hàng</h2>
                <button class="delete-all-btn">Xóa tất cả</button>
            </div>
            <div class="cart-container">
                <div class="cart-items">
                    <div class="title">
                        <div class="product-details">
                            <div class="product-name">Sản phẩm</div>
                            <div class="product-price">Giá</div>
                            <div class="product-quantity">Số lượng</div>
                            <div class="product-total">Tổng tiền</div>
                        </div>
                    </div>
                    <?php foreach ($GIOHANG as $item) { ?>
                        <div class="cart-item">
                            <div class="cart-checkbox">
                                <input type="checkbox" class="checkbox" data-id="<?php echo $item['MASP'] ?>">
                            </div>
                            <div class="cart-product-image">
                                <img alt="LAPTOP <?php echo $item['TENSP']; ?>" src="static/image/products/<?php echo $item['HINHSP']; ?>">
                            </div>
                            <div class="product-details">
                                <div class="product-name"><?php echo $item['TENSP']; ?></div>
                                <div class="product-price"><?php echo number_format($item['GIATIEN']); ?>đ</div>
                                <div class="product-quantity">
                                    <button type="button" class="minus" data-id="<?php echo $item['MASP']; ?>">-</button>
                                    <div class="quanlity">
                                        <p style="float: left; margin-top: 10px" data-id="<?php echo $item['MASP']; ?>"><?php echo $item['SOLUONG']; ?></p>
                                    </div>
                                    <button type="button" class="plus" data-id="<?php echo $item['MASP']; ?>">+</button>
                                </div>
                                <?php
                                $tongtiensp = $item['GIATIEN'] * $item['SOLUONG'];
                                ?>
                                <div class="product-total" data-id="<?php echo $item['MASP']; ?>"><?php echo number_format($tongtiensp, 0, ',', '.'); ?>đ</div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="cart-buyside">
                    <div class="cart-summary">
                        <?php
                        $tongtien = 0;
                        ?>
                        <div class="total-amount">Tổng tiền hàng: <?php echo number_format($tongtien); ?>đ</div>
                        <div class="shipping-fee">Phí vận chuyển: Miễn phí</div>
                        <div class="total-price">Tổng cộng: <?php echo number_format($tongtien); ?>đ</div>
                    </div>
                    <a href="checkout"><button type="button" class="checkout-btn" style="height: 30px;background: black;color: white;font-size: 18px;border-radius: 12px;">Thanh toán</button></a>
                </div>

            </div>
        </div>
        <script src="laptopshop/static/js/cart.js"></script>
        <script>
            window.onload = function() {
                fetchCurrentPrices();
            }
        </script>
<?php
    }
} else {
    header('Location: sign-in');
    exit();
}
?>