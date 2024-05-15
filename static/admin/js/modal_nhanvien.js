// Open modal add product
let btnAddNhanVien = document.getElementById("addNewNhanVien");
btnAddNhanVien.addEventListener('click', () =>{
    document.getElementById("addNhanVien_matk").value = nhanviens.length+1;
    document.querySelector(".AddNhanVien").classList.add("open");
    getDsTaiKhoanAndSetDropdownAdd();
})
var indexNV;

function editNhanVien(id){
    let index = nhanviens.findIndex(item =>{
        return item.MANV == id
    })
    indexNV = index;
    document.getElementById("idNhanVien").value = nhanviens[index].MANV;
    document.querySelector(".editNhanVien").classList.add("open");
    document.getElementById("editNhanVien_ten").value = nhanviens[index].TEN;
    document.getElementById("editNhanVien_ngaysinh").value = nhanviens[index].NGAYSINH;
    document.getElementById("editNhanVien_sdt").value = nhanviens[index].SDT;
    document.getElementById("editNhanVien_diachi").value = nhanviens[index].DIACHI;
    getDsTaiKhoanAndSetDropdown(nhanviens[index].MATK);
    document.getElementById("editNhanVien_email").value = nhanviens[index].EMAIL;
}
function getDsTaiKhoanAndSetDropdown(maTaiKhoan) {
    $.ajax({
        url: 'api/admin/getTaiKhoan.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var html = '<option value="0" selected>Chưa chọn</option>';
            data.forEach(function(taikhoan) {
                if (taikhoan.MANHOMQUYEN != 5) {
                    html += '<option value="' + taikhoan.MATK + '"';
                    if (taikhoan.MATK == maTaiKhoan) {
                        html += ' selected';
                    }
                    html += '>' + taikhoan.MATK + ' - ' + taikhoan.TENDN + '</option>';
                }
            });
            $('#editNhanVien_taiKhoan').html(html);
        },
        error: function(xhr, status, error) {
            console.error('Error sending request to PHP:', error);
        }
    });
}

function getDsTaiKhoanAndSetDropdownAdd() {
    $.ajax({
        url: 'api/admin/getTaiKhoan.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var html = '<option value="0" selected>Chưa chọn</option>';
            data.forEach(function(taikhoan) {
                if (taikhoan.MANHOMQUYEN != 5) {
                    html += '<option value="' + taikhoan.MATK + '">' + taikhoan.MATK + ' - ' + taikhoan.TENDN + '</option>';
                }
            });
            $('#addNhanVien_taiKhoan').html(html);
        },
        error: function(xhr, status, error) {
            console.error('Error sending request to PHP:', error);
        }
    });
}


function saveNhanVien(){
    manv = document.getElementById("addNhanVien_matk").value;
    ten = document.getElementById("addNhanVien_ten").value;
    ngaysinh = document.getElementById("addNhanVien_ngaysinh").value;
    sdt = document.getElementById("addNhanVien_sdt").value;
    matk = document.getElementById("addNhanVien_taiKhoan").value;
    diachi = document.getElementById("addNhanVien_diachi").value;
    email = document.getElementById("addNhanVien_email").value;
    ngaytaotk = document.getElementById("addNhanVien_ngaytaotk").value;
    chucvu = document.getElementById("addNhanVien_select_loaitk").value;
    if (ten == "" || ngaysinh == "" || sdt == "" || matk == "" || diachi == "" || email == "" || ngaysinh== "") {
        alert("Vui lòng nhập đầy đủ thông tin");
        return;
    }
    //check email regex pattern
    let emailPattern = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/;
    if (!emailPattern.test(email)) {
        alert("Email không hợp lệ");
        return;
    }
    // check phone number regex pattern
    let phonePattern = /^0[0-9]{9}$/;
    if (!phonePattern.test(sdt)) {
        alert("Số điện thoại không hợp lệ");
        return;
    }
    
        $.ajax({
        url: 'api/admin/saveNhanVien.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: {
            MANV: manv,
            TEN: ten,
            NGAYSINH: ngaysinh,
            SDT: sdt,
            MATK: matk,
            DIACHI: diachi,
            EMAIL: email,
            NGAYTAOTK: ngaytaotk,
            CHUCVU: chucvu,
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
    matk = document.getElementById("editNhanVien_taiKhoan").value;
    diachi = document.getElementById("editNhanVien_diachi").value;
    email = document.getElementById("editNhanVien_email").value;
    ngaytaotk = document.getElementById("editNhanVien_ngaytaotk").value;
    trangThai = document.getElementById("editNhanVien_trangthai").value;
    quyentk = document.getElementById("editNhanVien_select_loaitk").value;

    if (ten == "" || ngaysinh == "" || sdt == "" || matk == "" || diachi == "" || email == "" || ngaysinh== "") {
        alert("Vui lòng nhập đầy đủ thông tin");
        return;
    }
    //check email regex pattern
    let emailPattern = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/;
    if (!emailPattern.test(email)) {
        alert("Email không hợp lệ");
        return;
    }
    // check phone number regex pattern
    let phonePattern = /^0[0-9]{9}$/;
    if (!phonePattern.test(sdt)) {
        alert("Số điện thoại không hợp lệ");
        return;
    }
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