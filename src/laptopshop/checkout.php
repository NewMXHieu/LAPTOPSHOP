<?php
include '../../config/connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['id'])) {
    $ID = $_SESSION['id'];
    $checkout_query = "SELECT sanpham.MASP, chitietsanpham.TENSP, chitietsanpham.GIATIEN, sanpham.HINHSP, chitietgiohang.SOLUONG
                FROM taikhoan
                JOIN giohang ON taikhoan.MATK = giohang.MATK
                JOIN chitietgiohang ON giohang.MAGH = chitietgiohang.MAGH
                JOIN chitietsanpham ON chitietgiohang.MASP = chitietsanpham.MASP
                JOIN sanpham ON chitietsanpham.MASP = sanpham.MASP
                WHERE taikhoan.MATK = $ID";

    $employee_query = "SELECT nhanvien.MATK, nhanvien.TEN, nhanvien.NGAYSINH, nhanvien.SDT, nhanvien.DIACHI, nhanvien.EMAIL,  nhanvien.MANV
                FROM taikhoan
                JOIN nhanvien ON taikhoan.MATK = nhanvien.MATK
                WHERE taikhoan.MATK = $ID";

    // Truy vấn để lấy thông tin từ bảng khách hàng
    $customer_query = "SELECT khachhang.MATK, khachhang.MAKH, khachhang.TEN, khachhang.NGAYSINH, khachhang.DIACHI, khachhang.SDT
                FROM taikhoan
                JOIN khachhang ON taikhoan.MATK = khachhang.MATK
                WHERE taikhoan.MATK = $ID";

    $province_query = "SELECT * FROM province";
    $result_province = mysqli_query($conn, $province_query);

    $result_employee = mysqli_query($conn, $employee_query);
    $result_customer = mysqli_query($conn, $customer_query);

    $result_checkout = mysqli_query($conn, $checkout_query);
    if (!$result_checkout) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    if (mysqli_num_rows($result_employee) > 0) {
        $taikhoan = $result_employee->fetch_all(MYSQLI_ASSOC);
    } elseif (mysqli_num_rows($result_customer) > 0) {
        $taikhoan = $result_customer->fetch_all(MYSQLI_ASSOC);
    }
    $GIOHANG = $result_checkout->fetch_all(MYSQLI_ASSOC);

    // Kiểm tra xem $GIOHANG có rỗng không
    if (empty($GIOHANG)) {
        echo '<span>Không thấy sản phẩm</span>';
    } else {
?>
        <link rel="stylesheet" href="laptopshop/static/css/checkout.css">
        <script src="laptopshop/static/js/address.js"></script>
        <div class="my-store-checkout-content">
            <div class="checkout-info">
                <h3>Thông tin người nhận</h3>
                <form id="checkout-form">
                    <div class="form-group">
                        <?php
                        $dia_chi_parts = explode(',', $taikhoan[0]['DIACHI']);
                        $dia_chi_parts = array_pad($dia_chi_parts, 3, '');
                        $dia_chi_cu_the = isset($dia_chi_parts[0]) ? trim($dia_chi_parts[0]) : '';
                        $phuong_xa = isset($dia_chi_parts[1]) ? trim($dia_chi_parts[1]) : '';
                        $quan_huyen = isset($dia_chi_parts[2]) ? trim($dia_chi_parts[2]) : '';
                        $tinh_tp = isset($dia_chi_parts[3]) ? trim($dia_chi_parts[3]) : '';
                        ?>
                        <label for="recipient-name">Họ và tên:</label>
                        <input type="text" id="recipient-name" name="recipient-name" value="<?php echo $taikhoan[0]['TEN']; ?>" required>
                    </div>

                    <select name="calc_shipping_provinces" required="" class="combobox form-group" title="Tỉnh / Thành">
                        <option value="">Tỉnh / Thành</option>
                        <?php
                        foreach ($result_province as $province) {
                            echo "<option value='{$province['id']}'>{$province['name']}</option>";
                        }
                        ?>
                    </select>
                    <select name="calc_shipping_district" required="" class="combobox form-group" title="Quận / Huyện">
                        <option value="">Quận / Huyện</option>
                    </select>
                    <div class="form-group">
                        <label for="address">Địa chỉ cụ thể:</label>
                        <input type="text" id="address" name="address" value="<?php echo $dia_chi_cu_the; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Phương thức thanh toán:</label><br>
                        <input type="radio" id="payment-cod" name="payment-method" value="cod" checked>
                        <label for="payment-cod">Thanh toán khi nhận hàng</label><br>
                        <input type="radio" id="payment-online" name="payment-method" value="online">
                        <label for="payment-online">Thanh toán trực tuyến</label>
                    </div>
                </form>
            </div>
            <div class="cart-checkout">
                <div class="checkout-header">
                    <h2 class="checkout-title">SẢN PHẨM</h2>
                </div>
                <div class="checkout-container">
                    <div class="checkout-items">
                        <?php foreach ($GIOHANG as $item) { ?>
                            <div class="checkout-item">
                                <img alt="LAPTOP <?php echo $item['TENSP']; ?>" src="static/image/products/<?php echo $item['HINHSP']; ?>" class="checkout-product-image">
                                <div class="product-details">
                                    <div class="product-name"><?php echo $item['TENSP']; ?></div>
                                    <div class="product-price"><?php echo number_format($item['GIATIEN']); ?>đ</div>
                                    <div class="product-quantity">
                                        <div class="quanlity">
                                            <p style="float: left; margin-top: 10px"><?php echo $item['SOLUONG']; ?></p>
                                        </div>
                                    </div>
                                    <div class="product-total"><?php echo number_format($item['GIATIEN'] * $item['SOLUONG']); ?>đ</div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="checkout-buyside">
                        <div class="checkout-summary">
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
                        <button type="button" class="checkout-btn" style="height: 30px;background: black;color: white;font-size: 18px;border-radius: 12px;">Thanh toán</button>
                    </div>

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