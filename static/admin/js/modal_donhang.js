

function editDonHang(id) {
    let index = donhangs.findIndex(item => {
        return item.MAHD == id
    })
    indexNV = index;
    document.getElementById("idDonHang").value = donhangs[index].MAHD;
    document.querySelector(".chitiethoadon").classList.add("open");
    document.getElementById("detailDonHang_tenkhachhang").value = donhangs[index].MAKH + ' - ' + donhangs[index].TENKH;
    document.getElementById("detailDonHang_tennhanvien").value = donhangs[index].MANV + ' - ' + donhangs[index].TENNV;
    document.getElementById("detailDonhang_ngay").value = donhangs[index].NGAYTAO;
    document.getElementById("detailDonHang_TrangThai").value = donhangs[index].TRANGTHAI;
    getShipperAndSetDropdown(id, donhangs[index].MASHIPPER);
    layDsSP(donhangs[index].MAHD);


}
function getShipperAndSetDropdown(id, mashipper) {
    $.ajax({
        url: 'api/admin/getShipper.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var html = '<option value="0" selected>Chưa chọn</option>';
            data.forEach(function(shipper) {
                // Tạo option cho từng shipper
                html += '<option value="' + shipper.MASHIPPER + '"';
                // Thiết lập thuộc tính selected nếu MASHIPPER trùng khớp với mashipper được truyền vào
                if (shipper.MASHIPPER == mashipper) {
                    html += ' selected';
                }
                html += '>' + shipper.MASHIPPER + ' - ' + shipper.TEN + '</option>';
            });
            // Gán các option đã tạo vào select dropdown
            $('#detailDonHang_shipper').html(html);
        },
        error: function (xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}
// Thêm sự kiện lắng nghe vào dropdown của SHIPPER
document.getElementById('detailDonHang_shipper').addEventListener('change', function() {
    var selectedValue = this.value; // Lấy giá trị đã chọn trong dropdown
    if (selectedValue === '0') { // Nếu đã chọn lại option "Chưa chọn"
        // Gửi request AJAX để cập nhật MASHIPPER thành NULL
        $.ajax({
            url: 'api/admin/updateShipper.php', // Đường dẫn đến trang xử lý cập nhật
            type: 'POST', // Phương thức POST
            data: { idDonHang: document.getElementById('idDonHang').value }, // Gửi ID đơn hàng cần cập nhật
            success: function(response) {
                console.log('Giá trị của MASHIPPER đã được cập nhật thành NULL');
            },
            error: function(xhr, status, error) {
                console.error('Lỗi khi gửi yêu cầu đến trang xử lý:', error);
            }
        });
    }
});


function layDsSP(mahd) {
    var dsSP = [];
    $.ajax({
        url: 'api/admin/layDsSanPhamDonHang.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        dataType: 'json',
        data: { idProduct: mahd }, // Dữ liệu gửi đi (id sản phẩm)
        success: function (data) {
            data.forEach(item => {
                dsSP.push(item);
            })
            var html = '';
            console.log(data);
            dsSP.forEach((item) => {
                html += `<div class="detail-giohang-list-data-item">
                    <div>${item.MASP}</div>
                    <div>${item.SOLUONG}</div>
                    <div>${item.GIATIEN}</div>
                </div>`;
            })
            document.getElementById("detail-giohang-list-data").innerHTML = html;
        },
        error: function (xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}

function saveEditDonHang() {
    maDonHang = document.getElementById("idDonHang").value;
    trangThai = document.getElementById("detailDonHang_TrangThai").value;
    shipper = document.getElementById("detailDonHang_shipper").value;
    // khachhang = document.getElementById("detailDonHang_makhachhang").value;
    // nhanvien = document.getElementById("detailDonHang_manhanvien").value;
    // ngaytao = document.getElementById("detailDonhang_ngay").value;

    $.ajax({
        url: 'api/admin/updateTrangThaiDonHang.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: {
            idDonHang: maDonHang,
            trangthai: trangThai,
            shipper: shipper
        }, // Dữ liệu gửi đi (id sản phẩm)
        success: function (data) {
            getDsDonHang();
            showDonHang();
            finish();
        },
        error: function (xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}

function finish() {
    for (let i = 0; i < modalOpen.length; i++) {
        modalOpen[i].classList.remove("open");
    }
}
function deleteDonHang(id) {
    let index = donhangs.findIndex(item => {
        return item.MAHD == id
    })
    if (confirm("Xóa hóa đơn " + donhangs[index].MAHD + " ?")) {
        deleteStatusDonHang(donhangs[index].MAHD);
        getDsDonHang();
        showDonHang();
        // resetDataAmountProduct();
        alert("Đã Xóa hóa đơn " + donhangs[index].MAHD + " thành công");
    }
}
function deleteStatusDonHang(id) {
    $.ajax({
        url: 'src/admin/functions/deleteDonHang.php',
        type: 'POST',
        data: { idDonHang: id },
        success: function(response) {
            // Handle the response from the server
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle any errors
            console.error(textStatus, errorThrown);
        }
    });
}