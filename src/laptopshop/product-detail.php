<?php
    // include 'header.php';
    include '../../config/connect.php';

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if (empty($id)){
        exit('Không tìm thấy mã sản phẩm');
    }

    $product_query = "SELECT * FROM chitietsanpham WHERE MASP = '$id'";
    $product_result = mysqli_query($conn,$product_query);
        
    if(mysqli_num_rows($product_result) == 0) {
        // Xử lý khi không tìm thấy sản phẩm
        exit('Không tìm thấy sản phẩm.');
    }
    $product = mysqli_fetch_assoc($product_result);


    
    

?>


<link rel="stylesheet" href="static/css/style.css">


<div class="detail">
    <!--================ Ảnh và thông tin khuyến mãi ========================-->
    <div class="product-detail">
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
                <h2><?php echo $product['TENSP'];?> </h2>
                <p class="danhgia"><?php echo rand(1,5).'.0'; ?> <img width="22" height="22"
                        src="https://img.icons8.com/emoji/48/star-emoji.png" alt="star-emoji" /></p>
                <p class="present-price"><?php echo number_format($product['GIATIEN'], 0, "", ".")?>đ</p>
                <p class="past-price">
                    <?php 
                        // Query to get the discount for the product
                        $khuyenmai_query = "SELECT * FROM sanphamkhuyenmai WHERE MASP = '$id'";
                        $khuyenmai_result = mysqli_query($conn, $khuyenmai_query);

                        // Check if the query executed successfully and returned a result
                        if ($khuyenmai_result && mysqli_num_rows($khuyenmai_result) > 0) {
                            // Fetch the discount details
                            $khuyenmai = mysqli_fetch_assoc($khuyenmai_result);

                            // Calculate the past price
                            $original_price = $product['GIATIEN'];
                            $discount_percentage = $khuyenmai['GIAMGIA'];
                            $discount_amount = $original_price * ($discount_percentage / 100);
                            $past_price = $original_price + $discount_amount;

                            // Output the past price formatted with thousands separator
                            echo number_format($past_price, 0, "", ".") . "đ"; 
                        }
                        // If no discount is found or no product is found, do nothing
                    ?>
                </p>
            </div>
            <div class="promotion">
                <h5>Khuyến mãi</h5>
                <?php
                $promo_query = "SELECT * FROM chitietkhuyenmai";
                $promo_result = mysqli_query($conn,$promo_query);
                ?>
                <ul>
                    <?php
                        while($promo = mysqli_fetch_assoc($promo_result)){
                            echo $promo['QUATANG'];
                            echo '<br>';
                        }    
                    ?>
                </ul>
            </div>
            <div class="paying-product">
                <a href="checkout"><button class="sell-button">Mua ngay</button></a>
                <button class="addCart" data-id="<?php echo $id?>">Thêm vào giỏ hàng</button>
            </div>
        </div>
    </div>

    <!--==================== Thông tin chi tiết sản phẩm ====================-->
    <div class="information">
        <h5>Thông tin sản phẩm</h5>
        <div class="information-list">
            <table class="table table-striped table-bordered">
                <tr>
                    <td class="detail-name">Mã sản phẩm:</td>
                    <td class="detail-content"> <?php echo $product['MASP'] ?>
                    </td>
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
    <h5>Gợi ý sản phẩm</h5>
    <div class="bip">
        <div class="recommend-row">
            <?php
                $recommend_query = "SELECT * FROM sanpham
                INNER JOIN chitietsanpham ON sanpham.MASP = chitietsanpham.MASP
                INNER JOIN thuonghieu ON chitietsanpham.MATHUONGHIEU = thuonghieu.MATHUONGHIEU";

                $recommend_result = mysqli_query($conn,$recommend_query);

                $data = '';
                // $list = '<div class="recommend-list>"';
                
                while($row_recommend = mysqli_fetch_assoc($recommend_result)){
                    if ($_GET['id'] != $row_recommend['MASP']){
                        $data.= '<div class="product">';
                        $data.= '<a href="product-detail?id=' .$row_recommend['MASP']. '">';
                            $data.= '<img src="static/image/products/'.$row_recommend['HINHSP'].'"alt="">';
                            $data.= '<div class="clear">';
                                $data.= '<a href="product-detail?id=' .$row_recommend['MASP']. '">' .$row_recommend['TENSP']. '</a>';
                                $data.= '<h2>' .$row_recommend['TENTHUONGHIEU']. '</h2>';
                                $data.= '<div class="price">' . number_format($row_recommend['GIATIEN'], 0, "", ".") . " Vnd". '</div>';
                                $data.= '<button class="addCart">Thêm <i class="fa-solid fa-plus"></i></button>';
                            $data.= '</div>';
                        $data.= '</a>';
                    $data.= '</div>';
                    }
                    // $list .= $data;
                }
                // $list .= '</div>';
                echo $data;
            ?>
        </div>
    </div>

</div>
<script src="laptopshop/static/js/cart.js"></script>