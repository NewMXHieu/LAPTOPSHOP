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

    var today = new Date();
    
    // Định dạng ngày thành chuỗi YYYY-MM-DD để sử dụng trong trường input type date
    var formattedDate = today.toISOString().substr(0, 10);

    document.getElementById("addKhachHang_ngaytaotk").value = formattedDate;
    document.getElementById("addKhachHang_trangthai").value = 1;
}


function changeStatusTKKHOff(id){
    getDsKhachHang();
    let index = khachhangs.findIndex((item) => {
        return item.MAKH == id;
    })
    if(confirm("Xóa khách hàng "+ khachhangs[index].TEN +" ?")){
        updateStatusTaiKhoanKH(khachhangs[index].MAKH,0);
        getDsKhachHang();
        showKhachHang();
        // resetDataAmountProduct();
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
        getDsKhachHang();
        showKhachHang();
        // resetDataAmountProduct();
        alert("Đã khôi phục khách hàng " + khachhangs[index].TEN +" thành công");
    }
}

function updateStatusTaiKhoanKH(id, status) {
    // Tạo một đối tượng XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Xác định phương thức và URL của yêu cầu
    var url = "api/admin/updateTrangThaiTaiKhoanKhachHang.php";
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