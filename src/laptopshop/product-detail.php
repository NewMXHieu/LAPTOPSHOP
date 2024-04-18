<?php
    include "header.php"
?>
<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT *FROM chitietsanpham WHERE  id = $id;";
        $product = execute($sql)->fetch_assoc();
    
    }

?>


<link rel="stylesheet" href="static/css/style.css">

<div class="detail">
    <!--================ Ảnh và thông tin khuyến mãi ========================-->
    <div class="product">
        <div class="product-image">
            <!-- lấy từ database -->
        </div>
        <div class="thongtinsp">
            <div class="product-name">
                <h2>Laptop <?php echo $product['TENSP'];?> </h2>
                <p>Giá tiền: <?php echo $product['GIATIEN'] ?></p>
            </div>
            <div class="promotion">
                <h5>Khuyến mãi</h5>

                <span>Tặng balo</span>
                <span>Giảm giá sốc</span>
                <span>Giao hàng nhanh</span>
            </div>
        </div>
    </div>
    
    <!--==================== Thông tin chi tiết sản phẩm ====================-->
    <div class="information">
        <h5>Thông tin sản phẩm</h5>

        <div class="information-list">
            <p>Mã sản phẩm: <?php echo $product['MASP'] ?></p>
            <p>Mã sản phẩm: <?php echo $product['MASP'] ?></p>
            <p>Mã sản phẩm: <?php echo $product['MASP'] ?></p>
            <p>Mã sản phẩm: <?php echo $product['MASP'] ?></p>
            <p>Mã sản phẩm: <?php echo $product['MASP'] ?></p>
            <p>Mã sản phẩm: <?php echo $product['MASP'] ?></p>
            <p>Mã sản phẩm: <?php echo $product['MASP'] ?></p>

        </div>
    </div>
</div>


<!--========================= Gợi ý thêm sản phẩm ==========================-->
<div class="recommend">
        <h3>Một số sản phẩm khác</h3>

        <div class="recommend-list">
            
        </div>



</div>







<?php
    include "footer.php"
?>

