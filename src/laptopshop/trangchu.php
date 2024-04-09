<div class="wrapper">
    <div class="content content-trangchu">
        <div class="top-trangchu">
            <div class="menu menu-left">
                <ul class="list">
                    <li>Laptop Acer</li>
                    <li>Laptop Apple</li>
                    <li>Laptop Asus</li>
                    <li>Laptop Dell</li>
                    <li>Laptop Lenovo</li>
                    <li>Laptop HP</li>
                    <li>Laptop MSI</li>
                </ul>
            </div>
            <div class="menu-right">
                <?php
                include 'slider.php';
                ?>
            </div>
        </div>

        <div class="mid-trangchu">
            <div class="show-sanpham">
                <img alt="LAPTOP HP" src="https://lh3.googleusercontent.com/-E7ovjPHLnyWSk6S5Ew7aGiXOL2-8axqjI4H-SzYoCKQAYrP3YXh86tJ4wo61D4jD46LrV1M4HVzWChjExldrOkEDsOKkymA=w1232" width="100%" height="100%" class="show-sanpham-img">
                <div class="top-show-sanpham">
                    <a href="?action=sanpham&laptop=hp">Laptop HP</a>
                    <a href="?action=sanpham&laptop=hp">Xem tất cả ></a>
                </div>
                <div class="mid-show-sanpham">
                    <div class="list-sanpham">
                        <?php
                        while ($row_sanpham1 = mysqli_fetch_assoc($query_sanpham1)) {
                        ?>
                            <div class="product">
                                <img src="static/image/10001.jpg" alt="">
                                <div class="clear">
                                    <a href="#">HP</a>
                                    <h2><?php echo $row_sanpham1['TENSP'] ?></h2>
                                    <div class="price"><?php echo number_format($row_sanpham1['GIATIEN'], 0, '', '.') . " Vnd" ?></div>
                                    <button class="addCart">Thêm <i class="fa-solid fa-plus"></i></button>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                    <div class="btns">
                        <div class="btn-left btn"><i class='bx bx-chevron-left'></i></div>
                        <div class="btn-right btn"><i class='bx bx-chevron-right'></i></div>
                    </div>
                </div>
            </div>
            <div class="show-sanpham">
                <img alt="LAPTOP DELL" src="https://lh3.googleusercontent.com/MX4EIYSDGrPytnzFOekQNgEScPD0aWg3kE0fnnN95fydTrvHOllvCBNrOEvF1sUO9BGK7AKCfxItTHHGjQVOE1yu3X_FwtXQ=w1232" width="100%" height="100%" class="show-sanpham-img">
                <div class="top-show-sanpham">
                    <a href="?action=sanpham&laptop=dell">Laptop DELL</a>
                    <a href="?action=sanpham&laptop=dell">Xem tất cả ></a>
                </div>
                <div class="mid-show-sanpham">
                    <div class="list-sanpham">
                        <?php
                        while ($row_sanpham2 = mysqli_fetch_assoc($query_sanpham2)) {
                        ?>
                            <div class="product">
                                <img src="static/image/10001.jpg" alt="">
                                <div class="clear">
                                    <a href="#">DELL</a>
                                    <h2><?php echo $row_sanpham2['TENSP'] ?></h2>
                                    <div class="price"><?php echo number_format($row_sanpham2['GIATIEN'], 0, '', '.') . " Vnd" ?></div>
                                    <button class="addCart">Thêm <i class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="btns">
                        <div class="btn-left btn"><i class='bx bx-chevron-left'></i></div>
                        <div class="btn-right btn"><i class='bx bx-chevron-right'></i></div>
                    </div>
                </div>
            </div>
            <div class="show-sanpham">
                <img alt="LAPTOP LENOVO" src="https://lh3.googleusercontent.com/RslAPC8Xl3dhq1jfRSCUPm7w4WvIcPgbiA800QFEdcoEQFJnBPHy5AgMf2Rh00F3DavCin2xcjV5wx-mv-B5GH12w8jTlp1VHw=w1232" width="100%" height="100%" class="show-sanpham-img">
                <div class="top-show-sanpham">
                    <a href="?action=sanpham&laptop=lenovo">Laptop LENOVO</a>
                    <a href="?action=sanpham&laptop=lenovo">Xem tất cả ></a>
                </div>
                <div class="mid-show-sanpham">
                    <div class="list-sanpham">
                        <?php
                        while ($row_sanpham3 = mysqli_fetch_assoc($query_sanpham3)) {
                        ?>
                            <div class="product">
                                <img src="static/image/10001.jpg" alt="">
                                <div class="clear">
                                    <a href="#">LENOVO</a>
                                    <h2><?php echo $row_sanpham3['TENSP'] ?></h2>
                                    <div class="price"><?php echo number_format($row_sanpham3['GIATIEN'], 0, '', '.') . " Vnd" ?></div>
                                    <button class="addCart">Thêm <i class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>
                         <?php } ?>   
                    </div>
                
                </div>
                <div class="btns">
                    <div class="btn-left btn"><i class='bx bx-chevron-left'></i></div>
                    <div class="btn-right btn"><i class='bx bx-chevron-right'></i></div>
                </div>

            </div>

        </div>
    </div>

</div>

</div>
<script src="static/js/app.js"></script>