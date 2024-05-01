var thongkes = [];
function getDsThongKe(){
    // Tạo một yêu cầu AJAX
    var xhr = new XMLHttpRequest();
        
    xhr.open('GET', 'api/admin/layDsThongKe.php', true);

    // Đặt phương thức và URL yêu cầu
    // Xử lý sự kiện khi yêu cầu hoàn thành
    xhr.onload = function() {
        // Kiểm tra mã trạng thái HTTP
        if (xhr.status >= 200 && xhr.status < 300) {
            // Chuyển đổi dữ liệu JSON nhận được thành đối tượng JavaScript\
            if(xhr.responseText.length < 3) {
                thongkes = [];
            } else {
                // Chuyển đổi dữ liệu JSON nhận được thành đối tượng JavaScript
                thongkes = JSON.parse(xhr.responseText);
            }
            // Xử lý dữ liệu, ví dụ: log ra console
            showThongKe();
        } else {
            console.error('Yêu cầu không thành công. Mã lỗi: ' + xhr.status);
        }
    };

    // Xử lý lỗi khi có lỗi trong quá trình yêu cầu
    xhr.onerror = function() {
        console.error('Có lỗi khi gửi yêu cầu.');
    };

    // Gửi yêu cầu
    xhr.send();
}
getDsThongKe();

    // Phân trang

// Công thức tính

// item: 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10

// 1: 0, 1, 2, 3, 4
// 2: 5, 6, 7, 8, 9
// 3: 10

// itemPerPage: 5, currentPage = 1

// start = 0, end = itemPerPage

// start = (currentPage - 1) * itemPerPage

// end = currentPage * itemPerPage

// 1: currentPage = 1; start = (1-1)*5 = 0; end = 1*5 = 5, start=0, end=5
// 2: currentPage = 2; start = (2-1)*5 = 5; end = 2*5 = 10, start=5, end=10
// 3: currentPage = 3: start = (3-1)*5 = 10; end = 3*5 = 15, start=10, end=15



// function displayListNhanVien(productAll, itemPerPage, currentPage){
//     let start = (currentPage - 1) * itemPerPage;
//     let end = currentPage * itemPerPage;
//     let productShow = productAll.slice(start,end);
//     showArrayNhanVien(productShow);
// }

// function setupPagination(productAll,itemPerPage){
//     if(productAll.length > 0){
//         document.querySelector('.page-nav-list').innerHTML = '';
//         let page_count = Math.ceil(productAll.length / itemPerPage);
//         for(let i=1; i <= page_count; i++){
//             let li = paginationChange(i,productAll,currentPage);
//             document.querySelector('.page-nav-list').appendChild(li);
//         }
//     }
// }

// function paginationChange(page,productAll,currentPage){
//     let node = document.createElement('li');
//     node.classList.add("page-nav-item");
//     node.innerHTML = `<a href="#">${page}</a>`;
//     if(currentPage == page) node.classList.add('active');
//     node.addEventListener('click', function(){
//         currentPage = page;
//         document.querySelector('.content-main-list').scrollTop = 0;
//         displayList(productAll,itemPerPage,currentPage);
//         let t = document.querySelectorAll('.page-nav-item.active');
//         for(let i = 0 ; i < t.length ; i++){
//             t[i].classList.remove('active');
//         }
//         node.classList.add('active');
//     })
//     return node;
// }

// Hiển thị danh sách sản phẩm
function showArrayThongKe(arr) {
let productHtml = "";
if (arr.length === 0) {
    productHtml = `<tr >
    <td colspan="6">Không có dữ liệu !!!</td>
</tr>`
} else {
    productHtml = "";

    
    arr.forEach(product => {
        productHtml +=
            `<tr>
            <td>${product.TENLOAISP}</td>
            <td>${product.TENTHUONGHIEU}</td>
            <td>${product.TENSP}</td>
            <td>${product.TONGSOLUONG}</td>
            <td>${product.DONGIA}</td>
            <td>${product.TONGGIATIEN}</td>
        </tr>`;

    });
}
document.getElementById("dataThongKe").innerHTML = productHtml;
}

var resultThongKe;
function showThongKe(){
    let selectOp = document.getElementById('admin-thongke-select').value;
    let selectThuongHieu = document.getElementById("admin-thongke-type-select").value;
    let valueSearchInput = document.getElementById('content-main-searchbar-thongke').value;
    currentPage = 1;
    if (selectOp === "0") {
        resultThongKe = thongkes;
        changeDataType(selectOp,tinhTongTien(selectOp));
    } else if (selectOp >= "1" && selectOp <= "6") {
        resultThongKe = thongkes.filter((item) => item.MALOAISP == parseInt(selectOp));
        changeDataType(selectOp,tinhTongTien(selectOp));
    }
    

    if (selectThuongHieu !== "0") {
        resultThongKe = resultThongKe.filter((item) => item.MATHUONGHIEU == parseInt(selectThuongHieu));
    }
    
    resultThongKe = valueSearchInput == "" ? resultThongKe : resultThongKe.filter(item => {
        return item.TENSP.toString().toUpperCase().includes(valueSearchInput.toString().toUpperCase());
    })
    showArrayThongKe(resultThongKe);
}

function resetDataThongKe(){
    document.getElementById('admin-thongke-select').value = "0";
    document.getElementById('admin-thongke-type-select').value = "0";
    document.getElementById('content-main-searchbar-thongke').value = "";
    getDsThongKe();
    showArrayThongKe(thongkes);
}


function BotToTopMONEY(a, b) {
    return a.TONGGIATIEN - b.TONGGIATIEN;
}

function TopToBotMONEY(a, b) {
    return b.TONGGIATIEN - a.TONGGIATIEN;
}

function filterByBotToTopThongKe(){
    let tmp = resultThongKe;
    tmp.sort(BotToTopMONEY);
    showArrayThongKe(tmp);
}

function filterByTopToBotThongKe(){
    let tmp = resultThongKe;
    tmp.sort(TopToBotMONEY);
    showArrayThongKe(tmp);
}

function changeDataType(maloaisp,giatien){
    let title = '';
    if(maloaisp === "1"){
        title = 'LAPTOP DOANH NGHIỆP';
    } else if(maloaisp === "2"){
        title = 'LAPTOP DOANH NHÂN';
    } else if(maloaisp === "3"){
        title = 'LAPTOP GAMING';
    } else if(maloaisp === "4"){
        title = 'LAPTOP HỌC SINH - SINH VIÊN';
    } else if(maloaisp === "5"){
        title = 'LAPTOP VĂN PHÒNG';
    } else if(maloaisp === "6"){
        title = 'LAPTOP ĐỒ HỌA - KỸ THUẬT';
    } else{
        title = 'TẤT CẢ'
    }
    document.querySelector(".dataThongKeShow h1").textContent = title + " :";
    document.querySelector(".dataThongKeShow h2").textContent = giatien + "đ";
}

function tinhTongTien(maloaisp){
    $.ajax({
        url: 'api/admin/tinhTongTienLoaiSP.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: {idLoaiSP: maloaisp}, // Dữ liệu gửi đi (id sản phẩm)
        dataType: 'json',
        success: function(data) {
            console.log(data);
            if(data.total === null){
                data.total = 0;
            }
            changeDataType(maloaisp,data.total);
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
}

