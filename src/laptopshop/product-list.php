<?php
include '../../config/connect.php';
?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script> -->
<div class="content top-trangchu">
    <div class="menu menu-left menu-left-2">
        <button id="resetBtn">Xóa bộ lọc</button>
        <div class="loc">
            <h3>Sắp xếp</h3>
            <div class="checkItems checkItem-7">
                <p><input type="checkbox" checked value="0"> Mặc định</p>
                <p><input type="checkbox" value="ASC"> Giá tăng dần</p>
                <p><input type="checkbox" value="DESC"> Giá giảm dần</p>
            </div>
        </div>
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

        <div class="loc">
            <h3>CPU</h3>
            <div class="checkItems checkItem-3">
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

        <div class="loc">
            <h3>Ổ cứng</h3>
            <div class="checkItems checkItem-5">
                <p><input type="checkbox" checked value="0"> Tất cả</p>
                <p><input type="checkbox" value="512"> SSD 512 GB</p>
                <p><input type="checkbox" value="256"> SSD 256 GB</p>
                <p><input type="checkbox" value="128"> SSD 128 GB</p>
            </div>
        </div>

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
    let cost = 0;
    let brand = 0;
    let cpu = 0;
    let ram = 0;
    let storage = 0;
    let loai = 0;
    let sapxep = 0;

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
                loai : loai,
                sapxep : sapxep
            },
            success: function(data) {
                if (data == null || data == '') {
                    $('.thongbao').html("KHÔNG CÓ SẢN PHẨM THEO YÊU CẦU!");
                    $('.main').empty();
                } else {
                    // $('.thongbao').empty();
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
                loai : loai,
                sapxep : sapxep

            },
            success: function(response) {
                response = JSON.parse(response);
                let data = response.page;
                let count = response.count;
                if (data < 1) {
                    $(".pagination").hide();
                } else {
                    $('.thongbao').html("Số sản phẩm hiện có: " + count);
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

    $(".list").on("click", "li a", function(e) {
        e.preventDefault();
        search = $(this).attr("href");
        $("#txtSearch").val(search);
        localStorage.setItem('searchValue', search);
        page = 1;
        delayLoad();
        $("#resetBtn").click();
        $('html, body').animate({
            scrollTop: $(".main").offset().top - 160 // Thay ".main" bằng selector của phần hiện sản phẩm của bạn
        }, 'slow');
    });
    $(".menu-left-1").on("click", "li a", function(e) {
        $(".list").on();
        $('.danhmuc').click();
    });
    $(".pagination ").on("click", "a", function(e) {
        e.preventDefault();
        $(".pagination a").removeClass("active");
        $(this).addClass("active");
        page = ($(this).text());
        readData(search);
    });
    $(".checkItem-1").on("click", "p", function(e) {
        $(".checkItem-1 input").prop("checked", false);
        $(this).find('input').prop("checked", true);
        brand = $(this).find('input').val();
        delayLoad();
    });
    $(".checkItem-2").on("click", "p", function(e) {
        $(".checkItem-2 input").prop("checked", false);
        $(this).find('input').prop("checked", true);
        cost = $(this).find('input').val();
        delayLoad();
    });
    $(".checkItem-3").on("click", "p", function(e) {
        $(".checkItem-3 input").prop("checked", false);
        $(this).find('input').prop("checked", true);
        cpu = $(this).find('input').val();
        delayLoad();
    });
    $(".checkItem-4").on("click", "p", function(e) {
        $(".checkItem-4 input").prop("checked", false);
        $(this).find('input').prop("checked", true);
        ram = $(this).find('input').val();
        delayLoad();
    });
    $(".checkItem-5").on("click", "p", function(e) {
        $(".checkItem-5 input").prop("checked", false);
        $(this).find('input').prop("checked", true);
        storage = $(this).find('input').val();
        delayLoad();
    });
    $(".checkItem-6").on("click", "p", function(e) {
        $(".checkItem-6 input").prop("checked", false);
        $(this).find('input').prop("checked", true);
        loai = $(this).find('input').val();
        delayLoad();
    });
    $(".checkItem-7").on("click", "p", function(e) {
        $(".checkItem-7 input").prop("checked", false);
        $(this).find('input').prop("checked", true);
        sapxep = $(this).find('input').val();
        delayLoad();
    });
    $("#resetBtn").click(function() {
        $(".checkItems input[type='checkbox']").each(function() {
            if ($(this).val() !== "0") {
                $(this).prop("checked", false);
            } else {
                $(this).prop("checked", true);
            }
        });
        cost = 0;
        brand = 0;
        cpu = 0;
        ram = 0;
        storage = 0;
        loai = 0;
        sapxep = 0;
        delayLoad();
    })
</script>