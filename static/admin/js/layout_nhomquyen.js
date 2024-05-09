var phanQuyen = [];
function getDsPhanQuyen(){
    // Tạo một yêu cầu AJAX
    var xhr = new XMLHttpRequest();
        
    xhr.open('GET', 'api/admin/getDsPhanQuyen.php', true);

    // Đặt phương thức và URL yêu cầu
    // Xử lý sự kiện khi yêu cầu hoàn thành
    xhr.onload = function() {
        // Kiểm tra mã trạng thái HTTP
        if (xhr.status >= 200 && xhr.status < 300) {
            // Chuyển đổi dữ liệu JSON nhận được thành đối tượng JavaScript
            if(xhr.responseText === '') {
                phanQuyen = [];
            } else {
                // Chuyển đổi dữ liệu JSON nhận được thành đối tượng JavaScript
                phanQuyen = JSON.parse(xhr.responseText);
            }
            phanQuyen.sort(function(a, b) {
                return parseInt(a.MANHOMQUYEN) - parseInt(b.MANHOMQUYEN);
            });
            console.log(phanQuyen);
            // Xử lý dữ liệu, ví dụ: log ra console
            showPhanQuyen();
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
getDsPhanQuyen();

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
//     showTablePhanQuyen(productShow);
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
function showTablePhanQuyen(arr) {
let phanQuyenHtml = "";
if (arr.length === 0) {
    phanQuyenHtml = `<tr >
    <td colspan="7">Không có dữ liệu !!!</td>
</tr>`
} else {
    phanQuyenHtml = "";

    
    arr.forEach(phanquyen => {

        phanQuyenHtml +=
            `<tr>
            <td>${phanquyen.MANHOMQUYEN}</td>
            <td>${phanquyen.TENNHOMQUYEN}</td>
            <td>${phanquyen.MOTA}</td>
            <td class="table-control">
                <button class="btn btn-primary" onclick="editPhanQuyen(${phanquyen.MANHOMQUYEN})"><i class="fa-solid fa-pen-to-square"></i></button>
                <button class="btn btn-danger" onclick="deletePhanQuyen(${phanquyen.MANHOMQUYEN})"><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>`;

    });
}
document.getElementById("dataPhanQuyen").innerHTML = phanQuyenHtml;
}

var resultPhanQuyen = [];
function showPhanQuyen(){
    let selectOp = document.getElementById('admin-phanquyen-select').value;
    let valueSearchInput = document.getElementById('content-main-searchbar-phanquyen').value;
    currentPage = 1;
    if (selectOp === "0") {
        resultPhanQuyen = phanQuyen;
    } else if (selectOp === "1") {
        resultPhanQuyen = phanQuyen.filter((item) => item.MANHOMQUYEN == 1);
    } else if (selectOp === "2") {
        resultPhanQuyen = phanQuyen.filter((item) => item.MANHOMQUYEN == 2);
    }
    
    resultPhanQuyen = valueSearchInput == "" ? resultPhanQuyen : resultPhanQuyen.filter(item => {
        return item.TEN.toString().toUpperCase().includes(valueSearchInput.toString().toUpperCase());
    })
    showTablePhanQuyen(resultPhanQuyen);
}

function resetDataPhanQuyen(){
    document.getElementById('admin-phanquyen-select').value = "0";
    document.getElementById('content-main-searchbar-phanquyen').value = "";
    getDsPhanQuyen();
    showTablePhanQuyen(phanQuyen);
}


function filterByBotToTopPhanQuyen(){
    let tmp = resultPhanQuyen;
    tmp.sort(BotToTopDATE);
    showTablePhanQuyen(tmp);
}

function filterByTopToBotPhanQuyen(){
    let tmp = resultPhanQuyen;
    tmp.sort(TopToBotDATE);
    showTablePhanQuyen(tmp);
}

