var taikhoans = [];
// Hàm lấy danh sách tài khoản
function getDsTaiKhoan() {
    $.ajax({
        url: 'api/admin/getTaiKhoan.php',
        type: 'GET',
        success: function (response) {
            taikhoans = JSON.parse(response);
            taikhoans.sort(function (a, b) {
                return a.MATK - b.MATK;
            });
            console.log(taikhoans);
            showTaiKhoan();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error(textStatus, errorThrown);
        }
    });
}

// Hàm hiển thị danh sách tài khoản
function showTableTaiKhoan(arr) {
    let phanQuyenHtml = "";
    if (arr.length === 0) {
        phanQuyenHtml = `<tr >
        <td colspan="7">Không có dữ liệu !!!</td>
    </tr>`
    } else {
        phanQuyenHtml = "";


        arr.forEach(taikhoan => {

            phanQuyenHtml +=
                `<tr>
                <td>${taikhoan.MATK}</td>
                <td>${taikhoan.TENDN}</td>
                <td>${taikhoan.MATKHAU}</td>
                <td>${taikhoan.NGAYTAO}</td>
                <td>${taikhoan.TENNHOMQUYEN}</td>
                <td>${taikhoan.TRANGTHAI}</td>
                <td class="table-control">
                    <button class="btn btn-primary" onclick="editTaiKhoan(${taikhoan.MATK})"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="btn btn-danger" onclick="deleteTaiKhoan(${taikhoan.MATK})"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>`;

        });
    }
    document.getElementById("dataTaiKhoan").innerHTML = phanQuyenHtml;
}
var resultNhomQuyen = [];
function showTaiKhoan(){
    let selectOp = document.getElementById('admin-taikhoan-select').value;
    let valueSearchInput = document.getElementById('content-main-searchbar-taikhoan').value;
    currentPage = 1;
    if(selectOp === "0"){
        resultNhomQuyen = taikhoans;
    }else if(selectOp === "1"){
        resultNhomQuyen = taikhoans.filter(item => item.MANHOMQUYEN == 1);
    }else if(selectOp === "2"){
        resultNhomQuyen = taikhoans.filter(item => item.MANHOMQUYEN == 2);
    }else if(selectOp === "3"){
        resultNhomQuyen = taikhoans.filter(item => item.MANHOMQUYEN == 3);
    }else if(selectOp === "4"){
        resultNhomQuyen = taikhoans.filter(item => item.MANHOMQUYEN == 4);
    }else if(selectOp === "5"){
        resultNhomQuyen = taikhoans.filter(item => item.MANHOMQUYEN == 5);
    }
    resultNhomQuyen = valueSearchInput == "" ? resultNhomQuyen : resultNhomQuyen.filter(item => {
        return item.TENDN.toString().toUpperCase().includes(valueSearchInput.toString().toUpperCase());
    })
    showTableTaiKhoan(resultNhomQuyen);
}
// Hàm reset dữ liệu tài khoản
function resetDataTaiKhoan() {
    taikhoans = [];
    getDsTaiKhoan();
}

// Hàm lọc tài khoản từ dưới lên
function filterByBotToTopTaiKhoan() {
    taikhoans.sort(function (a, b) {
        return a.username > b.username ? 1 : -1;
    });
    showTaiKhoan();
}

// Hàm lọc tài khoản từ trên xuống
function filterByTopToBotTaiKhoan() {
    taikhoans.sort(function (a, b) {
        return a.username < b.username ? 1 : -1;
    });
    showTaiKhoan();
}

// Gọi hàm lấy danh sách tài khoản khi tải trang
getDsTaiKhoan();