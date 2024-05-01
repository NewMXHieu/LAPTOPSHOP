<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/admin/css/modal_sanpham.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <title>Modal add product</title>
</head>
<body>

<!-- Thêm sản phẩm -->
<div class="modal AddSanPham">
    <div class="modal-close modal-close-sanpham">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <form action="" method="POST">
        <h2 class="add-product-title">THÊM SẢN PHẨM</h2>
        <div class="detail_product">
            <div class="detail_product-items">
                <div class="detail_product-items-item">
                    <label for="tensp">TÊN SẢN PHẨM</label>
                    <input type="text" id="addProduct_tensanpham" name="addProduct_tensanpham">
                </div>
                <div class="detail_product-items-item">
                    <label for="thuonghieu">THƯƠNG HIỆU</label>
                    <select id="addProduct_select_thuonghieu" name="addProduct_select_thuonghieu">
                        <option value="0" selected>Chọn 1 thương hiệu</option>
                        <option value="1">ACER</option>
                        <option value="2">APPLE</option>
                        <option value="3">ASUS</option>
                        <option value="4">DELL</option>
                        <option value="5">GIGABYTE</option>
                        <option value="6">HP</option>
                        <option value="7">LG</option>
                        <option value="8">LENOVO</option>
                        <option value="9">MSI</option>
                    </select>
                </div>

                <div class="detail_product-items-item">
                    <label for="loaisanpham">LOẠI SẢN PHẨM</label>
                    <div class="checkboxList">
            
                        <input type="checkbox" id="option1" name="group[]" value="1">
                        <label for="option1">Laptop Doanh Nghiệp</label><br>

                        <input type="checkbox" id="option2" name="group[]" value="2">
                        <label for="option2">Laptop Doanh Nhân</label><br>

                        <input type="checkbox" id="option3" name="group[]" value="3">
                        <label for="option3">Laptop Gaming</label><br>

                        <input type="checkbox" id="option4" name="group[]" value="4">
                        <label for="option4">Laptop Học Sinh - Sinh Viên</label><br>

                        <input type="checkbox" id="option5" name="group[]" value="5">
                        <label for="option5">Laptop Văn Phòng</label><br>

                        <input type="checkbox" id="option6" name="group[]" value="6">
                        <label for="option6">Laptop Đồ Họa - Kỹ Thuật</label>

                    </div>

                </div>

                <div class="detail_product-items-item">
                    <label for="hinhsp">CHỌN HÌNH</label>
                    <div class="">
                        <input type="file" id="addProduct_hinhsp" name="addProduct_hinhsp" onchange="setImageViewByFileSelect()">
                    </div>
                </div>

                <div class="detail_product-items-item">
                    <label for="ncc">NHÀ CUNG CẤP</label>
                    <select id="addProduct_select_nhacungcap" name="addProduct_select_nhacungcap">
                        <option value="0" selected>Chọn 1 nhà cung cấp</option>
                        <option value="1">ACER</option>
                        <option value="2">APPLE</option>
                        <option value="3">ASUS</option>
                        <option value="4">DELL</option>
                        <option value="5">GIGABYTE</option>
                        <option value="6">HP</option>
                        <option value="7">LG</option>
                        <option value="8">LENOVO</option>
                        <option value="9">MSI</option>
                    </select>
                </div>

                <div class="detail_product-items-item">
                    <label for="baohanh">ĐƠN VỊ BẢO HÀNH</label>
                    <select id="addProduct_select_baohanh" name="addProduct_select_baohanh">
                        <option value="0" selected>Chọn 1 đơn vị</option>
                        <option value="1">ACER</option>
                        <option value="2">APPLE</option>
                        <option value="3">ASUS</option>
                        <option value="4">DELL</option>
                        <option value="5">GIGABYTE</option>
                        <option value="6">HP</option>
                        <option value="7">LG</option>
                        <option value="8">LENOVO</option>
                        <option value="9">MSI</option>
                    </select>
                </div>
                
                <div class="detail_product-items-item">
                    <label for="giatien">GIÁ TIỀN</label>
                    <input type="number" id="addProduct_giatien" name="addProduct_giatien">
                </div>
            </div>

            <div class="detail_product-items">
                <div class="detail_product-items-item">
                    <label for="cpu">CPU</label>
                    <input type="text" id="addProduct_detail_cpu" name="addProduct_detail_cpu">
                </div>

                <div class="detail_product-items-item">
                    <label for="screen">SCREEN</label>
                    <input type="text" id="addProduct_detail_screen" name="addProduct_detail_screen">
                </div>

                <div class="detail_product-items-item">
                    <label for="ram">RAM</label>
                    <input type="text" id="addProduct_detail_ram" name="addProduct_detail_ram">
                </div>

                <div class="detail_product-items-item">
                    <label for="vga">VGA</label>
                    <input type="text" id="addProduct_detail_vga" name="addProduct_detail_vga">
                </div>

                <div class="detail_product-items-item">
                    <label for="storage">STORAGE</label>
                    <input type="text" id="addProduct_detail_storage" name="addProduct_detail_storage">
                </div>

                <div class="detail_product-items-item">
                    <label for="os">OS</label>
                    <input type="text" id="addProduct_detail_os" name="addProduct_detail_os">
                </div>

                <div class="detail_product-items-item">
                    <label for="pin">PIN</label>
                    <input type="text" id="addProduct_detail_pin" name="addProduct_detail_pin">
                </div>

                <div class="detail_product-items-item">
                    <label for="weight">WEIGHT</label>
                    <input type="text" id="addProduct_detail_weight" name="addProduct_detail_weight">
                </div>

                <div class="detail_product-items-item">
                    <label for="mota">MOTA</label>
                    <textarea type="text" id="addProduct_detail_mota" name="addProduct_detail_mota"></textarea>
                </div>

                <div class="detail_product-items-item">
                    <label for="mau">MÀU</label>
                    <input type="text" id="addProduct_detail_mau" name="addProduct_detail_mau">
                </div>
            </div>
        </div>
        <div class="form-control">
            <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()" value="Hủy">Hủy</button>
            <button class="control-btn-form addproduct_btn_save" type="Button" onclick="saveAddProduct()" value="Lưu">Lưu</button>
        </div>
    </form>
</div>


<!-- edit sản phẩm -->
<div class="modal editSanPham">
    <div class="modal-close modal-close-sanpham">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <form id="editProductform" action="" method="POST">
        <input type="hidden" id="idProduct" name="idProduct">
        <input type="hidden" id="trangthaiProduct" name="trangthaiProduct">
        <H2 class="edit-product-title">SỬA SẢN PHẨM</H2>
        <div class="detail_product">
            <div class="detail_product-items">
                <div class="detail_product-items-item">
                    <label for="tensp">TÊN SẢN PHẨM</label>
                    <input type="text" id="editProduct_tensanpham" name="editProduct_tensanpham">
                </div>
                <div class="detail_product-items-item">
                    <label for="thuonghieu">THƯƠNG HIỆU</label>
                    <select id="editProduct_select_thuonghieu" name="editProduct_select_thuonghieu">
                        <option value="0" selected>Chọn 1 thương hiệu</option>
                        <option value="1">ACER</option>
                        <option value="2">APPLE</option>
                        <option value="3">ASUS</option>
                        <option value="4">DELL</option>
                        <option value="5">GIGABYTE</option>
                        <option value="6">HP</option>
                        <option value="7">LG</option>
                        <option value="8">LENOVO</option>
                        <option value="9">MSI</option>
                    </select>
                </div>

                <div class="detail_product-items-item">
                    <div class="imageView">
                        <label for="loaisanpham">LOẠI SẢN PHẨM</label>
                        <img type="text" id='editProduct_savehinhsp' name='editProduct_savehinhsp' alt="Hình sản phẩm" src="" style="width:200px;height:150px">
                        <input type="text" id='editProduct_savehinhsp_cuu' name='editProduct_savehinhsp_cuu' style="display:none">
                    </div>
                    <div class="checkboxList">
            
                        <input type="checkbox" id="option1" name="group[]" value="1">
                        <label for="option1">Laptop Doanh Nghiệp</label><br>

                        <input type="checkbox" id="option2" name="group[]" value="2">
                        <label for="option2">Laptop Doanh Nhân</label><br>

                        <input type="checkbox" id="option3" name="group[]" value="3">
                        <label for="option3">Laptop Gaming</label><br>

                        <input type="checkbox" id="option4" name="group[]" value="4">
                        <label for="option4">Laptop Học Sinh - Sinh Viên</label><br>

                        <input type="checkbox" id="option5" name="group[]" value="5">
                        <label for="option5">Laptop Văn Phòng</label><br>

                        <input type="checkbox" id="option6" name="group[]" value="6">
                        <label for="option6">Laptop Đồ Họa - Kỹ Thuật</label>

                    </div>

                </div>

                <div class="detail_product-items-item">
                    <label for="hinhsp">CHỌN HÌNH</label>
                    <div class="">
                        <input type="file" id="editProduct_hinhsp" name="editProduct_hinhsp" onchange="setImageViewByFileSelect()">
                    </div>
                </div>

                <div class="detail_product-items-item">
                    <label for="ncc">NHÀ CUNG CẤP</label>
                    <select id="editProduct_select_nhacungcap" name="editProduct_select_nhacungcap">
                        <option value="0" selected>Chọn 1 nhà cung cấp</option>
                        <option value="1">ACER</option>
                        <option value="2">APPLE</option>
                        <option value="3">ASUS</option>
                        <option value="4">DELL</option>
                        <option value="5">GIGABYTE</option>
                        <option value="6">HP</option>
                        <option value="7">LG</option>
                        <option value="8">LENOVO</option>
                        <option value="9">MSI</option>
                    </select>
                </div>

                <div class="detail_product-items-item">
                    <label for="baohanh">ĐƠN VỊ BẢO HÀNH</label>
                    <select id="editProduct_select_baohanh" name="editProduct_select_baohanh">
                        <option value="0" selected>Chọn 1 đơn vị</option>
                        <option value="1">ACER</option>
                        <option value="2">APPLE</option>
                        <option value="3">ASUS</option>
                        <option value="4">DELL</option>
                        <option value="5">GIGABYTE</option>
                        <option value="6">HP</option>
                        <option value="7">LG</option>
                        <option value="8">LENOVO</option>
                        <option value="9">MSI</option>
                    </select>
                </div>
                
                <div class="detail_product-items-item">
                    <label for="giatien">GIÁ TIỀN</label>
                    <input type="number" id="editProduct_giatien" name="editProduct_giatien">
                </div>
            </div>

            <div class="detail_product-items">
                <div class="detail_product-items-item">
                    <label for="cpu">CPU</label>
                    <input type="text" id="editproduct_detail_cpu" name="editproduct_detail_cpu">
                </div>

                <div class="detail_product-items-item">
                    <label for="screen">SCREEN</label>
                    <input type="text" id="editproduct_detail_screen" name="editproduct_detail_screen">
                </div>

                <div class="detail_product-items-item">
                    <label for="ram">RAM</label>
                    <input type="text" id="editproduct_detail_ram" name="editproduct_detail_ram">
                </div>

                <div class="detail_product-items-item">
                    <label for="vga">VGA</label>
                    <input type="text" id="editproduct_detail_vga" name="editproduct_detail_vga">
                </div>

                <div class="detail_product-items-item">
                    <label for="storage">STORAGE</label>
                    <input type="text" id="editproduct_detail_storage" name="editproduct_detail_storage">
                </div>

                <div class="detail_product-items-item">
                    <label for="os">OS</label>
                    <input type="text" id="editproduct_detail_os" name="editproduct_detail_os">
                </div>

                <div class="detail_product-items-item">
                    <label for="pin">PIN</label>
                    <input type="text" id="editproduct_detail_pin" name="editproduct_detail_pin">
                </div>

                <div class="detail_product-items-item">
                    <label for="weight">WEIGHT</label>
                    <input type="text" id="editproduct_detail_weight" name="editproduct_detail_weight">
                </div>

                <div class="detail_product-items-item">
                    <label for="mota">MOTA</label>
                    <textarea type="text" id="editproduct_detail_mota" name="editproduct_detail_mota"></textarea>
                </div>

                <div class="detail_product-items-item">
                    <label for="mau">MÀU</label>
                    <input type="text" id="editproduct_detail_mau" name="editproduct_detail_mau">
                </div>
            </div>
        </div>
        <div class="form-control">
            <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()" value="Hủy">Hủy</button>
            <button class="control-btn-form addproduct_btn_save"  type="Button" onclick="saveEditProduct()" value="Lưu">Lưu edit</button>
        </div>
    </form>
</div>
<script src="static/admin/js/modal_sanpham.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>