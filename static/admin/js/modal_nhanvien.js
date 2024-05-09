// Open modal add product
let btnAddNhanVien = document.getElementById("addNewNhanVien");
btnAddNhanVien.addEventListener('click', () =>{
    document.querySelector(".AddNhanVien").classList.add("open");
})
var indexNV;

function layQuyenNV(id){

    $.ajax({
        url: 'api/admin/layQuyenTK.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        dataType: 'json',
        data: { idNhanVien: id }, // Dữ liệu gửi đi (id sản phẩm)
        success: function(data) {
            var quyen = document.getElementById("editNhanVien_select_loaitk");
            quyen.value = data[0].MANHOMQUYEN;
            
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}


function editNhanVien(id){
    let index = nhanviens.findIndex(item =>{
        return item.MANV == id
    })
    indexNV = index;
    document.getElementById("idNhanVien").value = nhanviens[index].MANV;
    document.querySelector(".editNhanVien").classList.add("open");
    layQuyenNV(nhanviens[index].MANV);
    document.getElementById("editNhanVien_ten").value = nhanviens[index].TEN;
    document.getElementById("editNhanVien_ngaysinh").value = nhanviens[index].NGAYSINH;
    document.getElementById("editNhanVien_sdt").value = nhanviens[index].SDT;
    document.getElementById("editNhanVien_diachi").value = nhanviens[index].DIACHI;
    document.getElementById("editNhanVien_taikhoan").value = nhanviens[index].MATK;
    document.getElementById("editNhanVien_email").value = nhanviens[index].EMAIL;
    document.getElementById("editNhanVien_tendangnhap").value = nhanviens[index].TENDN;
    document.getElementById("editNhanVien_matkhau").value = nhanviens[index].MATKHAU;
}

function saveNhanVien(){
    ten = document.getElementById("addNhanVien_ten").value;
    ngaysinh = document.getElementById("addNhanVien_ngaysinh").value;
    sdt = document.getElementById("addNhanVien_sdt").value;
    matk = document.getElementById("addNhanVien_taikhoan").value;
    diachi = document.getElementById("addNhanVien_diachi").value;
    email = document.getElementById("addNhanVien_email").value;
    ngaytaotk = document.getElementById("addNhanVien_ngaytaotk").value;
    tendn = document.getElementById("addNhanVien_tendangnhap").value;
    matkhau = document.getElementById("addNhanVien_matkhau").value;
    chucvu = document.getElementById("addNhanVien_select_loaitk").value;
        $.ajax({
        url: 'api/admin/saveNhanVien.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: {
            TEN: ten,
            NGAYSINH: ngaysinh,
            SDT: sdt,
            MATK: matk,
            DIACHI: diachi,
            EMAIL: email,
            NGAYTAOTK: ngaytaotk,
            CHUCVU: chucvu,
            TENDN: tendn,
            MATKHAU: matkhau,
            },
        success: function(data) {
            getDsNhanVien();
            showNhanVien();
            finish();
            alert("Đã thêm thông tin nhân viên " + ten );
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}

function changeStatusTKNVOff(id){
    getDsNhanVien();
    let index = nhanviens.findIndex((item) => {
        return item.MANV == id;
    })
    if(confirm("Xóa nhân viên "+ nhanviens[index].TEN +" ?")){
        updateStatusTaiKhoanNV(nhanviens[index].MANV,0);
        // resetDataAmountProduct();
        alert("Đã Xóa nhân viên " + nhanviens[index].TEN +" thành công");
    }
}

function changeStatusTKNVOn(id){
    getDsNhanVien();
    let index = nhanviens.findIndex((item) => {
        return item.MANV == id;
    })
    if(confirm("Khôi phục nhân viên "+ nhanviens[index].TEN +" ?")){
        updateStatusTaiKhoanNV(nhanviens[index].MANV,1);
        // resetDataAmountProduct();
        alert("Đã khôi phục nhân viên " + nhanviens[index].TEN +" thành công");
    }
}

function updateStatusTaiKhoanNV(id, status) {
    $.ajax({
        url: 'api/admin/updateTrangThaiTaiKhoanNhanVien.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: { idProduct: id,
            TrangThai: status
        },
        success: function(data) {
            getDsNhanVien();
            showNhanVien();
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

function saveEditNhanVien(){
    manv = document.getElementById("idNhanVien").value;
    ten = document.getElementById("editNhanVien_ten").value;
    ngaysinh = document.getElementById("editNhanVien_ngaysinh").value;
    sdt = document.getElementById("editNhanVien_sdt").value;
    matk = document.getElementById("editNhanVien_taikhoan").value;
    diachi = document.getElementById("editNhanVien_diachi").value;
    email = document.getElementById("editNhanVien_email").value;
    ngaytaotk = document.getElementById("editNhanVien_ngaytaotk").value;
    tendn = document.getElementById("editNhanVien_tendangnhap").value;
    matkhau = document.getElementById("editNhanVien_matkhau").value;
    trangThai = document.getElementById("editNhanVien_trangthai").value;
    quyentk = document.getElementById("editNhanVien_select_loaitk").value;

    $.ajax({
        url: 'api/admin/saveEditNhanVien.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: {MANV: manv,
            TEN: ten,
            NGAYSINH: ngaysinh,
            SDT: sdt,
            MATK: matk,
            DIACHI: diachi,
            EMAIL: email,
            NGAYTAOTK: ngaytaotk,
            TENDN: tendn,
            MATKHAU: matkhau,
            CHUCVU: quyentk,
            TRANGTHAI: trangThai},
        success: function(data) {
            getDsNhanVien();
            showNhanVien();
            finish();
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}