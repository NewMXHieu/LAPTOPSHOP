<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">
        //     $(document).ready(function() {
        //     $('#button').on("click",function() {
        //         var $value = $('#search').val();

        //         $.ajax({
        //             type:"get",
        //             url: "xuly.php?value=" + $value,
        //             datatype: "text",
        //             data: {
        //                 value: $value
        //             },
        //             success: function(data) {
        //                 $(".main").htmt(data);
        //             }
        //         });
        //     });
        // });
        function showHint() {
            var str = document.getElementById("search").value;
            if (str.length == 0) {
                document.getElementById("ketqua").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("ketqua").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "xuly.php?value=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>

    <div class="wrapper">
        <div class="content top-trangchu">
            <div class="menu menu-left">
                <div class="loc">
                    <h3>Hãng sản xuất</h3>
                    <div class="checkItems">
                        <p><input type="checkbox" checked> Tất cả</p>
                        <p><input type="checkbox"> Asus</p>
                        <p><input type="checkbox"> Lenovo</p>
                        <p><input type="checkbox"> MSI</p>
                        <p><input type="checkbox"> Gigabyte</p>
                        <p><input type="checkbox"> LG</p>
                        <!-- <p><input type="checkbox"> Vaio</p> -->
                        <p><input type="checkbox"> Apple (MacBook)</p>
                        <p><input type="checkbox"> HP</p>
                        <p><input type="checkbox"> Acer</p>
                        <p><input type="checkbox"> Dell</p>
                        <!-- <p><input type="checkbox"> Huawei</p> -->
                        <!-- <p><input type="checkbox"> Masstel</p> -->
                        <!-- <p><input type="checkbox"> Microsoft (Surface)</p> -->
                    </div>

                </div>

                <div class="loc">
                    <h3>Mức giá</h3>
                    <div class="checkItems">
                        <p><input type="checkbox" checked> Tất cả</p>
                        <p><input type="checkbox"> Dưới 10 triệu</p>
                        <p><input type="checkbox"> Từ 10 - 15 triệu</p>
                        <p><input type="checkbox"> Từ 15 - 20 triệu</p>
                        <p><input type="checkbox"> Từ 20 - 25 triệu</p>
                        <p><input type="checkbox"> Trên 25 triệu</p>
                    </div>
                </div>

                <!-- <div class="loc">
                <h3>Màn hình</h3>
                <div class="checkItems">
                    <p><input type="checkbox" checked> Tất cả</p>
                    <p><input type="checkbox"> Khoảng 13 inch</p>
                    <p><input type="checkbox"> Khoảng 14 inch</p>
                    <p><input type="checkbox"> Trên 15 inch</p>
                </div>
            </div>

            <div class="loc">
                <h3>CPU</h3>
                <div class="checkItems">
                    <p><input type="checkbox" checked> Tất cả</p>
                    <p><input type="checkbox"> Intel Celeron</p>
                    <p><input type="checkbox"> Intel Pentium</p>
                    <p><input type="checkbox"> Intel Core i3</p>
                    <p><input type="checkbox"> Intel Core i5</p>
                    <p><input type="checkbox"> Intel Core i7</p>
                    <p><input type="checkbox"> AMD Ryzen 3</p>
                    <p><input type="checkbox"> AMD Ryzen 5</p>
                    <p><input type="checkbox"> AMD Ryzen 7</p>
                </div>
            </div>

            <div class="loc">
                <h3>RAM</h3>
                <div class="checkItems">
                    <p><input type="checkbox" checked> Tất cả</p>
                    <p><input type="checkbox"> 4GB</p>
                    <p><input type="checkbox"> 8GB</p>
                    <p><input type="checkbox"> 16GB</p>
                    <p><input type="checkbox"> 32GB</p>
                </div>
            </div>

            <div class="loc">
                <h3>Card đồ họa</h3>
                <div class="checkItems">
                    <p title="Tất cả" for="check"><input type="checkbox" checked id="check"> Tất cả</p>
                    <p><input type="checkbox"> NVIDIA GeForce Series</p>
                    <p><input type="checkbox"> AMD Radeon Series</p>
                    <p><input type="checkbox"> Card Onboard</p>
                </div>
            </div>

            <div class="loc">
                <h3>Ổ cứng</h3>
                <div class="checkItems">
                    <p><input type="checkbox" checked> Tất cả</p>
                    <p><input type="checkbox"> SSD 1 TB</p>
                    <p><input type="checkbox"> SSD 512 GB</p>
                    <p><input type="checkbox"> SSD 256 GB</p>
                    <p><input type="checkbox"> SSD 128 GB</p>
                </div>
            </div>

            <div class="loc">
                <h3>Tính năng đặc biệt</h3>
                <div class="checkItems">
                    <p><input type="checkbox" checked> Tất cả</p>
                    <p><input type="checkbox"> CPU Intel</p>
                    <p><input type="checkbox"> CPU Intel Gen 13</p>
                    <p><input type="checkbox"> CPU AMD</p>
                    <p><input type="checkbox"> Card NVIDIA RTX Series 4000</p>
                    <p><input type="checkbox"> Sử dụng tấm nền IPS</p>
                    <p><input type="checkbox"> Windows bản quyền</p>
                    <p><input type="checkbox"> Mở khóa vân tay</p>
                    <p><input type="checkbox"> Đèn nền bàn phím</p>
                    <p><input type="checkbox"> Bảo vệ trẻ em</p>
                </div>
            </div>

            <div class="loc">
                <h3>Nhu cầu</h3>
                <div class="checkItems">
                    <p><input type="checkbox" checked> Tất cả</p>
                    <p><input type="checkbox"> Gaming</p>
                    <p><input type="checkbox"> Sinh viên - Văn phòng</p>
                    <p><input type="checkbox"> Thiết kế đồ họa</p>
                    <p><input type="checkbox"> Mỏng nhẹ</p>
                    <p><input type="checkbox"> Doanh nhân</p>
                </div>
            </div> -->

            </div>

            <div class="menu menu-right">
                <input type="search" name="search" id="search" placeholder="Tim kiem...">
                <input type="button" name="button" id="button" value="Kiem" onclick="showHint()">
                <div id="ketqua"></div>
                <div class="main">
                    <?php
                    $hang = "";
                    while ($row_sanpham = mysqli_fetch_assoc($query_sanpham)) {

                        if ($row_sanpham['MANCC'] == "1") {
                            $hang = "ACER";
                        } else if ($row_sanpham['MANCC'] == "4") {
                            $hang = "DELL";
                        } else if ($row_sanpham['MANCC'] == "6") {
                            $hang = "HP";
                        } else if ($row_sanpham['MANCC'] == "7") {
                            $hang = "LENOVO";
                        } else {
                            $hang = "Ko co";
                        }
                    ?>
                        <div class="product">
                            <img src="../../image/10001.jpg" alt="">
                            <div class="clear">
                                <a href="#"><?php echo $hang ?></a>
                                <h2><?php echo $row_sanpham['TENSP'] ?></h2>
                                <div class="price"><?php echo number_format($row_sanpham['GIATIEN'], 0, '', '.') . " Vnd" ?></div>
                                <button class="addCart">Thêm <i class="fa-solid fa-plus"></i></button>
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>