// Open modal add product
let btnAddKhachHang = document.getElementById("addNewKhachHang");
btnAddKhachHang.addEventListener('click', () =>{
    document.querySelector(".AddKhachHang").classList.add("open");
    setDefaultValueProduct();
})

function editKhachHang(id){
    let index = khachhangs.findIndex(item =>{
        return item.MAKH == id
    })
    indexNV = index;
    document.getElementById("idKhachHang").value = khachhangs[index].MAKH;
    document.querySelector(".editKhachHang").classList.add("open");
    document.getElementById("editKhachHang_ten").value = khachhangs[index].TEN;
    document.getElementById("editKhachHang_ngaysinh").value = khachhangs[index].NGAYSINH;
    document.getElementById("editKhachHang_sdt").value = khachhangs[index].SDT;
    document.getElementById("editKhachHang_diachi").value = khachhangs[index].DIACHI;
    document.getElementById("editKhachHang_taikhoan").value = khachhangs[index].MATK;
    document.getElementById("editKhachHang_email").value = khachhangs[index].EMAIL;
    document.getElementById("editKhachHang_tendangnhap").value = khachhangs[index].TENDN;
    document.getElementById("editKhachHang_matkhau").value = khachhangs[index].MATKHAU;
}

function saveEditKhachHang(){
    makh = document.getElementById("idKhachHang").value;
    ten = document.getElementById("editKhachHang_ten").value;
    ngaysinh = document.getElementById("editKhachHang_ngaysinh").value;
    sdt = document.getElementById("editKhachHang_sdt").value;
    matk = document.getElementById("editKhachHang_taikhoan").value;
    diachi = document.getElementById("editKhachHang_diachi").value;
    email = document.getElementById("editKhachHang_email").value;
    ngaytaotk = document.getElementById("editKhachHang_ngaytaotk").value;
    tendn = document.getElementById("editKhachHang_tendangnhap").value;
    matkhau = document.getElementById("editKhachHang_matkhau").value;
    trangThai = document.getElementById("editKhachHang_trangthai").value;

    $.ajax({
        url: 'api/admin/saveEditKhachHang.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: {MAKH: makh,
            TEN: ten,
            NGAYSINH: ngaysinh,
            SDT: sdt,
            MATK: matk,
            DIACHI: diachi,
            EMAIL: email,
            NGAYTAOTK: ngaytaotk,
            TENDN: tendn,
            MATKHAU: matkhau,
            TRANGTHAI: trangThai},
        success: function(data) {
            getDsKhachHang();
            showKhachHang();
            finish();
            alert("Đã thay đổi thông tin khách hàng");
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}

function saveKhachHang(){
    ten = document.getElementById("addKhachHang_ten").value;
    ngaysinh = document.getElementById("addKhachHang_ngaysinh").value;
    sdt = document.getElementById("addKhachHang_sdt").value;
    matk = document.getElementById("addKhachHang_taikhoan").value;
    diachi = document.getElementById("addKhachHang_diachi").value;
    email = document.getElementById("addKhachHang_email").value;
    ngaytaotk = document.getElementById("addKhachHang_ngaytaotk").value;
    tendn = document.getElementById("addKhachHang_tendangnhap").value;
    matkhau = document.getElementById("addKhachHang_matkhau").value;
    $.ajax({
        url: 'api/admin/saveKhachHang.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: {
            TEN: ten,
            NGAYSINH: ngaysinh,
            SDT: sdt,
            MATK: matk,
            DIACHI: diachi,
            EMAIL: email,
            NGAYTAOTK: ngaytaotk,
            TENDN: tendn,
            MATKHAU: matkhau,
            },
        success: function(data) {
            getDsKhachHang();
            showKhachHang();
            alert(data);
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}
function changeStatusTKKHOff(id){
    getDsKhachHang();
    let index = khachhangs.findIndex((item) => {
        return item.MAKH == id;
    })
    if(confirm("Xóa khách hàng "+ khachhangs[index].TEN +" ?")){
        updateStatusTaiKhoanKH(khachhangs[index].MAKH,0);
        alert("Đã Xóa khách hàng " + khachhangs[index].TEN +" thành công");
    }
}

function changeStatusTKKHOn(id){
    getDsKhachHang();
    let index = khachhangs.findIndex((item) => {
        return item.MAKH == id;
    })
    if(confirm("Khôi phục khách hàng "+ khachhangs[index].TEN +" ?")){
        updateStatusTaiKhoanKH(khachhangs[index].MAKH,1);
        // resetDataAmountProduct();
        alert("Đã khôi phục khách hàng " + khachhangs[index].TEN +" thành công");
    }
}

function updateStatusTaiKhoanKH(id, status) {
    $.ajax({
        url: 'api/admin/updateTrangThaiTaiKhoanKhachHang.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: { idProduct: id,
            TrangThai: status
        },
        success: function(data) {
            getDsKhachHang();
            showKhachHang();
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