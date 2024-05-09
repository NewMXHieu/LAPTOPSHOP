var baohanhs = [];
function getDsBaoHanh(){
    // Tạo một yêu cầu AJAX
    var xhr = new XMLHttpRequest();
        
    xhr.open('GET', 'api/admin/layDsBaoHanh.php', true);

    // Đặt phương thức và URL yêu cầu
    // Xử lý sự kiện khi yêu cầu hoàn thành
    xhr.onload = function() {
        // Kiểm tra mã trạng thái HTTP
        if (xhr.status >= 200 && xhr.status < 300) {
            // Chuyển đổi dữ liệu JSON nhận được thành đối tượng JavaScript\
            if(xhr.responseText == '') {
                baohanhs = [];
            } else {
                // Chuyển đổi dữ liệu JSON nhận được thành đối tượng JavaScript
                baohanhs = JSON.parse(xhr.responseText);
            }
            // Xử lý dữ liệu, ví dụ: log ra console
            showBaoHanh();
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
getDsBaoHanh();

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
function showArrayBaoHanh(arr) {
let productHtml = "";
if (arr.length === 0) {
    productHtml = `<tr >
    <td colspan="5">Không có dữ liệu !!!</td>
</tr>`
} else {
    productHtml = "";

    
    arr.forEach(product => {
        productHtml +=
            `<tr>
            <td>${product.MABAOHANH}</td>
            <td>${product.DONVIBAOHANH}</td>
            <td>${product.THOIHAN}</td>
            <td>${product.TRANGTHAI}</td>
            <td><button class="btn btn-primary" onclick="editBaoHanh(${product.MABAOHANH})"><i class="fa-solid fa-pen-to-square"></i></button></td>
        </tr>`;

    });
}
document.getElementById("dataBaoHanh").innerHTML = productHtml;
}

var resultBaoHanh;
function showBaoHanh(){
    let select = document.getElementById("admin-content-select-baohanh").value;
    // let StartDate = document.getElementById('admin-baohanh-select-dateStart').value;
    // let EndDate = document.getElementById("admin-baohanh-select-dateEnd").value;
    let valueSearchInput = document.getElementById('content-main-searchbar-baohanh').value;
    
    if(select === '1'){
        resultBaoHanh = baohanhs.filter((item) => item.TRANGTHAI == 1);
    } else if(select==='2'){
        resultBaoHanh = baohanhs.filter((item) => item.TRANGTHAI == 0);
    }  else{
        resultBaoHanh = baohanhs;
    }

    // if(StartDate !== '' && EndDate !== ''){
    //     resultBaoHanh = resultBaoHanh.filter((item) => new Date(item.NGAYNHAP) <= new Date(EndDate) && new Date(item.NGAYNHAP) >= new Date(StartDate));
    // }
    // else if (EndDate === '' && StartDate !== '') {
    //     resultBaoHanh = resultBaoHanh.filter((item) => new Date(item.NGAYNHAP) >= new Date(StartDate));
    // }
    // else if (StartDate === '' && EndDate !== '') {
    //     resultBaoHanh = resultBaoHanh.filter((item) => new Date(item.NGAYNHAP) <= new Date(EndDate));
    // } 

    resultBaoHanh = valueSearchInput == "" ? resultBaoHanh : resultBaoHanh.filter(item => {
        return item.DONVIBAOHANH.toString().toUpperCase().includes(valueSearchInput.toString().toUpperCase());
    })
    showArrayBaoHanh(resultBaoHanh);
}

function resetDataBaoHanh(){
    document.getElementById("admin-content-select-baohanh").value = '0';
    // document.getElementById('admin-baohanh-select-dateStart').value ='';
    // document.getElementById("admin-baohanh-select-dateEnd").value ='';
    document.getElementById('content-main-searchbar-baohanh').value = '';
    console.log(baohanhs);
    showArrayBaoHanh(baohanhs);
}

function BotToTopDateBaoHanh(a, b) {
    return a.THOIHAN - b.THOIHAN;
}

function TopToBotDateBaoHanh(a, b) {
    return b.THOIHAN - a.THOIHAN;
}

function filterByBotToTopBaoHanh(){
    let tmp = resultBaoHanh.slice();
    tmp.sort(BotToTopDateBaoHanh);
    showArrayBaoHanh(tmp);
}

function filterByTopToBotBaoHanh(){
    let tmp = resultBaoHanh.slice();
    tmp.sort(TopToBotDateBaoHanh);
    showArrayBaoHanh(tmp);
}


// function tinhTongTien(mapn){
//     $.ajax({
//         url: 'api/admin/tinhTongTienBaoHanh.php', // Đường dẫn đến trang PHP
//         type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
//         data: {idLoaiSP: mapn}, // Dữ liệu gửi đi (id sản phẩm)
//         dataType: 'json',
//         success: function(data) {
//             if(data.total === null){
//                 data.total = 0;
//             }
//         },
//         error: function(xhr, status, error) {
//             console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
//         }
//     });
// }

