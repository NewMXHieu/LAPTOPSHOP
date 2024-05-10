//open modal taikhoan
let btnAddTaiKhoan = document.getElementById("addNewTaiKhoan");
btnAddTaiKhoan.addEventListener('click', () => {
    document.getElementById("addTaiKhoan_id").value = taikhoans.length + 1;
    document.getElementById("addTaiKhoan_ngaytao").value = new Date().toISOString().slice(0, 10);
    document.getElementById("addTaiKhoan_ten").value = "";
    document.getElementById("addTaiKhoan_matkhau").value = "";
    document.querySelector(".addTaiKhoan").classList.add("open");
    getNhomQuyenAndSetDropdownAdd();
})
let indexTK;
function editTaiKhoan(id) {
    let index = taikhoans.findIndex(item => {
        return item.MATK == id
    })
    indexTK = index;
    document.querySelector(".editTaiKhoan").classList.add("open");
    document.getElementById("editTaiKhoan_id").value = taikhoans[index].MATK;
    document.getElementById("editTaiKhoan_ten").value = taikhoans[index].TENDN;
    document.getElementById("editTaiKhoan_matkhau").value = taikhoans[index].MATKHAU;
    document.getElementById("editTaiKhoan_ngaytao").value = taikhoans[index].NGAYTAO;
    getNhomQuyenAndSetDropdown(taikhoans[index].MATK, taikhoans[index].MANHOMQUYEN);
    document.getElementById("editTaiKhoan_select_trangthai").value = taikhoans[index].TRANGTHAI;
}

function getNhomQuyenAndSetDropdown(id, manhomquyen) {
    $.ajax({
        url: 'api/admin/getDsPhanQuyen.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var html = '<option value="0" selected>Chưa chọn</option>';
            data.forEach(function (nhomquyen) {
                // Tạo option cho từng nhóm quyền
                html += '<option value="' + nhomquyen.MANHOMQUYEN + '"';
                // Thiết lập thuộc tính selected nếu MANHOMQUYEN trùng khớp với MANHOMQUYEN được truyền vào
                if (nhomquyen.MANHOMQUYEN == manhomquyen) {
                    html += ' selected';
                }
                html += '>' + nhomquyen.TENNHOMQUYEN + '</option>';
            });
            // Gán các option đã tạo vào select dropdown
            $('#editTaiKhoan_select_loainhomquyen').html(html);
        },
        error: function (xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}
function getNhomQuyenAndSetDropdownAdd() {
    $.ajax({
        url: 'api/admin/getDsPhanQuyen.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var html = '<option value="0" selected>Chưa chọn</option>';
            data.forEach(function (nhomquyen) {
                html += '<option value="' + nhomquyen.MANHOMQUYEN + '">' + nhomquyen.TENNHOMQUYEN + '</option>';
            });
            $('#addTaiKhoan_select_loainhomquyen').html(html);
        },
        error: function (xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}
// Thêm sự kiện lắng nghe vào dropdown của NHOMQUYEN
// document.getElementById('detailDonHang_shipper').addEventListener('change', function() {
//     var selectedValue = this.value; // Lấy giá trị đã chọn trong dropdown
//     if (selectedValue === '0') { // Nếu đã chọn lại option "Chưa chọn"
//         // Gửi request AJAX để cập nhật MASHIPPER thành NULL
//         $.ajax({
//             url: 'api/admin/updateShipper.php', // Đường dẫn đến trang xử lý cập nhật
//             type: 'POST', // Phương thức POST
//             data: { idDonHang: document.getElementById('idDonHang').value }, // Gửi ID đơn hàng cần cập nhật
//             success: function(response) {
//                 console.log('Giá trị của MASHIPPER đã được cập nhật thành NULL');
//             },
//             error: function(xhr, status, error) {
//                 console.error('Lỗi khi gửi yêu cầu đến trang xử lý:', error);
//             }
//         });
//     }
// });
function saveEditTaiKhoan() {
    let id = document.getElementById("editTaiKhoan_id").value;
    let ten = document.getElementById("editTaiKhoan_ten").value;
    let matkhau = document.getElementById("editTaiKhoan_matkhau").value;
    let ngaytao = document.getElementById("editTaiKhoan_ngaytao").value;
    let manhomquyen = document.getElementById("editTaiKhoan_select_loainhomquyen").value;
    let trangthai = document.getElementById("editTaiKhoan_select_trangthai").value;
    $.ajax({
        url: 'api/admin/updateTaiKhoan.php',
        type: 'POST',
        data: {
            MATK: id,
            TENDN: ten,
            MATKHAU: matkhau,
            NGAYTAO: ngaytao,
            MANHOMQUYEN: manhomquyen,
            TRANGTHAI: trangthai
        },
        success: function (response) {
            alert(response);
            getDsTaiKhoan();
            document.querySelector(".editTaiKhoan").classList.remove("open");
        },
        error: function (xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}
function saveTaiKhoan() {
    let idTaiKhoan = document.getElementById("addTaiKhoan_id").value;
    let ten = document.getElementById("addTaiKhoan_ten").value;
    let matKhau = document.getElementById("addTaiKhoan_matkhau").value;
    let ngayTao = document.getElementById("addTaiKhoan_ngaytao").value;
    let nhomQuyen = document.getElementById("addTaiKhoan_select_loainhomquyen").value;
    let trangThai = document.getElementById("addTaiKhoan_select_trangthai").value;
    $.ajax({
        url: 'api/admin/addTaiKhoan.php',
        type: 'POST',
        data: {
            MATK: idTaiKhoan,
            TENDN: ten,
            MATKHAU: matKhau,
            NGAYTAO: ngayTao,
            MANHOMQUYEN: nhomQuyen,
            TRANGTHAI: trangThai
        },
        success: function (response) {
            alert(response);
            getDsTaiKhoan();
            document.querySelector(".addTaiKhoan").classList.remove("open");
        },
        error: function (xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}
function deleteTaiKhoan(id) {
    let index = taikhoans.findIndex(item => {
        return item.MATK == id
    })
    if (confirm("Xóa tài khoản có mã" + taikhoans[index].MATK + " ?")) {
        deleteStatusTaiKhoan(taikhoans[index].MATK);
        alert("Đã Xóa tài khoản có mã " + taikhoans[index].MATK + " thành công");
        getDsTaiKhoan();
    }
}

function deleteStatusTaiKhoan(id) {
    $.ajax({
        url: 'api/admin/deleteTaiKhoan.php',
        type: 'POST',
        data: { MATK: id },
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