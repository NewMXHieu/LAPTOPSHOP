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
        document.getElementById("addProduct_nhanvien").value = "";
        document.getElementById("addProduct_hinhsp").value = "";
        document.getElementById("addProduct_select_nhacungcap").value = "0";
        document.getElementById("addProduct_select_baohanh").value = "0";
        document.getElementById("addProduct_giatien").value = "";
        document.getElementById("addproduct_detail_cpu").value = "";
        document.getElementById("addproduct_detail_screen").value = "";
        document.getElementById("addproduct_detail_ram").value = "";
        document.getElementById("addproduct_detail_vga").value = "";
        document.getElementById("addproduct_detail_storage").value = "";
        document.getElementById("addproduct_detail_os").value = "";
        document.getElementById("addproduct_detail_pin").value = "";
        document.getElementById("addproduct_detail_weight").value = "";
        document.getElementById("addproduct_detail_mota").value = "";
        document.getElementById("addproduct_detail_mau").value = "";

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
        return "static/image/" + imgName;
    }
    function setImageView(imgName){
        document.getElementById("editProduct_savehinhsp").src = setImagePath(imgName);
    }

    function setImageViewByFileSelect(){
        img = getFileNameFromPath(document.getElementById('editProduct_hinhsp').value);
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
        document.getElementById("editProduct_nhanvien").value = products[index].MANV;
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
                checkboxes.forEach(checkbox =>{
                    nhomloaisp.forEach(item=>{
                        if(item === checkbox.value){
                            checkbox.checked = true;
                        }
                    })
                })

                
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
    
    // function saveEditProduct(){
    //     let productData = {
    //         masp: indexCur,
    //         tensp: document.getElementById("editProduct_tensanpham").value,
    //         mathuonghieu: document.getElementById("editProduct_select_thuonghieu").value,
    //         loaisp: [],
    //         manv: document.getElementById("editProduct_nhanvien").value,
    //         hinhsp: document.getElementById("editProduct_hinhsp").value === '' ?  getFileNameFromPath(document.getElementById("editProduct_savehinhsp").src) : document.getElementById("editProduct_hinhsp").value,
    //         mancc: document.getElementById("editProduct_select_nhacungcap").value,
    //         mabaohanh: document.getElementById("editProduct_select_baohanh").value,
    //         giatien: document.getElementById("editProduct_giatien").value,
    //         cpu: document.getElementById("editproduct_detail_cpu").value,
    //         screen: document.getElementById("editproduct_detail_screen").value,
    //         ram: document.getElementById("editproduct_detail_ram").value,
    //         vga: document.getElementById("editproduct_detail_vga").value,
    //         storage: document.getElementById("editproduct_detail_storage").value,
    //         os: document.getElementById("editproduct_detail_os").value,
    //         pin: document.getElementById("editproduct_detail_pin").value,
    //         weight: document.getElementById("editproduct_detail_weight").value,
    //         mota: document.getElementById("editproduct_detail_mota").value,
    //         mau: document.getElementById("editproduct_detail_mau").value,
    //         trangthai: document.getElementById("trangthaiProduct").value,
    //     };

    // // Lặp qua các checkbox để lấy loại sản phẩm được chọn
    // document.querySelectorAll('input[name="group[]"]:checked').forEach(function(checkbox) {
    //     productData.loaisp.push(checkbox.value);
    // });
    //         // Gửi yêu cầu cập nhật dữ liệu sản phẩm lên máy chủ
    //         fetch('api/admin/editProduct.php', {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //             },
    //             body: JSON.stringify(productData),
    //         })
    //         .then(response => {
    //             if (response.ok) {
    //                 alert("Sản phẩm đã được gửi đi vui lòng chờ giây lát thành công");
    //                 // Thực hiện các hành động khác sau khi cập nhật dữ liệu thành công
    //             } else {
    //                 throw new Error('Lỗi khi gửi dữ liệu');
    //             }
    //         })
    //         .catch(error => {
    //             console.error('Lỗi:', error);
    //             alert("Đã có lỗi xảy ra. Vui lòng thử lại sau.");
    //         });
    //     }

        function saveAddProduct(){
            let productData = {
                tensp: document.getElementById("editProduct_tensanpham").value,
                mathuonghieu: document.getElementById("editProduct_select_thuonghieu").value,
                loaisp: [],
                manv: document.getElementById("editProduct_nhanvien").value,
                hinhsp: document.getElementById("editProduct_hinhsp").value,
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
                mau: document.getElementById("editproduct_detail_mau").value
            };
    
        // Lặp qua các checkbox để lấy loại sản phẩm được chọn
        document.querySelectorAll('input[name="group[]"]:checked').forEach(function(checkbox) {
            productData.loaisp.push(checkbox.value);
        });
                // Tạo một đối tượng XMLHttpRequest
                let xhr = new XMLHttpRequest();

                // Thiết lập yêu cầu POST đến PHP file
                xhr.open('POST', 'api/admin/editProduct.php', true);

                // Thiết lập tiêu đề Content-Type cho yêu cầu
                xhr.setRequestHeader('Content-Type', 'application/json');

                // Xử lý sự kiện khi yêu cầu hoàn thành
                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        // Xử lý phản hồi từ server nếu cần
                        console.log(xhr.responseText);
                    } else {
                        console.error('Error sending data to server');
                    }
                };

                // Xử lý sự kiện khi có lỗi xảy ra trong quá trình gửi yêu cầu
                xhr.onerror = function() {
                    console.error('Error sending data to server');
                };

                // Gửi yêu cầu với dữ liệu JSON đã được chuyển đổi thành chuỗi
                xhr.send(JSON.stringify(productData));
                    
        }
    // function btnEditProduct(){
    //     let products = localStorage.getItem("products") ? JSON.parse(localStorage.getItem("products")) : [];
    //     let idProduct = products[indexCur].id;
    //     let imgProduct = products[indexCur].img;
    //     let nameProduct = products[indexCur].name;
    //     let priceProduct = products[indexCur].price;
    //     let desProduct = products[indexCur].des;
    //     let brandProduct = products[indexCur].brand;
    //     let statusProductCur = products[indexCur].status;
    //     let imgProductCur = getPath(document.querySelector(".image-upload-preview").src)
    //     let nameProductCur = document.getElementById("product-name-form").value;
    //     let priceProductCur = document.getElementById("product-price-form").value;
    //     let desProductCur = document.getElementById("product-des-form").value;
    //     let brandProductCur = document.getElementById("product-brand-select").value;
    
    //     if (imgProductCur != imgProduct || nameProductCur != nameProduct || priceProductCur != priceProduct || desProductCur != desProduct || brandProductCur != brandProduct) {
    //         let productadd = {
    //             id: idProduct,
    //             name: nameProductCur,
    //             img: imgProductCur,
    //             brand: brandProductCur,
    //             price: priceProductCur,
    //             des: desProductCur,
    //             status: statusProductCur,
    //         };
    //         products.splice(indexCur, 1);
    //         products.splice(indexCur, 0, productadd);
    //         localStorage.setItem("products", JSON.stringify(products));
    //         alert("Sửa thông tin thành công");
    //         setDefaultValueProduct();
    //         document.querySelector(".add-product").classList.remove("open");
    //         showProduct();
    //     } else {
    //         alert("Thông tin sản phẩm không thay đổi");
    //     }
    // }
    
    // function deleteProduct(id){
    //     let products = localStorage.getItem("products") ? JSON.parse(localStorage.getItem("products")) : [];
    //     let index = products.findIndex(item =>{
    //         return item.id == id
    //     })
    //     if(confirm("Xóa sản phẩm ?")){
    //         alert("Xóa sản phẩm " + products[index].name + " thành công !!!");
    //         products = products.filter(item => item != products[index]);
    //         localStorage.setItem("products", JSON.stringify(products));
    //         showProduct();
    //         resetDataAmountProduct();
    //     }
    // }
    function updateStatusProduct(id, status) {
        // Tạo một đối tượng XMLHttpRequest
        var xhr = new XMLHttpRequest();
    
        // Xác định phương thức và URL của yêu cầu
        var url = "api/admin/updateTrangThaiProduct.php";
        var method = "POST";
    
        // Chuẩn bị dữ liệu để gửi
        var data = {
            idProduct: id,
            TrangThai: status
        };
        // Mở kết nối
        xhr.open(method, url, true);
    
        // Thiết lập tiêu đề yêu cầu nếu cần
        xhr.setRequestHeader("Content-Type", "application/json"); // Sử dụng application/json vì chúng ta đang gửi dữ liệu dưới dạng JSON
    
        // Xử lý sự kiện khi yêu cầu hoàn thành
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Xử lý kết quả từ PHP
                console.log(xhr.responseText);
            }
        };
    
        // Gửi yêu cầu với dữ liệu, chuyển đổi đối tượng JavaScript thành chuỗi JSON trước khi gửi
        xhr.send(JSON.stringify(data));
    }
    
    function changeStatusProductOn(id){
        getDsSanPham();
        let index = products.findIndex((item) => {
            return item.MASP == id;
        })
        if(confirm("Khôi phục sản phẩm "+ products[index].TENSP +" ?")){
            updateStatusProduct(products[index].MASP,1);
            getDsPhanLoaiSP();
            getDsSanPham();
            showProduct();
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
            getDsPhanLoaiSP();
            getDsSanPham();
            showProduct();
            // resetDataAmountProduct();
            alert("Đã Xóa sản phẩm " + products[index].TENSP +" thành công");
        }
    }
    
    // let product_priceInput = document.getElementById("product-price-form");
    //     product_priceInput.addEventListener("input",function(){
    //         let inputValue = product_priceInput.value.replace(/\D/g, '');
    //         let formattedValue = toVND(inputValue);
    
    //         if (formattedValue != product_priceInput.value) {
    //             product_priceInput.value = formattedValue;
    //         }
    //     })