var nhanviens = [];
var phanloaisp = [];
function getDsNhanVien(){
    // Tạo một yêu cầu AJAX
    var xhr = new XMLHttpRequest();
        
    xhr.open('GET', 'api/admin/layDsNhanVien.php', true);

    // Đặt phương thức và URL yêu cầu
    // Xử lý sự kiện khi yêu cầu hoàn thành
    xhr.onload = function() {
        // Kiểm tra mã trạng thái HTTP
        if (xhr.status >= 200 && xhr.status < 300) {
            // Chuyển đổi dữ liệu JSON nhận được thành đối tượng JavaScript
            if(xhr.responseText === '') {
                nhanviens = [];
            } else {
                // Chuyển đổi dữ liệu JSON nhận được thành đối tượng JavaScript
                nhanviens = JSON.parse(xhr.responseText);
            }
            // Xử lý dữ liệu, ví dụ: log ra console
            showNhanVien();
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
getDsNhanVien();

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
function showArrayNhanVien(arr) {
let productHtml = "";
if (arr.length === 0) {
    productHtml = `<tr >
    <td colspan="13">Không có dữ liệu !!!</td>
</tr>`
} else {
    productHtml = "";

    
    arr.forEach(product => {
        let btnCtl ='';
        btnTrangThai = product.TRANGTHAI == 1 ?
        `Hoạt động` :
        `Đã khóa`;
        let BtnEdit ='';
        if(quyen.includes(String(7))) {
            BtnEdit = `<button class="btn btn-primary" onclick="editNhanVien(${product.MANV})"><i class="fa-solid fa-pen-to-square"></i></button>`;
        }
        if(quyen.includes(String(8))) {
            btnCtl = product.TRANGTHAI == 1 ?
            `<button class="btn btn-danger" onclick="changeStatusTKNVOff(${product.MANV})"><i class="fa-solid fa-trash"></i></button>` :
            `<button class="btn btn-danger undo-btn" onclick="changeStatusTKNVOn(${product.MANV})"><i class="fa-solid fa-trash"></i></button>`;
        }


        productHtml +=
            `<tr>
            <td>${product.MANV}</td>
            <td>${product.TEN}</td>
            <td>${product.NGAYSINH}</td>
            <td>${product.SDT}</td>
            <td>${product.DIACHI}</td>
            <td>${product.MATK}</td>
            <td>${product.EMAIL}</td>
            <td>${product.CHUCVU}</td>
            <td>${btnTrangThai}</td>
            <td class="table-control">
            ${BtnEdit}
            ${btnCtl}
            </td>
        </tr>`;

    });
}
document.getElementById("dataNhanVien").innerHTML = productHtml;
}

var resultNhanVien;
function showNhanVien(){
    let selectOp = document.getElementById('admin-nhanvien-select').value;
    let valueSearchInput = document.getElementById('content-main-searchbar-nhanvien').value;
    currentPage = 1;
    
    if (selectOp === "0") {
        resultNhanVien = nhanviens;
    } else if (selectOp === "1") {
        resultNhanVien = nhanviens.filter((item) => item.TRANGTHAI == 1);
    } else if (selectOp === "2") {
        resultNhanVien = nhanviens.filter((item) => item.TRANGTHAI == 0);
    }
    
    resultNhanVien = valueSearchInput == "" ? resultNhanVien : resultNhanVien.filter(item => {
        return item.TEN.toString().toUpperCase().includes(valueSearchInput.toString().toUpperCase());
    })
    showArrayNhanVien(resultNhanVien);
}

function resetDataNhanVien(){
    document.getElementById('admin-nhanvien-select').value = "0";
    document.getElementById('content-main-searchbar-nhanvien').value = "";
    getDsNhanVien();
    showArrayNhanVien(nhanviens);
}


function filterByBotToTopNV(){
    let tmp = resultNhanVien;
    tmp.sort(BotToTopDATE);
    showArrayNhanVien(tmp);
}

function filterByTopToBotNV(){
    let tmp = resultNhanVien;
    tmp.sort(TopToBotDATE);
    showArrayNhanVien(tmp);
}

