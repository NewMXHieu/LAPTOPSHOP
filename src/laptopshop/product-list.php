<?php
include '../../config/connect.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
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
        <div class="search">
        <input class="input-search1" id="txtSearch" type="text" name="fseacrh" placeholder="Search in here...">
        <input class="input-search2" id="bthSearch" type="submit" name="search" value="Search">
    </div>
            <div class="main"></div>
            <div class="pagination"></div>
        </div>
    </div>
</div>
<script>
    let page = 1;
    let search = '';
    function readData(search) {
        $.ajax({
            url: "api/viewsanpham.php",
            type: "GET",
            data: {
                search: search,
                page: page
            },
            success: function (data) {
                $(".main").empty();
                $(".main").append(data);
                // console.log(data);
            }
        })
    }
    $(document).ready(function() {
        
        $("#bthSearch").click();
    });
    $("#bthSearch").click(function(){
        console.log(1);
        search = $("#txtSearch").val().trim();
        readData(search);
        Pagination(search);
        $('html, body').animate({
            scrollTop: $(".main").offset().top -70 // Thay ".main" bằng selector của phần hiện sản phẩm của bạn
    }, 'slow');
    })
    document.onkeydown=function(){
        if(window.event.keyCode=='13'){
            $("#bthSearch").click();
        }
    }

    $(".pagination ").on("click", "a", function (e) {
        e.preventDefault();
        page = ($(this).text());
        readData(search);
    });
    function Pagination(search){
        $.ajax({
            url: "api/phantrang.php",
            type: "GET",
            data: {
                search: search
            },
            success: function (data) {
                if(data < 1){
                    $(".pagination").hide();
                } else{
                    $(".pagination").show();
                    $(".pagination").empty();
                    let pagi = '';
                    for(var i=1;i<=data;i++){
                        pagi += '<a href="#">'+i+'</a>';
                    }
                    $(".pagination").append(pagi);
                }
            }
        })
    }
    $(".menu-left").on("click","li a", function () {
        search = $(this).text();
        readData(search);
        Pagination(search);
    });
</script>
