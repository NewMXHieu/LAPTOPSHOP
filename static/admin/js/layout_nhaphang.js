var phieunhaps = [];
function getDsPhieuNhap(){
    // Tạo một yêu cầu AJAX
    var xhr = new XMLHttpRequest();
        
    xhr.open('GET', 'api/admin/layDsPhieuNhap.php', true);

    // Đặt phương thức và URL yêu cầu
    // Xử lý sự kiện khi yêu cầu hoàn thành
    xhr.onload = function() {
        // Kiểm tra mã trạng thái HTTP
        if (xhr.status >= 200 && xhr.status < 300) {
            // Chuyển đổi dữ liệu JSON nhận được thành đối tượng JavaScript\
            if(xhr.responseText == '') {
                phieunhaps = [];
            } else {
                // Chuyển đổi dữ liệu JSON nhận được thành đối tượng JavaScript
                phieunhaps = JSON.parse(xhr.responseText);
            }
            // Xử lý dữ liệu, ví dụ: log ra console
            showPhieuNhap();
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
getDsPhieuNhap();

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
function showArrayPhieuNhap(arr) {
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
            <td>${product.MAPN}</td>
            <td>${product.MANV}</td>
            <td>${product.NGAYNHAP}</td>
            <td>${product.TONGTIEN}</td>
            <td>${product.TRANGTHAI}</td>
            <td><button class="btn btn-primary" onclick="editPhieuNhap(${product.MAPN})"><i class="fa-solid fa-pen-to-square"></i></button></td>
        </tr>`;

    });
}
document.getElementById("dataNhapHang").innerHTML = productHtml;
}

var resultPhieuNhap;
function showPhieuNhap(){
    let select = document.getElementById("admin-content-select-nhaphang").value;
    let StartDate = document.getElementById('admin-nhaphang-select-dateStart').value;
    let EndDate = document.getElementById("admin-nhaphang-select-dateEnd").value;
    let valueSearchInput = document.getElementById('content-main-searchbar-nhaphang').value;
    
    if(select === '0'){
        resultPhieuNhap = phieunhaps;
    } else if(select === '1'){
        resultPhieuNhap = phieunhaps.filter((item) => item.TRANGTHAI == 1);
    } else {
        resultPhieuNhap = phieunhaps.filter((item) => item.TRANGTHAI == 0);
    }

    if(StartDate !== '' && EndDate !== ''){
        resultPhieuNhap = resultPhieuNhap.filter((item) => new Date(item.NGAYNHAP) <= new Date(EndDate) && new Date(item.NGAYNHAP) >= new Date(StartDate));
    }
    else if (EndDate === '' && StartDate !== '') {
        resultPhieuNhap = resultPhieuNhap.filter((item) => new Date(item.NGAYNHAP) >= new Date(StartDate));
    }
    else if (StartDate === '' && EndDate !== '') {
        resultPhieuNhap = resultPhieuNhap.filter((item) => new Date(item.NGAYNHAP) <= new Date(EndDate));
    } 

    resultPhieuNhap = valueSearchInput == "" ? resultPhieuNhap : resultPhieuNhap.filter(item => {
        return item.MAPN.toString().toUpperCase().includes(valueSearchInput.toString().toUpperCase());
    })
    showArrayPhieuNhap(resultPhieuNhap);
}

function resetDataPhieuNhap(){
    document.getElementById("admin-content-select-nhaphang").value = '0';
    document.getElementById('admin-nhaphang-select-dateStart').value ='';
    document.getElementById("admin-nhaphang-select-dateEnd").value ='';
    document.getElementById('content-main-searchbar-nhaphang').value = '';
    showArrayPhieuNhap(phieunhaps);
    console.log(phieunhaps);
}

function BotToTopDatePhieuNhapa(a, b) {
    return a.TONGTIEN - b.TONGTIEN;
}

function TopToBotDatePhieuNhapa(a, b) {
    return b.TONGTIEN - a.TONGTIEN;
}

function filterByBotToTopPhieuNhap(){
    let tmp = resultPhieuNhap;
    tmp.sort(BotToTopDatePhieuNhapa);
    showArrayPhieuNhap(tmp);
}

function filterByTopToBotPhieuNhap(){
    let tmp = resultPhieuNhap;
    tmp.sort(TopToBotDatePhieuNhapa);
    showArrayPhieuNhap(tmp);
}


// function tinhTongTien(mapn){
//     $.ajax({
//         url: 'api/admin/tinhTongTienPhieuNhap.php', // Đường dẫn đến trang PHP
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

