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
        echo '<span>Không thấy sản phẩm</span>';
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
                    <?php foreach ($GIOHANG as $item) { ?>
                        <div class="cart-item">
                            <img alt="LAPTOP <?php echo $item['TENSP']; ?>" src="static/image/products/<?php echo $item['HINHSP']; ?>" class="cart-product-image">
                            <div class="product-details">
                                <div class="product-name"><?php echo $item['TENSP']; ?></div>
                                <div class="product-price"><?php echo number_format($item['GIATIEN']); ?>đ</div>
                                <div class="product-quantity">
                                    <button  type="button" class="minus">-</button>
                                    <div class="quanlity"><p style="float: left; margin-top: 10px"><?php echo $item['SOLUONG']; ?></p></div>
                                    <button  type="button" class="plus">+</button>
                                </div>
                                <div class="product-total"><?php echo number_format($item['GIATIEN'] * $item['SOLUONG']); ?>đ</div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="cart-buyside">
                    <div class="cart-summary">
                        <?php
                        // Tính tổng tiền hàng
                        $tongtien = 0;
                        foreach ($GIOHANG as $item) {
                            $tongtien += $item['GIATIEN'] * $item['SOLUONG'];
                        }
                        ?>
                        <div class="total-amount">Tổng tiền hàng: <?php echo number_format($tongtien); ?>đ</div>
                        <div class="shipping-fee">Phí vận chuyển: Miễn phí</div>
                        <div class="total-price">Tổng cộng: <?php echo number_format($tongtien); ?>đ</div>
                    </div>
                    <a href="checkout"><button type="button" class="checkout-btn" style="height: 30px;background: black;color: white;font-size: 18px;border-radius: 12px;">Thanh toán</button></a>
                </div>

            </div>
        </div>
<?php
    }
} else {
    header('Location: sign-in');
    exit();
}
?>