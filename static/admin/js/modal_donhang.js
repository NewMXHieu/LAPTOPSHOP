
function editDonHang(id){
    let index = donhangs.findIndex(item =>{
        return item.MAHD == id
    })
    indexNV = index;
    document.getElementById("idDonHang").value = donhangs[index].MAHD;
    document.querySelector(".chitiethoadon").classList.add("open");
    document.getElementById("detailDonHang_makhachhang").value = donhangs[index].MAKH;
    document.getElementById("detailDonHang_manhanvien").value = donhangs[index].MANV;
    document.getElementById("detailDonhang_ngay").value = donhangs[index].NGAYTAO;
    document.getElementById("detailDonHang_TrangThai").value = donhangs[index].TRANGTHAI;
    layDsSP(donhangs[index].MAHD);
}

function layDsSP(mahd){
    var dsSP = [];
        $.ajax({
            url: 'api/admin/layDsSanPhamDonHang.php', // Đường dẫn đến trang PHP
            type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
            dataType: 'json',
            data: { idProduct: mahd }, // Dữ liệu gửi đi (id sản phẩm)
            success: function(data) {
                data.forEach(item=>{
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
            error: function(xhr, status, error) {
                console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
            }
        });
}

function saveEditDonHang(){
    maDonHang = document.getElementById("idDonHang").value;
    trangThai = document.getElementById("detailDonHang_TrangThai").value;
    // khachhang = document.getElementById("detailDonHang_makhachhang").value;
    // nhanvien = document.getElementById("detailDonHang_manhanvien").value;
    // ngaytao = document.getElementById("detailDonhang_ngay").value;

    $.ajax({
        url: 'api/admin/updateTrangThaiDonHang.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: {idDonHang: maDonHang,
             trangthai: trangThai}, // Dữ liệu gửi đi (id sản phẩm)
        success: function(data) {
            getDsDonHang();
            showDonHang();
            finish();
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}

function finish(){
    for(let i = 0 ; i < modalOpen.length ; i++){
        modalOpen[i].classList.remove("open");
    }
}
function deleteDonHang(id){
    let index = donhangs.findIndex(item =>{
        return item.MAHD == id
    })
    if(confirm("Xóa hóa đơn "+ donhangs[index].MAHD +" ?")){
        deleteStatusDonHang(donhangs[index].MAHD);
        getDsDonHang();
        showDonHang();
        // resetDataAmountProduct();
        alert("Đã Xóa hóa đơn " + donhangs[index].MAHD +" thành công");
    }
}
function deleteStatusDonHang(id) {
    // Tạo một đối tượng XMLHttpRequest
    var xhr = new XMLHttpRequest();
    // Xác định phương thức và URL của yêu cầu
    var url = "api/admin/deleteDonHang.php";
    var method = "POST";
    // Chuẩn bị dữ liệu để gửi
    var data = {
        idProduct: id
    };
    // Mở kết nối
    xhr.open(method, url, true);
    // Thiết lập tiêu đề yêu cầu nếu cần
    xhr.setRequestHeader("Content-Type", "application/json"); // Sử dụng application/json vì chúng ta đang gửi dữ liệu dưới dạng JSON
    // Xử lý sự kiện khi yêu cầu hoàn thành
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Xử lý kết quả từ PHP
            console.log(xhr.responseText);
        }
    };
    // Gửi yêu cầu với dữ liệu, chuyển đổi đối tượng JavaScript thành chuỗi JSON trước khi gửi
    xhr.send(JSON.stringify(data));
}