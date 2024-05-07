// Open modal add product
let btnAddBaoHanh = document.getElementById("addNewBaoHanh");
btnAddBaoHanh.addEventListener('click', () =>{
    document.querySelector(".addbaohanh").classList.add("open");
    setDefaultValueBaoHanh();
})
function changeNameToId(name){
    if(name === "ACER"){
        return '1';
    } else if(name === "APPLE"){
        return '2';
    } else if(name === "ASUS"){
        return '3';
    } else if(name === "DELL"){
        return '4';
    } else if(name === "GIGABYTE"){
        return '5';
    } else if(name === "HP"){
        return '6';
    } else if(name === "LG"){
        return '7';
    } else if(name === "LENOVO"){
        return '8';
    } else if(name === "MSI"){
        return '9';
    }
    
}
function editBaoHanh(id){
    let index = baohanhs.findIndex(item =>{
        return item.MABAOHANH == id;
    })
    document.getElementById("editbaohanh_idbaohanh").value = baohanhs[index].MABAOHANH;
    document.querySelector(".editbaohanh").classList.add("open");
    document.getElementById("detailbaohanh_tennhanvien").value = baohanhs[index].MANV;
    document.getElementById("detailbaohanh_dvbh").value = changeNameToId(baohanhs[index].DONVIBAOHANH);
    document.getElementById("detailbaohanh_thoihan").value = baohanhs[index].THOIHAN;
    document.getElementById("detailbaohanh_TrangThai").value = baohanhs[index].TRANGTHAI;
}

function setDefaultValueBaoHanh(){

}

// function showArrayBaoHanh(arr) {
//     let productHtml = "";
//     if (arr.length === 0) {
//         productHtml = `<tr >
//         <td colspan="6">Không có dữ liệu !!!</td>
//     </tr>`
//     } else {
//         productHtml = "";
    
        
//         arr.forEach(product => {
//             productHtml +=
//                 `<tr>
//                 <td>${product.MABAOHANH}</td>
//                 <td>${product.MANV}</td>
//                 <td>${product.NGAYNHAP}</td>
//                 <td>${product.TONGTIEN}</td>
//                 <td>${product.TRANGTHAI}</td>
//                 <td><button class="btn btn-primary" onclick="editBaoHanh(${product.MABAOHANH})"><i class="fa-solid fa-pen-to-square"></i></button></td>
//             </tr>`;
    
//         });
//     }
//     document.getElementById("databaohanh").innerHTML = productHtml;
//     }

function savebaohanh(){
    
    if(document.getElementById("addbaohanh_tennhanvien").value === ''){
        alert("Vui lòng nhập mã nhân viên !!!");
    } else{
        let manv = document.getElementById("addbaohanh_tennhanvien").value;
        let donvibaohanh = document.getElementById("addbaohanh_dvbh").value;
        let thoihan = document.getElementById("addbaohanh_thoihan").value;
        let trangthai = 0;

        $.ajax({
        url: 'api/admin/saveBaoHanh.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: {
            MANV: manv,
            DONVIBAOHANH: donvibaohanh,
            THOIHAN: thoihan,
            TRANGTHAI: trangthai,
        },
            success: function(data) {
            console.log(data);
            getDsBaoHanh();
            showBaoHanh();
            finish();
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
    }
}

function saveEditBaoHanh (){
    if(document.getElementById("detailbaohanh_tennhanvien").value === ''){
        alert("Vui lòng nhập mã nhân viên !!!");
    } else{
        let mabaohanh = document.getElementById("editbaohanh_idbaohanh").value;
        let manv = document.getElementById("detailbaohanh_tennhanvien").value;
        let donvibaohanh = document.getElementById("detailbaohanh_dvbh").value;
        let thoihan = document.getElementById("detailbaohanh_thoihan").value;
        let trangthai = 0;

        $.ajax({
        url: 'api/admin/saveEditBaoHanh.php', // Đường dẫn đến trang PHP
        type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
        data: {
            MABAOHANH: mabaohanh,
            MANV: manv,
            DONVIBAOHANH: donvibaohanh,
            THOIHAN: thoihan,
            TRANGTHAI: trangthai,
        },
            success: function(data) {
            console.log(data);
            getDsBaoHanh();
            showBaoHanh();
            finish();
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
        }
    });
    }
}


