
function editDonHang(id){
    let index = donhangs.findIndex(item =>{
        return item.MAHD == id
    })
    indexNV = index;
    document.getElementById("idDonHang").value = donhangs[index].MAKH;
    document.querySelector(".chitiethoadon").classList.add("open");
    document.getElementById("detailDonHang_tenkhachhang").value = donhangs[index].TENKH;
    document.getElementById("detailDonHang_tennhanvien").value = donhangs[index].TENNV;
    document.getElementById("detailDonHang_ngay").value = donhangs[index].NGAYTAO;
    document.getElementById("detailDonHang_giohang").value = donhangs[index].MAGH;
    document.getElementById("editDonHang_trangthai").value = donhangs[index].TRANGTHAI;
    layDsSP(donhangs[index].MAGH);
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

function changeStatusTKDonHangOff(id){
    getDsDonHang();
    let index = donhangs.findIndex((item) => {
        return item.MAKH == id;
    })
    if(confirm("đổi trạng thái hóa đơn "+ donhangs[index].MAHD +" ?")){
        updateStatusDonHang(donhangs[index].MAKH,0);
        getDsDonHang();
        showDonHang();
        // resetDataAmountProduct();
        alert("Đã đổi trạng thái hóa đơn " + donhangs[index].MAHD +" thành công");
    }
}

function changeStatusTKDonHangOn(id){
    getDsDonHang();
    let index = donhangs.findIndex((item) => {
        return item.MAHD == id;
    })
    if(confirm("đổi trạng thái hóa đơn "+ donhangs[index].MAHD +" ?")){
        updateStatusDonHang(donhangs[index].MAHD,1);
        getDsDonHang();
        showDonHang();
        // resetDataAmountProduct();
        alert("Đã đổi trạng thái hóa đơn " + donhangs[index].MAHD +" thành công");
    }
}

function updateStatusDonHang(id, status) {
    // Tạo một đối tượng XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Xác định phương thức và URL của yêu cầu
    var url = "api/admin/updateTrangThaiDonHang.php";
    var method = "POST";

    // Chuẩn bị dữ liệu để gửi
    var data = {
        idProduct: id,
        TrangThai: status
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