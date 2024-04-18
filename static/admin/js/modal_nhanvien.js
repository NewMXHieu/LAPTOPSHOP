// Open modal add product
let btnAddNhanVien = document.getElementById("addNewNhanVien");
btnAddNhanVien.addEventListener('click', () =>{
    document.querySelector(".AddNhanVien").classList.add("open");
    setDefaultValueProduct();
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

function layMaNhomQuyen(chucvu){
    if(chucvu === "ADMIN")
        return 'AD';
    else if (chucvu === "QUẢN LÝ")
        return 'QL';
    else if (chucvu === "THU NGÂN")
        return 'TN';
    else if (chucvu === "KHO")
        return 'KHO';
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

    var today = new Date();
    
    // Định dạng ngày thành chuỗi YYYY-MM-DD để sử dụng trong trường input type date
    var formattedDate = today.toISOString().substr(0, 10);

    document.getElementById("addNhanVien_ngaytaotk").value = formattedDate;
    document.getElementById("addNhanVien_trangthai").value = 1;
}


function changeStatusTKNVOff(id){
    getDsNhanVien();
    let index = nhanviens.findIndex((item) => {
        return item.MANV == id;
    })
    if(confirm("Xóa nhân viên "+ nhanviens[index].TEN +" ?")){
        updateStatusTaiKhoanNV(nhanviens[index].MANV,0);
        getDsNhanVien();
        showNhanVien();
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
        getDsNhanVien();
        showNhanVien();
        // resetDataAmountProduct();
        alert("Đã khôi phục nhân viên " + nhanviens[index].TEN +" thành công");
    }
}

function updateStatusTaiKhoanNV(id, status) {
    // Tạo một đối tượng XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Xác định phương thức và URL của yêu cầu
    var url = "api/admin/updateTrangThaiTaiKhoanNhanVien.php";
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