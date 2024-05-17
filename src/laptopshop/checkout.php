<?php
$userId = $_SESSION['id'];
global $conn;

// create the SQL query

$query = "SELECT khachhang.TEN, khachhang.SDT, khachhang.EMAIL, khachhang.DIACHI, khachhang.MAKH
          FROM  khachhang
          WHERE MATK = $userId";
// execute the query
$result = mysqli_query($conn, $query);
// fetch the data
$userData = mysqli_fetch_assoc($result);

$query = "SELECT giohang.MAGH, giohang.MAKH, chitietgiohang.MASP, chitietgiohang.SOLUONG AS SLGH, sanpham.MASP, sanpham.HINHSP, sanpham.SOLUONG AS SLSP, chitietsanpham.TENSP, chitietsanpham.STORAGE, chitietsanpham.GIATIEN, chitietsanpham.MAU
FROM giohang, chitietgiohang, sanpham, khachhang, chitietsanpham
WHERE khachhang.MATK = $userId 
AND khachhang.MAKH = giohang.MAKH
AND giohang.MAGH = chitietgiohang.MAGH 
AND chitietgiohang.masp = sanpham.masp
AND chitietsanpham.masp = sanpham.masp
";

$resultSP = mysqli_query($conn, $query);


?>



<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="static/css/checkout.css">
</head>

<body>
    <div class="row" style="margin: 100px 100px 50px 100px">
        <div class="col-75">
            <div class="container">
                <form action="">

                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <input type="hidden" name="userId" value="<?php echo $userData['MAKH'] ?>">
                            <label for="fname"><i class="fa fa-user"></i> Họ và tên</label>
                            <input type="text" id="fname" name="fullname" value="<?php echo $userData['TEN'] ?>">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="john@example.com"
                                value="<?php echo $userData['EMAIL'] ?>">
                            <label for="phone"><i class="fa fa-phone"></i> Số điện thoại</label>
                            <input type="text" id="phone" name="phone" placeholder="650-555-1234"
                                value="<?php echo $userData['SDT'] ?>">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ</label>
                            <div class="row" style="padding-bottom: 20px">
                                <div class="col-30">
                                    <select class="form-select" name="" id="province">
                                        <option disabled selected hidden value="">Tỉnh/TP</option>
                                    </select>
                                </div>
                                <div class="col-30">
                                    <select class="form-select" name="" id="district">
                                        <option disabled selected hidden value="">Quận/huyện</option>
                                    </select>
                                </div>
                                <div class="col-30">
                                    <select class="form-select" name="" id="ward">
                                        <option disabled selected hidden value="">Phường/xã</option>
                                    </select>
                                </div>
                            </div>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street"
                                value="<?php echo $userData['DIACHI'] ?>">
                        </div>
                        <div class="col-50">
                            <div class="container">
                                <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i>
                                        <b></b></span></h4>
                                <?php
                                $totalAll = 0;
                                $cart_detail = [];
                                while ($product = mysqli_fetch_assoc($resultSP)) {
                                    $id = $product['MASP'];
                                    $name = $product['TENSP'];
                                    $image = $product['HINHSP'];
                                    $price = $product['GIATIEN'];
                                    $quantity = $product['SLGH'];
                                    $total = $price * $quantity;
                                    $totalAll = $totalAll + $total;

                                    array_push(
                                        $cart_detail,
                                        array(
                                            'id' => $id,
                                            'quantity' => $quantity,
                                        )
                                    );
                                    ?>
                                    <p class="cart_detail">
                                        <img src="static/image/products/<?php echo $image ?>" alt="product"
                                            style="width:20%">
                                        <a href="#"><?php echo $name ?></a>
                                    <div class="PQ">
                                        <span class="price"><?php echo $price ?></span>
                                        <span> x </span>
                                        <span class="quantity"> <?php echo $quantity ?></span>
                                    </div>
                                    </p>
                                <?php }
                                $cart_detail_json = json_encode($cart_detail);
                                ?>
                                <hr>
                                <p>Total <span class="price" style="color:black"><b><?php echo $totalAll ?></b></span>
                                </p>
                            </div>
                        </div>



                    </div>
                    <input type="submit" value="Đặt hàng" class="btn">
                </form>
                <link rel="stylesheet" href="static/css/popup.css">
                <div class="popup_button" id="popup-order-successful">
                    <img src="static/image/404-tick.png" alt="">
                    <h2>Thông báo</h2>
                    <p></p>
                    <div class="action-btn">
                        <button><a href="orderstatus" class="button-link">OK</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo "<script>var cartDetail = $cart_detail_json;</script>";
    ?>
    <script>
        $(document).ready(function () {
            $('form').on('submit', function (event) {
                console.log('sadsa');
                event.preventDefault();

                var formData = $(this).serialize();
                console.log(formData);
                var formDataObject = {};
                $.each($(this).serializeArray(), function (i, field) {
                    formDataObject[field.name] = field.value;
                });
                var selectedProvince = $('#province').val();
                var selectedDistrict = $('#district').val();
                var selectedWard = $('#ward').val();

                formDataObject['cart_detail'] = cartDetail;

                // Add the selected option values to the formDataObject
                formDataObject['province'] = selectedProvince;
                formDataObject['district'] = selectedDistrict;
                formDataObject['ward'] = selectedWard;

                console.log(formDataObject);

                $.ajax({
                    type: 'POST',
                    url: 'api/order_confirm.php',
                    data: formDataObject,
                    success: function (response) {
                        console.log(response);
                        response = JSON.parse(response);
                        if (response.errors) {
                            console.log(response.errors);
                            alert(response.errors.join('\n'));
                        } else if (response.message) {
                            // Handle success message here
                            if (response.message === "Đặt hàng thành công!") {
                                var popup = document.getElementById('popup-order-successful');
                                popup.querySelector('p').textContent = response.message;
                                popup.classList.add("open-popup");
                            }
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Handle AJAX error here
                        console.log('AJAX error:', textStatus, errorThrown);
                    }
                });
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"
        integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="static/js/address.js"></script>
    <script src="static/js/popup.js"></script>

</body>

</html>