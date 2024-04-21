<?php
include '../../config/connect.php';
$query_brands = "SELECT * FROM thuonghieu";
$result_brands = mysqli_query($conn, $query_brands);

?>

<div class="wrapper">
    <div class="content content-trangchu">
        <div class="top-trangchu">
            <div class="menu menu-left">
                <ul class="list">
                    <?php while ($row = mysqli_fetch_assoc($result_brands)): ?>
                    <li><a href=""><?php echo $row['TENTHUONGHIEU']; ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <div class="menu-right">
                <?php
                include 'slider.php';
                ?>
            </div>
        </div>
        <?php
        $query_brands = "SELECT * FROM thuonghieu";
        $result_brands = mysqli_query($conn, $query_brands);

        while ($brand = mysqli_fetch_assoc($result_brands)) {
            // create the SQL query to get all products of this brand
            $query_products = "SELECT * FROM chitietsanpham WHERE MATHUONGHIEU = " . $brand['MATHUONGHIEU'];
            $result_products = mysqli_query($conn, $query_products);
            ?>
        <div class="mid-trangchu">
            <div class="show-sanpham">
                <img alt="LAPTOP <?php echo $brand['TENTHUONGHIEU']; ?>"
                    src="https://lh3.googleusercontent.com/-E7ovjPHLnyWSk6S5Ew7aGiXOL2-8axqjI4H-SzYoCKQAYrP3YXh86tJ4wo61D4jD46LrV1M4HVzWChjExldrOkEDsOKkymA=w1232"
                    width="100%" height="100%" class="show-sanpham-img">
                <div class="top-show-sanpham">
                    <a href="?action=sanpham&laptop=<?php echo strtolower($brand['TENTHUONGHIEU']); ?>">Laptop
                        <?php echo $brand['TENTHUONGHIEU']; ?></a>
                    <a href="?action=sanpham&laptop=<?php echo strtolower($brand['TENTHUONGHIEU']); ?>">Xem tất cả ></a>
                </div>
                <div class="mid-show-sanpham">
                    <div class="list-sanpham">
                        <?php while ($product = mysqli_fetch_assoc($result_products)): 
                                $query_imageProduct = "SELECT * FROM sanpham WHERE MASP = " . $product['MASP'];
                                $result_imageProduct = mysqli_query($conn, $query_imageProduct);
                                $imageProduct = mysqli_fetch_assoc($result_imageProduct);
                                ?>
                        <div class="product">
                            <img alt="LAPTOP <?php echo $brand['TENTHUONGHIEU']; ?>"
                                src="static/image/products/<?php echo $imageProduct['HINHSP']; ?>">
                            <div class="clear">
                                <a href="src/laptopshop/product-detail.php"><?php echo $product['TENSP']; ?></a>
                                <h2><?php echo $brand['TENTHUONGHIEU']; ?></h2>
                                <div class="price">
                                    <?php echo number_format($product['GIATIEN'], 0, '', '.') . " Vnd"; ?>
                                </div>
                                <button class="addCart">Thêm <i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="btns-product">
                        <div class="btn-left btn"><i class='bx bx-chevron-left'></i></div>
                        <div class="btn-right btn"><i class='bx bx-chevron-right'></i></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

    </div>

</div>

</div>
