//modal

    function uncheckAll() {
        var checkboxes = document.getElementsByName('group[]');
        for(var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = false;
        }
    }
    // Default value
    function setDefaultValueProduct(){
        document.getElementById("addProduct_tensanpham").value = "";
        document.getElementById("addProduct_select_thuonghieu").value = "0";
        uncheckAll();
        document.getElementById("addProduct_hinhsp").value = "";
        document.getElementById("addProduct_select_nhacungcap").value = "0";
        document.getElementById("addProduct_select_baohanh").value = "0";
        document.getElementById("addProduct_giatien").value = "";
        document.getElementById("addProduct_detail_cpu").value = "";
        document.getElementById("addProduct_detail_screen").value = "";
        document.getElementById("addProduct_detail_ram").value = "";
        document.getElementById("addProduct_detail_vga").value = "";
        document.getElementById("addProduct_detail_storage").value = "";
        document.getElementById("addProduct_detail_os").value = "";
        document.getElementById("addProduct_detail_pin").value = "";
        document.getElementById("addProduct_detail_weight").value = "";
        document.getElementById("addProduct_detail_mota").value = "";
        document.getElementById("addProduct_detail_mau").value = "";

    }
    
    
    // Open modal add product
    let btnAddProduct = document.getElementById("addNewItemBtn");
    btnAddProduct.addEventListener('click', () =>{
        document.querySelector(".AddSanPham").classList.add("open");
        setDefaultValueProduct();
    })
    
    
    
    // // get path image
    // function getPath(src){
    //     let path = src.split("/");
    //     return "../../../asset/image/" + path[path.length - 1];
    // }
    
    // function btnSaveProduct(){
    //     let products = localStorage.getItem("products") ? JSON.parse(localStorage.getItem("products")) : [];
    //     var nameValue = document.getElementById("product-name-form").value;
    //     var brandValue = document.getElementById("product-brand-select").value;
    //     var priceValue = document.getElementById("product-price-form").value;
    //     var desValue = document.getElementById("product-des-form").value;
    //     var imgValue = getPath(document.querySelector(".image-upload-preview").src);
    //     if(nameValue == "" || desValue == "" || priceValue == ""){
    //         alert("Vui lòng nhập đầy đủ thông tin");
    //     } 
    //     else{
    //         let product = {
    //             id: createID(),
    //             name: nameValue,
    //             brand: brandValue,
    //             des: desValue,
    //             price: priceValue,
    //             img: imgValue,
    //             status: 1
    //         }
    //         products.push(product);
    //         localStorage.setItem("products",JSON.stringify(products));
    //         showProduct();
    //         document.querySelector(".add-product").classList.remove("open");
    //         setDefaultValueProduct();
    //         resetDataAmountProduct();
    //         alert("Thêm sản phẩm thành công");
    //     }
    // }
    


    function setImagePath(imgName){
        return "static/image/products/" + imgName;
    }
    function setImageView(imgName){
        document.getElementById("editProduct_savehinhsp").src = setImagePath(imgName);
    }

    function setImageViewByFileSelect(){
        img = getFileNameFromPath(document.getElementById('editProduct_hinhsp').value).replace(/^.*[\\\/]/, '');
        setImageView(img);
    }
    // edit product
    var indexCur;
    function editProduct(id){
        let index = products.findIndex(item =>{
            return item.MASP == id
        })
        
        indexCur = index;
        layDataNhomLoaiSP(products[index].MASP);
        document.getElementById("idProduct").value = products[index].MASP;
        document.querySelector(".editSanPham").classList.add("open");
        document.getElementById("editProduct_tensanpham").value = products[index].TENSP;
        document.getElementById("editProduct_select_thuonghieu").value = products[index].MATHUONGHIEU;
        setImageView(products[index].HINHSP) ;
        document.getElementById("editProduct_savehinhsp_cuu").value = products[index].HINHSP;
        document.getElementById("editProduct_hinhsp").value = '';
        document.getElementById("editProduct_select_nhacungcap").value = products[index].MANCC;
        document.getElementById("editProduct_select_baohanh").value = products[index].MABAOHANH;
        document.getElementById("editProduct_giatien").value = parseFloat(products[index].GIATIEN).toString();
        document.getElementById("editproduct_detail_cpu").value = products[index].CPU;
        document.getElementById("editproduct_detail_screen").value = products[index].SCREEN;
        document.getElementById("editproduct_detail_ram").value = products[index].RAM;
        document.getElementById("editproduct_detail_vga").value = products[index].VGA;
        document.getElementById("editproduct_detail_storage").value = products[index].STORAGE;
        document.getElementById("editproduct_detail_os").value = products[index].OS;
        document.getElementById("editproduct_detail_pin").value = products[index].PIN;
        document.getElementById("editproduct_detail_weight").value = products[index].WEIGHT;
        document.getElementById("editproduct_detail_mota").value = products[index].MOTA;
        document.getElementById("editproduct_detail_mau").value = products[index].MAU;
        document.getElementById("trangthaiProduct").value = products[index].TRANGTHAI;
    }
    
    function layDataNhomLoaiSP(id){
        var nhomloaisp = [];
        $.ajax({
            url: 'api/admin/layDuLieuNhom.php', // Đường dẫn đến trang PHP
            type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
            dataType: 'json',
            data: { idProduct: id }, // Dữ liệu gửi đi (id sản phẩm)
            success: function(data) {
                data.forEach(item=>{
                    nhomloaisp.push(item.MALOAISP);
                })

                var form = document.getElementById('editProductform');
                var checkboxes = form.querySelectorAll('input[name="group[]"');
                checkboxes.forEach(checkbox => {
                    // Kiểm tra xem checkbox có giá trị MALOAISP nào trong mảng nhomloaisp không
                    if (nhomloaisp.includes(checkbox.value)) {
                        checkbox.checked = true;
                    } else {
                        checkbox.checked = false;
                    }
                });

                
            },
            error: function(xhr, status, error) {
                console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
            }
        });
    }

    
    function getFileNameFromPath(path) {
        var parts = path.split(/[\\/]/); // Tách chuỗi bằng dấu '/' hoặc '\'
        return parts[parts.length - 1];
    }
    
    function saveEditProduct(){
        let loaisp = [];
        // Lặp qua các checkbox để lấy loại sản phẩm được chọn
        document.querySelectorAll('input[name="group[]"]:checked').forEach(function(checkbox) {
            loaisp.push(checkbox.value);
        });
            $.ajax({
                url: 'api/admin/saveEditProduct.php', // Đường dẫn đến trang PHP
                type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
                data: { masp: document.getElementById("idProduct").value,
                    tensp: document.getElementById("editProduct_tensanpham").value,
                    mathuonghieu: document.getElementById("editProduct_select_thuonghieu").value,
                    loaisp: loaisp,
                    hinhsp: document.getElementById("editProduct_hinhsp").value === '' ? (document.getElementById("editProduct_savehinhsp").src).replace(/^.*[\\\/]/, '') : (document.getElementById("editProduct_hinhsp").value).replace(/^.*[\\\/]/, ''),
                    mancc: document.getElementById("editProduct_select_nhacungcap").value,
                    mabaohanh: document.getElementById("editProduct_select_baohanh").value,
                    giatien: document.getElementById("editProduct_giatien").value,
                    cpu: document.getElementById("editproduct_detail_cpu").value,
                    screen: document.getElementById("editproduct_detail_screen").value,
                    ram: document.getElementById("editproduct_detail_ram").value,
                    vga: document.getElementById("editproduct_detail_vga").value,
                    storage: document.getElementById("editproduct_detail_storage").value,
                    os: document.getElementById("editproduct_detail_os").value,
                    pin: document.getElementById("editproduct_detail_pin").value,
                    weight: document.getElementById("editproduct_detail_weight").value,
                    mota: document.getElementById("editproduct_detail_mota").value,
                    mau: document.getElementById("editproduct_detail_mau").value, }, // Dữ liệu gửi đi (id sản phẩm)
                success: function(data) {
                    getDsPhanLoaiSP();
                    getDsSanPham();
                    showProduct();
                    alert(data);
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
                }
            });
        }

        // function checkInput(){
        //     let valid = true;
        //     let regex = /^.{5,}$/;
        //     let regexOnLyText = /^.[^\d]{2,}$/
        //     TEN = document.getElementById("addProduct_tensanpham");
        //     GIATIEN = document.getElementById("addProduct_giatien");
        //     CPU = document.getElementById("addProduct_detail_cpu");
        //     SCREEN = document.getElementById("addProduct_detail_screen");
        //     RAM = document.getElementById('addProduct_detail_ram');
        //     VGA = document.getElementById("addProduct_detail_vga");
        //     STORAGE = document.getElementById("addProduct_detail_storage");
        //     OS = document.getElementById("addProduct_detail_os");
        //     PIN = document.getElementById("addProduct_detail_pin");
        //     WEIGHT = document.getElementById("addProduct_detail_weight");
        //     MAU = document.getElementById("addProduct_detail_mau");

        //     if(!regex.test(TEN.value)){
        //         TEN.style.border='2px solid red';
        //         // alert('Vui lòng nhập tên ít nhất 5 ký tự');
        //         valid = false;
        //     } else{
        //         TEN.style.border='';
        //         valid = true;
        //     }

        //     if(!regex.test(GIATIEN.value)){
        //         GIATIEN.style.border='2px solid red';
        //         // alert('Vui lòng nhập tên ít nhất 5 ký tự');
        //         valid = false;
        //     }else{
        //         GIATIEN.style.border='';
        //         valid = true;
        //     }

        //     if(!regex.test(CPU.value)){
        //         CPU.style.border='2px solid red';
        //         // alert('Vui lòng nhập tên ít nhất 5 ký tự');
        //         valid = false;
        //     }else{
        //         RAM.style.border='';
        //         valid = true;
        //     }

        //     if(!regex.test(SCREEN.value)){
        //         SCREEN.style.border='2px solid red';
        //         // alert('Vui lòng nhập tên ít nhất 5 ký tự');
        //         valid = false;
        //     }else{
        //         RAM.style.border='';
        //         valid = true;
        //     }

        //     if(!regex.test(RAM.value)){
        //         RAM.style.border='2px solid red';
        //         // alert('Vui lòng nhập tên ít nhất 5 ký tự');
        //         valid = false;
        //     }else{
        //         RAM.style.border='';
        //         valid = true;
        //     }

        //     if(!regex.test(VGA.value)){
        //         VGA.style.border='2px solid red';
        //         // alert('Vui lòng nhập tên ít nhất 5 ký tự');
        //         valid = false;
        //     }else{
        //         VGA.style.border='';
        //         valid = true;
        //     }

        //     if(!regex.test(STORAGE.value)){
        //         STORAGE.style.border='2px solid red';
        //         // alert('Vui lòng nhập tên ít nhất 5 ký tự');
        //         valid = false;
        //     }else{
        //         STORAGE.style.border='';
        //         valid = true;
        //     }

        //     if(!regex.test(OS.value)){
        //         OS.style.border='2px solid red';
        //         // alert('Vui lòng nhập tên ít nhất 5 ký tự');
        //         valid = false;
        //     }else{
        //         OS.style.border='';
        //         valid = true;
        //     }

        //     if(!regex.test(PIN.value)){
        //         PIN.style.border='2px solid red';
        //         // alert('Vui lòng nhập tên ít nhất 5 ký tự');
        //         valid = false;
        //     }else{
        //         PIN.style.border='';
        //         valid = true;
        //     }

        //     if(!regex.test(WEIGHT.value)){
        //         WEIGHT.style.border='2px solid red';
        //         // alert('Vui lòng nhập tên ít nhất 5 ký tự');
        //         valid = false;
        //     }else{
        //         WEIGHT.style.border='';
        //         valid = true;
        //     }

        //     if(!regex.test(STORAGE.value)){
        //         STORAGE.style.border='2px solid red';
        //         // alert('Vui lòng nhập tên ít nhất 5 ký tự');
        //         valid = false;
        //     }else{
        //         STORAGE.style.border='';
        //         valid = true;
        //     }

        //     if(!regexOnLyText.test(MAU.value)){
        //         MAU.style.border='2px solid red';
        //         // alert('Vui lòng nhập màu sắc ít nhất 2 ký tự và không chứa số');/
        //         valid = false;
        //     } else{
        //         MAU.style.boder = '';
        //         valid = true;
        //     }
        //     return valid;
        // }

        function checkTEN(){
            const inputText = document.getElementById("addProduct_tensanpham").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("addProduct_tensanpham");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkGIATIEN(){
            const inputText = document.getElementById("addProduct_giatien").value;
            const pattern = /^[0-9]{6,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("addProduct_giatien");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkCPU(){
            const inputText = document.getElementById("addProduct_detail_cpu").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("addProduct_detail_cpu");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkSCREEN(){
            const inputText = document.getElementById("addProduct_detail_screen").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("addProduct_detail_screen");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkRAM(){
            const inputText = document.getElementById("addProduct_detail_ram").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("addProduct_detail_ram");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkVGA(){
            const inputText = document.getElementById("addProduct_detail_vga").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("addProduct_detail_vga");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkSTORAGE(){
            const inputText = document.getElementById("addProduct_detail_storage").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("addProduct_detail_storage");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkOS(){
            const inputText = document.getElementById("addProduct_detail_os").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("addProduct_detail_os");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkPIN(){
            const inputText = document.getElementById("addProduct_detail_pin").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("addProduct_detail_pin");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkWEIGHT(){
            const inputText = document.getElementById("addProduct_detail_weight").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("addProduct_detail_weight");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkMAU(){
            const inputText = document.getElementById("addProduct_detail_mau").value;
            const pattern = /^.[^\d]{1,}$/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("addProduct_detail_mau");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        // edit
        function checkTENedit(){
            const inputText = document.getElementById("editProduct_tensanpham").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("editProduct_tensanpham");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkGIATIENedit(){
            const inputText = document.getElementById("editProduct_giatien").value;
            const pattern = /^[0-9]{6,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("editProduct_giatien");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkCPUedit(){
            const inputText = document.getElementById("editProduct_detail_cpu").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("editProduct_detail_cpu");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkSCREENedit(){
            const inputText = document.getElementById("editProduct_detail_screen").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("editProduct_detail_screen");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkRAMedit(){
            const inputText = document.getElementById("editProduct_detail_ram").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("editProduct_detail_ram");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkVGAedit(){
            const inputText = document.getElementById("editProduct_detail_vga").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("editProduct_detail_vga");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkSTORAGEedit(){
            const inputText = document.getElementById("editProduct_detail_storage").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("editProduct_detail_storage");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkOSedit(){
            const inputText = document.getElementById("editProduct_detail_os").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("editProduct_detail_os");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkPINedit(){
            const inputText = document.getElementById("editProduct_detail_pin").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("editProduct_detail_pin");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkWEIGHTedit(){
            const inputText = document.getElementById("editProduct_detail_weight").value;
            const pattern = /^.{1,}/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("editProduct_detail_weight");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }

        function checkMAUedit(){
            const inputText = document.getElementById("editProduct_detail_mau").value;
            const pattern = /^.[^\d]{1,}$/; // Mẫu để tìm tất cả các số (các dãy chữ số liên tiếp)
            const isValid = pattern.test(inputText);
            const inputElement = document.getElementById("editProduct_detail_mau");
             
            if (isValid) {
                inputElement.style.border = ""; // Reset border
            } else {
                inputElement.style.border = "2px solid red"; // Đổi màu border thành đỏ
            }
        }


        function saveAddProduct(){
            let loaisp = [];
            // Lặp qua các checkbox để lấy loại sản phẩm được chọn
            document.querySelectorAll('input[name="group[]"]:checked').forEach(function(checkbox) {
                loaisp.push(checkbox.value);
            });

            TEN = document.getElementById("addProduct_tensanpham").value;
            MATHUONGHIEU = document.getElementById("addProduct_select_thuonghieu").value;
            LOAISP = loaisp;
            let fullPath = document.getElementById("addProduct_hinhsp").value;
            let filename = fullPath.replace(/^.*[\\\/]/, '');
            HINHSP = filename;
            MANCC = document.getElementById("addProduct_select_nhacungcap").value;
            MABAOHANH = document.getElementById("addProduct_select_baohanh").value;
            GIATIEN = document.getElementById("addProduct_giatien").value;
            CPU = document.getElementById("addProduct_detail_cpu").value;
            SCREEN = document.getElementById("addProduct_detail_screen").value;
            RAM = document.getElementById('addProduct_detail_ram').value;
            VGA = document.getElementById("addProduct_detail_vga").value;
            STORAGE = document.getElementById("addProduct_detail_storage").value;
            OS = document.getElementById("addProduct_detail_os").value;
            PIN = document.getElementById("addProduct_detail_pin").value;
            WEIGHT = document.getElementById("addProduct_detail_weight").value;
            MOTA = document.getElementById("addProduct_detail_mota").value;
            MAU = document.getElementById("addProduct_detail_mau").value;

            $.ajax({
                url: 'api/admin/saveAddProduct.php', // Đường dẫn đến trang PHP
                type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
                data: { 
                    tensp: TEN,
                    mathuonghieu: MATHUONGHIEU,
                    loaisp: LOAISP,
                    hinhsp: HINHSP,
                    mancc: MANCC,
                    mabaohanh: MABAOHANH,
                    giatien: GIATIEN,
                    cpu: CPU,
                    screen: SCREEN,
                    ram: RAM,
                    vga: VGA,
                    storage: STORAGE,
                    os: OS,
                    pin: PIN,
                    weight: WEIGHT,
                    mota: MOTA,
                    mau: MAU, }, // Dữ liệu gửi đi (id sản phẩm)
                success: function(data) {
                    getDsPhanLoaiSP();
                    getDsSanPham();
                    showProduct();
                    alert(data);
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
                }
            });
    }

    function updateStatusProduct(id, status) {
        $.ajax({
            url: 'api/admin/updateTrangThaiProduct.php', // Đường dẫn đến trang PHP
            type: 'POST', // Phương thức POST sẽ gửi dữ liệu qua body
            data: { idProduct: id,
                TrangThai: status
            },
            success: function(data) {
                getDsPhanLoaiSP();
                getDsSanPham();
                showProduct();
                finish();
            },
            error: function(xhr, status, error) {
                console.error('Lỗi khi gửi yêu cầu đến trang PHP:', error);
            }
        });
    }
    
    function changeStatusProductOn(id){
        getDsSanPham();
        let index = products.findIndex((item) => {
            return item.MASP == id;
        })
        if(confirm("Khôi phục sản phẩm "+ products[index].TENSP +" ?")){
            updateStatusProduct(products[index].MASP,1);
            // resetDataAmountProduct();
            alert("Đã khôi phục sản phẩm " + products[index].TENSP +" thành công");
        }
    }
    
    function changeStatusProductOff(id){
        getDsSanPham();
        let index = products.findIndex((item) => {
            return item.MASP == id;
        })
        if(confirm("Xóa sản phẩm "+ products[index].TENSP +" ?")){
            updateStatusProduct(products[index].MASP,0);
           
            // resetDataAmountProduct();
            alert("Đã Xóa sản phẩm " + products[index].TENSP +" thành công");
        }
    }
    
    function finish(){
        for(let i = 0 ; i < modalOpen.length ; i++){
            modalOpen[i].classList.remove("open");
        }
    }