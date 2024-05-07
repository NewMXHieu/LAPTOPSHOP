// Open modal add product
let btnAddPhieuNhap = document.getElementById("addNewPhieuNhap");
btnAddPhieuNhap.addEventListener('click', () =>{
    document.querySelector(".addphieunhap").classList.add("open");
    setDefaultValuePhieuNhap();
})

function editPhieuNhap(id){
    let index = phieunhaps.findIndex(item =>{
        return item.MAPN == id
    })
    document.getElementById("editphieunhap_idphieunhap").value = phieunhaps[index].MAPN;
    document.querySelector(".editphieunhap").classList.add("open");
    document.getElementById("detailphieunhap_tennhanvien").value = phieunhaps[index].MANV;
    document.getElementById("detailphieunhap_ngaynhap").value = phieunhaps[index].NGAYNHAP;
    document.getElementById("detailphieunhap_tongtien").value = phieunhaps[index].TONGTIEN;
    document.getElementById("detailphieunhap_TrangThai").value = phieunhaps[index].TRANGTHAI;
    getDataSPNhap(phieunhaps[index].MAPN);
}

function setDefaultValuePhieuNhap(){

}

function checkDate(){
    let currentDate = new Date();
    currentDate.setDate(currentDate.getDate() + 1);
    let datecheck = new Date(document.getElementById("detailphieunhap_ngaynhap").value);
    if(datecheck > currentDate){
        alert("Vui lòng chọn ngày từ sau ngày " + currentDate.toISOString().slice(0, 10));
        document.getElementById("detailphieunhap_ngaynhap").value = '';
        return;
    }
}

function getDataSPNhap(id){
    let index = phieunhaps.findIndex(item =>{
        return item.MAPN == id
    })
    let spNhaps = [];
    $.ajax({
        url: 'api/admin/LayDsSanPhamPhieuNhap.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: { idProduct: phieunhaps[index].MAPN,
        },
        success: function(data) {
            spNhaps = JSON.parse(data);
            showArraySanPhamNhap(spNhaps);
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}

function showArraySanPhamNhap(arr) {
    let productHtml = "";
    if (arr.length === 0) {
        productHtml = `<tr >
        <td colspan="3">Không có dữ liệu !!!</td>
    </tr>`
    } else {
        productHtml = "";
        arr.forEach(product => {
            productHtml +=
                `<tr>
                <td>${product.MASP}</td>
                <td>${product.MANCC}</td>
                <td>${product.SOLUONG}</td>
            </tr>`;
    
        });
    }
    document.getElementById("dataSanPhamNhap").innerHTML = productHtml;
}

function getDataSPCodeNhap(){
    let mancc = document.getElementById("detail_nhaphang_nhacungcap_select").value;
    
    let spNhaps = [];
    $.ajax({
        url: 'api/admin/LayDsSanPhamCoTheNhap.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: { idProduct: mancc,
        },
        success: function(data) {
            spNhaps = JSON.parse(data);
            showArraySanPhamCoTheNhap(spNhaps);
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}

function showArraySanPhamCoTheNhap(arr) {
    let productHtml = "";
    if (arr.length === 0) {
        productHtml = `<tr >
        <td colspan="4">Không có dữ liệu !!!</td>
    </tr>`
    } else {
        productHtml = "";
        arr.forEach(product => {
            productHtml +=
                `<tr>
                    <td>${product.MASP}</td>
                    <td>${product.TENSP}</td>
                    <td>${product.MANCC}</td>
                    <td><input type="number" id="soluong_${product.MASP}" name="soluong_${product.MASP}" value='0' min='0'</td>
                    <td><input type="checkbox" id="${product.MASP}" name="listSpNhap[]" value='${product.MASP}'></td>
            </tr>`;
    
        });
    }
    document.getElementById("dataSpAddPhieuNhap").innerHTML = productHtml;
}

    
function savephieunhap(){
    let listIdSPSelected = [];
    // Lặp qua các checkbox để lấy loại sản phẩm được chọn
    document.querySelectorAll('input[name="listSpNhap[]"]:checked').forEach(function(checkbox) {
        let masp = checkbox.value;
        let soluong = document.getElementById("soluong_" + masp).value;

        // Kiểm tra nếu số lượng nhập vào là không hợp lệ
        if (soluong < 1) {
            console.log("Vui lòng nhập số lượng cho sản phẩm có mã " + masp + " trước khi nhập hàng");
            alert("Vui lòng nhập số lượng cho sản phẩm có mã " + masp + " trước khi nhập hàng");
            return;
        }

        // Tạo một đối tượng mới với cấu trúc {masp: maspvalue, soluong: soluongvalue}
        let obj = { MASP: masp, SOLUONG: soluong };

        // Thêm đối tượng vào mảng listIdSPSelected
        listIdSPSelected.push(obj);
    });
    if(document.getElementById("addphieunhap_manv").value === ''){
        alert("Vui lòng nhập mã nhân viên !!!");
    } else{
        let tongtien = 0;
        let currentDate = new Date();
        let ngaynhap = currentDate.toISOString().slice(0, 10);
        let trangthai = 0;
        let mancc = document.getElementById("detail_nhaphang_nhacungcap_select").value;
        let manv = document.getElementById("addphieunhap_manv").value;

        $.ajax({
        url: 'api/admin/savePhieuNhap.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: {
            MANV: manv,
            NGAYNHAP: ngaynhap,
            TONGTIEN: tongtien,
            MANCC: mancc,
            LISTSP: listIdSPSelected,
            TRANGTHAI: trangthai,
        },
            success: function(data) {
            console.log(data);
            getDsPhieuNhap();
            showPhieuNhap();
            finish();
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
    }
}

function saveEditphieunhap(){
    let listIdSPSelected = [];
    // Lặp qua các checkbox để lấy loại sản phẩm được chọn
    document.querySelectorAll('input[name="listSpNhap[]"]:checked').forEach(function(checkbox) {
        let masp = checkbox.value;
        let soluong = document.getElementById("soluong_" + masp).value;

        // Kiểm tra nếu số lượng nhập vào là không hợp lệ
        if (soluong < 1) {
            console.log("Vui lòng nhập số lượng cho sản phẩm có mã " + masp + " trước khi nhập hàng");
            alert("Vui lòng nhập số lượng cho sản phẩm có mã " + masp + " trước khi nhập hàng");
            return;
        }

        // Tạo một đối tượng mới với cấu trúc {masp: maspvalue, soluong: soluongvalue}
        let obj = { MASP: masp, SOLUONG: soluong };

        // Thêm đối tượng vào mảng listIdSPSelected
        listIdSPSelected.push(obj);
    });
    
    let mapn = document.getElementById("editphieunhap_idphieunhap").value;
        let manv = document.getElementById("detailphieunhap_tennhanvien").value;
        let mancc = document.getElementById("detail_nhaphang_nhacungcap_select").value;
        let tongtien = document.getElementById("detailphieunhap_tongtien").value;
        let ngaynhap = document.getElementById("detailphieunhap_ngaynhap").value;
        let trangthai = document.getElementById("detailphieunhap_TrangThai").value;

        $.ajax({
        url: 'api/admin/saveEditPhieuNhap.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: {
            MAPN: mapn,
            MANV: manv,
            NGAYNHAP: ngaynhap,
            TONGTIEN: tongtien,
            MANCC: mancc,
            LISTSP: listIdSPSelected,
            TRANGTHAI: trangthai,
        },
            success: function(data) {
            console.log(data);
            alert("Lưu thông tin thay đổi thành công");
            getDsPhieuNhap();
            showPhieuNhap();
            finish();
        },
        error: function(xhr, status, error) {
            alert("Lưu thông tin thay đổi thất bại");
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}


