<?php
include '../../config/connect.php';
?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script> -->
<div class="content top-trangchu">
    <div class="menu menu-left">
        <div class="loc">
            <h3>Hãng sản xuất</h3>
            <div class="checkItems checkItem-1">
                <p><input type="checkbox" checked value="0"> Tất cả</p>
                <p><input type="checkbox" value="1"> Acer</p>
                <p><input type="checkbox" value="2"> Apple (MacBook)</p>
                <p><input type="checkbox" value="3"> Asus</p>
                <p><input type="checkbox" value="4"> Dell</p>
                <p><input type="checkbox" value="5"> Gigabyte</p>
                <p><input type="checkbox" value="6"> HP</p>
                <p><input type="checkbox" value="7"> LG</p>
                <p><input type="checkbox" value="8"> Lenovo</p>
                <p><input type="checkbox" value="9"> MSI</p>
            </div>

        </div>

        <div class="loc">
            <h3>Mức giá</h3>
            <div class="checkItems checkItem-2">
                <p><input type="checkbox" checked value="0"> Tất cả</p>
                <p><input type="checkbox" value="< 10000000"> Dưới 10 triệu</p>
                <p><input type="checkbox" value="BETWEEN 10000000 AND 15000000"> Từ 10 - 15 triệu</p>
                <p><input type="checkbox" value="BETWEEN 15000000 AND 20000000"> Từ 15 - 20 triệu</p>
                <p><input type="checkbox" value="BETWEEN 20000000 AND 25000000"> Từ 20 - 25 triệu</p>
                <p><input type="checkbox" value="> 25000000"> Trên 25 triệu</p>
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
        </div> -->

        <div class="loc">
            <h3>CPU</h3>
            <div class="checkItems checkItem-3">
                <p><input type="checkbox" checked value="0"> Tất cả</p>
                <!-- <p><input type="checkbox"> Intel Celeron</p>
                <p><input type="checkbox"> Intel Pentium</p> -->
                <p><input type="checkbox" value="Intel Core i3"> Intel Core i3</p>
                <p><input type="checkbox" value="Intel Core i5"> Intel Core i5</p>
                <p><input type="checkbox" value="Intel Core i7"> Intel Core i7</p>
                <p><input type="checkbox" value="AMD Ryzen 3"> AMD Ryzen 3</p>
                <p><input type="checkbox" value="AMD Ryzen 5"> AMD Ryzen 5</p>
                <p><input type="checkbox" value="AMD Ryzen 7"> AMD Ryzen 7</p>
            </div>
        </div>

        <div class="loc">
            <h3>RAM</h3>
            <div class="checkItems checkItem-4">
                <p><input type="checkbox" checked value="0"> Tất cả</p>
                <p><input type="checkbox" value="4GB"> 4GB</p>
                <p><input type="checkbox" value="8GB"> 8GB</p>
                <p><input type="checkbox" value="16GB"> 16GB</p>
                <p><input type="checkbox" value="32GB"> 32GB</p>
            </div>
        </div>

        <!-- <div class="loc">
            <h3>Card đồ họa</h3>
            <div class="checkItems">
                <p title="Tất cả" for="check"><input type="checkbox" checked id="check"> Tất cả</p>
                <p><input type="checkbox"> NVIDIA GeForce Series</p>
                <p><input type="checkbox"> AMD Radeon Series</p>
                <p><input type="checkbox"> Card Onboard</p>
            </div>
        </div> -->

        <div class="loc">
            <h3>Ổ cứng</h3>
            <div class="checkItems checkItem-5">
                <p><input type="checkbox" checked value="0"> Tất cả</p>
                <p><input type="checkbox" value="512"> SSD 512 GB</p>
                <p><input type="checkbox" value="256"> SSD 256 GB</p>
                <p><input type="checkbox" value="128"> SSD 128 GB</p>
            </div>
        </div>

        <!-- <div class="loc">
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
        </div> -->

        <div class="loc">
            <h3>Nhu cầu</h3>
            <div class="checkItems checkItem-6">
                <p><input type="checkbox" checked value="0"> Tất cả</p>
                <p><input type="checkbox" value="1"> Doanh nghiệp</p>
                <p><input type="checkbox" value="2"> Doanh nhân</p>
                <p><input type="checkbox" value="3"> Gaming</p>
                <p><input type="checkbox" value="4"> Học sinh - Sinh viên</p>
                <p><input type="checkbox" value="5"> Văn phòng</p>
                <p><input type="checkbox" value="6"> Đồ họa - Kỹ thuật</p>
            </div>
        </div>

    </div>

    <div class="menu menu-right">
        <div class="thongbao"></div>
        <div class="main"></div>
        <div class="pagination"></div>
    </div>
</div>
<script>
    let page = 1;
    let search = '';
    let cost = '';
    let brand = 0;
    let cpu = '';
    let ram = '';
    let storage = '';
    let loai = 0;

    function readData(search) {
        $.ajax({
            url: "api/viewsanpham.php",
            type: "GET",
            data: {
                search: search,
                page: page,
                cost: cost,
                brand: brand,
                cpu : cpu,
                ram : ram,
                storage : storage,
                loai : loai
            },
            success: function(data) {
                if (data == null || data == '') {
                    $('.thongbao').html("KHÔNG CÓ SẢN PHẨM THEO YÊU CẦU!");
                    $('.main').empty();
                } else {
                    $('.thongbao').empty();
                    $(".main").empty();
                    $(".main").append(data);
                }

            }
        })
    }

    function Pagination(search) {
        $.ajax({
            url: "api/phantrang.php",
            type: "GET",
            data: {
                search: search,
                cost: cost,
                brand: brand,
                cpu : cpu,
                ram : ram,
                storage : storage,
                loai : loai

            },
            success: function(data) {
                if (data < 1) {
                    $(".pagination").hide();
                } else {
                    $(".pagination").show();
                    $(".pagination").empty();
                    let pagi = '';
                    for (var i = 1; i <= data; i++) {
                        // Thêm một lớp CSS "active" cho thẻ <a> đầu tiên
                        if (i === 1) {
                            pagi += '<a href="#" class="active">' + i + '</a>';
                        } else {
                            pagi += '<a href="#">' + i + '</a>';
                        }
                    }
                    $(".pagination").append(pagi);
                }
            }
        });
    }

    $(".list").on("click", "li a", function() {
        search = $(this).text();
        page = 1;
        delayLoad();
        $('html, body').animate({
            scrollTop: $(".main").offset().top - 70 // Thay ".main" bằng selector của phần hiện sản phẩm của bạn
        }, 'slow');
    });
    $(".pagination ").on("click", "a", function(e) {
        e.preventDefault();
        $(".pagination a").removeClass("active");
        $(this).addClass("active");
        page = ($(this).text());
        readData(search);
    });
    $(".checkItem-1").on("click", "input", function(e) {
        $(".checkItem-1 input").prop("checked", false);
        $(this).prop("checked", true);
        brand = $(this).val();
        delayLoad();
    });
    $(".checkItem-2").on("click", "input", function(e) {
        $(".checkItem-2 input").prop("checked", false);
        $(this).prop("checked", true);
        cost = $(this).val();
        delayLoad();
    });
    $(".checkItem-3").on("click", "input", function(e) {
        $(".checkItem-3 input").prop("checked", false);
        $(this).prop("checked", true);
        cpu = $(this).val();
        delayLoad();
        // console.log(cpu);
    });
    $(".checkItem-4").on("click", "input", function(e) {
        $(".checkItem-4 input").prop("checked", false);
        $(this).prop("checked", true);
        ram = $(this).val();
        delayLoad();
    });
    $(".checkItem-5").on("click", "input", function(e) {
        $(".checkItem-5 input").prop("checked", false);
        $(this).prop("checked", true);
        storage = $(this).val();
        delayLoad();
    });
    $(".checkItem-6").on("click", "input", function(e) {
        $(".checkItem-6 input").prop("checked", false);
        $(this).prop("checked", true);
        loai = $(this).val();
        delayLoad();
        // console.log(cpu);
    });
</script>