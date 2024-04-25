function getSoNhanVien(){
    // Sử dụng Ajax để gửi yêu cầu lấy tổng số nhân viên
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.error) {
                console.error(response.error);
            } else {
                document.getElementById("admin-trangchu-user-nhanvien").innerHTML = "Nhân Viên: " + response.total_employees;
            }
        }
    };
    xhr.open("GET", "api/admin/nhanviencount.php", true);
    xhr.send();
}
getSoNhanVien();

function getSoKhachHang(){
    // Sử dụng Ajax để gửi yêu cầu lấy tổng số khách hàng
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.error) {
                console.error(response.error);
            } else {
                document.getElementById("admin-trangchu-user-khachhang").innerHTML = "Khách Hàng: " + response.total_customers;
            }
        }
    };
    xhr.open("GET", "api/admin/khachhangcount.php", true);
    xhr.send();
}
getSoKhachHang();


function getSoDoanhThu(){
    // Sử dụng Ajax để gửi yêu cầu lấy tổng số khách hàng
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.error) {
                console.error(response.error);
            } else {
                document.getElementById("admin-trangchu-doanhthu").innerHTML = "Doanh Thu: " + response["total_doanhThu"];
            }
        }
    };
    xhr.open("GET", "api/admin/tinhDoanhThu.php", true);
    xhr.send();
}
getSoDoanhThu()


// Close modal
let btnCloseModal = document.querySelectorAll(".modal-close");
let modalOpen = document.querySelectorAll(".modal");
for(let i = 0 ; i < modalOpen.length ; i++){
    btnCloseModal[i].onclick = () => {
        modalOpen[i].classList.remove("open");
    };
}


function finish(){
    for(let i = 0 ; i < modalOpen.length ; i++){
        modalOpen[i].classList.remove("open");
    }
}