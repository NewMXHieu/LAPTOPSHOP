<?php
include '../../config/connect.php';
$sql = "SELECT * FROM thuonghieu";
$query = mysqli_query($conn, $sql );
$query2 = mysqli_query($conn, $sql );

?>
<div class="wrapper">
<div class="overplay"></div>
    <div class="content top-trangchu">
            <div class="menu menu-left menu-left-1">
                <ul class="list">
                    <?php while ($brand = mysqli_fetch_assoc($query)){?>
                        <li><a href="<?php echo $brand['TENTHUONGHIEU']?>">Laptop <?php echo $brand['TENTHUONGHIEU']?><img src="static/image/<?php echo $brand['TENTHUONGHIEU']?>.webp"></a></li>
                    <?php }?>
                </ul>
            </div>
            <div class="menu menu-left menu-left-3">
                <ul class="list">
                    <?php while ($brand1 = mysqli_fetch_assoc($query2)){?>
                        <li><a href="<?php echo $brand1['TENTHUONGHIEU']?>">Laptop <?php echo $brand1['TENTHUONGHIEU']?><img src="static/image/<?php echo $brand1['TENTHUONGHIEU']?>.webp"></a></li>
                    <?php }?>
                </ul>
            </div>
            <div class="menu-right">
                <?php
                include 'slider.php';
                ?>
            </div>
    </div>
<?php include "product-list.php"?>
</div>

</div>
<script>
    $('.overplay').click(function () {
        // $('.menu-left-1').toggle();
        // $('.overplay').toggle();
        $('.danhmuc').click();
    });
</script>