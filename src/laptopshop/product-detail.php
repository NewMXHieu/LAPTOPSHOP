<?php
    include 'header.php';
    include '../../config/connect.php';
        
    $product_query = "SELECT * FROM chitietsanpham";
    $product_result = mysqli_query($conn,$product_query);
?>


<link rel="stylesheet" href="static/css/style.css">

<div class="detail">
    <!--================ Ảnh và thông tin khuyến mãi ========================-->
    <?php $product = mysqli_fetch_assoc($product_result); ?>


    <div class="product">
        <div class="product-image">
            <?php
                $query_imageProduct = "SELECT * FROM sanpham WHERE MASP = " . $product['MASP'];
                $result_imageProduct = mysqli_query($conn, $query_imageProduct);
                $imageProduct = mysqli_fetch_assoc($result_imageProduct); 
            ?>
            <img alt="LAPTOP <?php echo $brand['TENTHUONGHIEU']; ?>"
                src="static/image/products/<?php echo $imageProduct['HINHSP']; ?>">
        </div>
        <div class="thongtinsp">
            <div class="product-name">
                <h2>Laptop <?php echo $product['TENSP'];?> </h2>
                <p>Giá tiền: <?php echo $product['GIATIEN'] ?></p>
            </div>
            <div class="promotion">
                <h5>Khuyến mãi</h5>
                <ul>
                    <li>Tặng balo khi mua hàng có hóa đơn trên 1 jack</li>
                    <li>Giảm giá sốc khi mua nhiều mặt hàng</li>
                    <li>Giao hàng nhanh ngay trong ngày</li>
                    <li>Miễn phí đổi trả nếu có bất kỳ vấn đề trong vòng 1 tháng từ khi mua hàng</li>
                </ul>

            </div>
        </div>
    </div>

    <!--==================== Thông tin chi tiết sản phẩm ====================-->
    <div class="information">
        <h5>Thông tin sản phẩm</h5>
        <div class="information-list">
            <table>
                <tr>
                    <td class="detail-name">Mã sản phẩm:</td>
                    <td class="detail-content"> <?php echo $product['MASP'] ?></td>
                </tr>
                <tr>
                    <td class="detail-name">CPU:</td>
                    <td class="detail-content"><?php echo $product['CPU'] ?></td>
                </tr>
                <tr>
                    <td class="detail-name">Màn hình:</td>
                    <td class="detail-content"><?php echo $product['SCREEN'] ?></td>

                </tr>
                <tr>
                    <td class="detail-name">RAM: </td>
                    <td class="detail-content"><?php echo $product['RAM'] ?></td>

                </tr>
                <tr>
                    <td class="detail-name">VGA: </td>
                    <td class="detail-content"><?php echo $product['VGA'] ?></td>

                </tr>
                <tr>
                    <td class="detail-name">Bộ nhớ:</td>
                    <td class="detail-content"><?php echo $product['STORAGE'] ?></td>

                </tr>
                <tr>
                    <td class="detail-name">Hệ điều hành:</td>
                    <td class="detail-content"><?php echo $product['OS'] ?></td>

                </tr>
                <tr>
                    <td class="detail-name">Pin: </td>
                    <td class="detail-content"><?php echo $product['PIN'] ?></td>

                </tr>
                <tr>
                    <td class="detail-name">Trọng lượng:</td>
                    <td class="detail-content"><?php echo $product['WEIGHT'] ?></td>

                </tr>
                <tr>
                    <td class="detail-name">Màu sắc: </td>
                    <td class="detail-content"><?php echo $product['MAU'] ?></td>
                </tr>
            </table>



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