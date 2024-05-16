<?php
$userId = $_SESSION['id'];

if (!isset($_SESSION['id'])) {
    ?>
    <link rel="stylesheet" href="static/css/orderstatus.css">
    <div class="data-order__empty">
        <div class="order_empty_item">
            <div>
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-xmark"></i>
                <i class="fa fa-solid fa-shopping-bag"></i>
            </div>
            <p class="alert-empty">Quý khách chưa đăng nhập, vui lòng đăng nhập để mua hàng.</p>
            <div><a href="sign-in" class="button">Đăng nhập</a></div>
        </div>
    </div>
    <?php
    exit; // Stop the rest of the page from loading
}

global $conn;
// create the SQL query
$sql = "SELECT giohang.MAGH
          FROM giohang, khachhang, taikhoan
          WHERE khachhang.MATK = $userId
          AND khachhang.MAKH = giohang.MAKH";
$result = mysqli_query($conn, $sql);
$giohang = mysqli_fetch_assoc($result);
$_SESSION['cart_id'] = $giohang['MAGH'];

// create the SQL query

$query = "SELECT giohang.MAGH, giohang.MAKH, chitietgiohang.MASP, chitietgiohang.SOLUONG AS SLGH, sanpham.MASP, sanpham.HINHSP, sanpham.SOLUONG AS SLSP, chitietsanpham.TENSP, chitietsanpham.STORAGE, chitietsanpham.GIATIEN, chitietsanpham.MAU
FROM giohang, chitietgiohang, sanpham, khachhang, chitietsanpham
WHERE khachhang.MATK = $userId 
AND khachhang.MAKH = giohang.MAKH
AND giohang.MAGH = chitietgiohang.MAGH 
AND chitietgiohang.masp = sanpham.masp
AND chitietsanpham.masp = sanpham.masp
";
$result = mysqli_query($conn, $query);
// Start the session if not already started

$products = array();
while ($product = mysqli_fetch_assoc($result)) {
    $products[] = $product['MASP'];
}

$_SESSION['product_cart'] = $products;
mysqli_data_seek($result, 0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>bs4 cart - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/css/cart.css">
</head>

<body>
    <div class="container px-3 my-5 clearfix">

        <div class="card">
            <div class="card-header">
                <h2>Shopping Cart</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>

                                <th class="text-center py-3 px-4" style="min-width: 400px;">Tên laptop &amp; chi tiết
                                </th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Giá</th>
                                <th class="text-center py-3 px-4" style="width: 120px;">Số lượng</th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Tổng tiền</th>
                                <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#"
                                        class="shop-tooltip float-none text-light" title
                                        data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totalAll = 0;
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
                            while ($product = mysqli_fetch_assoc($result)) {
                                $cart_id = $product['MAGH'];
                                $id = $product['MASP'];
                                $cart_id = $product['MAGH'];
                                $name = $product['TENSP'];
                                $image = $product['HINHSP'];
                                $storage = $product['STORAGE'];
                                $color = $product['MAU'];
                                $colors = [
                                    'Trắng' => '#ffffff',
                                    'Đen' => '#000000',
                                    'Bạc' => '#c0c0c0',
                                    'Xám' => '#808080',
                                ];
                                $colorCode = isset($colors[$color]) ? $colors[$color] : '#000000'; // Default to black if color not found
                                $price = $product['GIATIEN'];
                                $quantity = $product['SLGH'];
                                $total = $price * $quantity;
                                $totalAll = $totalAll + $total;
                                ?>
                                <tr>
                                    <td class="p-4">
                                        <div class="media align-items-center">
                                            <img src="static/image/products/<?= $product['HINHSP'] ?>"
                                                class="d-block ui-w-40 ui-bordered mr-4" alt>
                                            <div class="media-body">
                                                <a href="#" class="d-block text-dark"><?php echo $name ?></a>
                                                <small>
                                                    <span class="text-muted">Màu:</span>
                                                    <span class="ui-product-color ui-product-color-sm align-text-bottom"
                                                        style="background:<?php echo $colorCode; ?>;"></span> &nbsp;
                                                    <span class="text-muted">Storage: </span><?php echo $storage ?> &nbsp;
                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right font-weight-semibold align-middle p-4">
                                        <?php echo format_money($price, true); ?>
                                    </td>
                                    <td class="align-middle p-4"><input type="text" class="form-control text-center"
                                            value="<?php echo $quantity; ?>"></td>
                                    <td class="text-right font-weight-semibold align-middle p-4">
                                        <?php echo format_money($total, true); ?>
                                    </td>
                                    <td class="text-center align-middle px-0">
                                        <button class="shop-tooltip close float-none text-danger" title
                                            data-original-title="Remove"
                                            onclick="deleteFromCart('<?php echo $cart_id; ?>', '<?php echo $id; ?>'); return false;">×
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                    <div class="mt-4">
                        <label class="text-muted font-weight-normal">Promocode</label>
                        <input type="text" placeholder="ABC" class="form-control">
                    </div>
                    <div class="d-flex">
                        <div class="text-right mt-4">
                            <label class="text-muted font-weight-normal m-0">Tổng tiền</label>
                            <div class="text-large"><strong><?php echo format_money($totalAll, true) ?></strong></div>
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <a href="trangchu"><button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back
                            to shopping</button></a>
                    <a href="checkout"><button type="button" class="btn btn-lg btn-primary mt-2">Checkout</button></a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    </script>
    <script src="static/js/DeleteCart.js"></script>
</body>

</html>