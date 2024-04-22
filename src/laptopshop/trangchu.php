<?php
include '../../config/connect.php';
?>

<div class="wrapper">
    <div class="content content-trangchu">
        <div class="top-trangchu">
            <div class="menu menu-left">
                <ul class="list">
                    <li><a href="#" value="asus">Laptop ASUS<img src="https://lh3.googleusercontent.com/hqBTHqQRBdv5P7EuiclPKzZZisus_wC-QZ_pq9ZRg5I4sa028thCSEwzY0yft-Gb2wyZNHZgEpo24uks-9qL12qQ9Yvy_Fcz=rw"></a></li>
                    <li><a href="#">Laptop ACER<img src="https://lh3.googleusercontent.com/IAlZ9kiZsV1CRAQtQezaD4aEXZAZiC6-H9lQ2LxG8FB5TcIWtIkJ41w7ushFEMaaPIHFHUOh5H7he4iYW-D3sSquf-bMpH5d=rw"></a></li>
                    <li><a href="#">Laptop HP<img src="https://lh3.googleusercontent.com/ZllML-pVmNz1U_TUZpG0M9HKD00dK1F-gaXca-e4pz03kLaqg6uptT7jsdOLeRv0jpt59GdNLDTXpBMvtclSTv39VxVDhyo6=rw"></a></li>
                    <li><a href="#">Laptop APPLE<img src="https://lh3.googleusercontent.com/dupfTD9OKdjV88iSqg7DQcbBMxVAB9_bo1QSmp0-me7EKKTOTRyP25AA0WpZG_pvJmfrkfrEI_D0yT5G5bR2LTT6WpESH-df=rw"></a></li>
                    <li><a href="#">Laptop DELL<img src="https://lh3.googleusercontent.com/JEBFMd8rzkf5IeYcHF0MIcwh5u7nqYgssfwjQIiQU3XF-CfPtyttOCdiITFQjkRxx83DS-zV4XgLYhRgkt3KOGG0l59s0h3J=rw"></a></li>
                    <li><a href="#">Laptop GIGABYTE <img src="https://lh3.googleusercontent.com/XtEg0_UNPgEzRD7xMCHTP7BUFeWwocIiXfPgfeB_zyvQuLR_P_CkirP15THl-MBlGTdvsXvvAKG2y_wxnzTuSPonKIvRXp_Gjw=rw"></a></li>
                    <li><a href="#">Laptop LG<img src="https://lh3.googleusercontent.com/EdOdJmMDlce2gVvwkHtEEUakWzYnFHyLHc8dlt61LF_fUX1JSZOAVzWU8hM7NVMKbSm2T9Kb0Mbk1Fexk9IYfSHEUC_Hywx-=rw"></a></li>
                    <li><a href="#">Laptop LENOVO<img src="https://lh3.googleusercontent.com/ExeRhWXn9UnSUjFCmmVk6Px_6QPuEH9tbGiikbm_8-mXG3izok5xNos2z7vZG0yWVvqUK0sauE3QnmKeByChDdmb6GIyzWdi=rw"></a></li>
                    <li><a href="#">Laptop MSI<img src="https://lh3.googleusercontent.com/-EwohKCaauth-ZdhZWayZIKrJLQfIOWQWpEuGW_xzXF2YHZm5Dz2tD3b7iD4_IHugt86lQQ5SRUrH8iFurxDoEMvmNdNeFQ=rw"></a></li>
                </ul>
            </div>
            <div class="menu-right">
                <?php
                include 'slider.php';
                ?>
            </div>
        </div>
        <?php
        // $query_brands = "SELECT * FROM thuonghieu";
        // $result_brands = mysqli_query($conn, $query_brands);

        // while ($brand = mysqli_fetch_assoc($result_brands)) {
        //     // create the SQL query to get all products of this brand
        //     $query_products = "SELECT * FROM chitietsanpham WHERE MATHUONGHIEU = " . $brand['MATHUONGHIEU'];
        //     $result_products = mysqli_query($conn, $query_products);
        ?>
            <!-- <div class="mid-trangchu">
                
            </div> -->
        <?php
        // }
        ?>

    </div>
<?php include "product-list.php"?>
</div>

</div>
