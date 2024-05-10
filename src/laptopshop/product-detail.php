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
                <h2>Laptop <?php echo $product['TENSP'];?> </h2>
                <p>Giá tiền: <?php echo $product['GIATIEN'] ?></p>
            </div>
            <div class="promotion">
                <h5>Khuyến mãi</h5>
                <ul>
                    <li>Tặng balo khi mua hàng có hóa đơn trên 1tr</li>
                    <li>Giảm giá sốc khi mua nhiều mặt hàng</li>
                    <li>Giao hàng nhanh ngay trong ngày</li>
                    <li>Miễn phí đổi trả nếu có bất kỳ vấn đề trong vòng 1 tháng từ khi mua hàng</li>
                </ul>
            </div>
            <div class="paying-product">
                <a href="#"></a><button>Mua ngay</button></a>
                <a href="#"></a><button>Thêm vào giỏ hàng</button></a>
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