<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/admin/css/modal_sanpham.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <title>Modal add KHÁCH HÀNG</title>
</head>
<body>

<!-- Thêm KHÁCH HÀNG --> 
<div class="modal AddKhachHang">
    <div class="modal-close modal-close-khachhang">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <form action="" method="POST">
        <h2 class="add-product-title">THÊM KHÁCH HÀNG</h2>
        <input type="date" id="addKhachHang_ngaytaotk" name="addKhachHang_ngaytaotk" style="display:none">
        <input type="text" id="addKhachHang_trangthai" name="addKhachHang_trangthai" style="display:none">
        <input type="text" id="addKhachHang_taikhoan" name="addKhachHang_taikhoan" style="display:none">
        
        <div class="detail_product">
            <div class="detail_product-items">
                <div class="detail_product-items-item">
                    <label for="ten">TÊN KHÁCH HÀNG</label>
                    <input type="text" id="addKhachHang_ten" name="addKhachHang_ten">
                </div>
                <div class="detail_product-items-item">
                    <label for="ngaysinh">NGÀY SINH</label>
                    <input type="date" id="addKhachHang_ngaysinh" name="addKhachHang_ngaysinh">
                </div>

                <div class="detail_product-items-item">
                    <label for="sdt">SĐT</label>
                    <input type="number" id="addKhachHang_sdt" name="addKhachHang_sdt">
                </div>
                
                <div class="detail_product-items-item">
                    <label for="diachi">ĐỊA CHỈ</label>
                    <input type="text" id="addKhachHang_diachi" name="addKhachHang_diachi">
                </div>
            </div>

            <div class="detail_product-items">
                <div class="detail_product-items-item">
                    <label for="email">EMAIL</label>
                    <input type="text" id="addKhachHang_email" name="addKhachHang_email">
                </div>

                <div class="detail_product-items-item">
                    <label for="tendn">TÊN ĐĂNG NHẬP</label>
                    <input type="text" id="addKhachHang_tendangnhap" name="addKhachHang_tendangnhap">
                </div>

                <div class="detail_product-items-item">
                    <label for="MK">MẬT KHẨU</label>
                    <input type="text" id="addKhachHang_matkhau" name="addKhachHang_matkhau">
                </div>

            </div>
        </div>
        <div class="form-control">
            <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()" value="Hủy">Hủy</button>
            <button class="control-btn-form addproduct_btn_save" type="Button" onclick="saveKhachHang()"value="Lưu">Lưu</button>
        </div>
    </form>
</div>


<!-- edit KHÁCH HÀNG -->
<div class="modal editKhachHang">
    <div class="modal-close modal-close-khachhang">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <form id="editKhachHangform" action="" method="POST">
        <input type="text" id="idKhachHang" name="idKhachHang" style="display:none">
        <input type="date" id="editKhachHang_ngaytaotk" name="editKhachHang_ngaytaotk" style="display:none">
        <input type="text" id="editKhachHang_trangthai" name="editKhachHang_trangthai" style="display:none">
        <H2 class="edit-product-title">SỬA KHÁCH HÀNG</H2>
        <div class="detail_product">
        <div class="detail_product-items">
                <div class="detail_product-items-item">
                    <label for="ten">TÊN KHÁCH HÀNG</label>
                    <input type="text" id="editKhachHang_ten" name="editKhachHang_ten">
                </div>

                <div class="detail_product-items-item">
                    <label for="ngaysinh">NGÀY SINH</label>
                    <input type="date" id="editKhachHang_ngaysinh" name="editKhachHang_ngaysinh">
                </div>

                <div class="detail_product-items-item">
                    <label for="sdt">SĐT</label>
                    <input type="number" id="editKhachHang_sdt" name="editKhachHang_sdt">
                </div>
                
                <div class="detail_product-items-item">
                    <label for="diachi">ĐỊA CHỈ</label>
                    <input type="text" id="editKhachHang_diachi" name="editKhachHang_diachi">
                </div>

                <div class="detail_product-items-item">
                    <label for="matk">MÃ TÀI KHOẢN</label>
                    <input type="text" id="editKhachHang_taikhoan" name="editKhachHang_taikhoan">
                </div>
            </div>

            <div class="detail_product-items">
                <div class="detail_product-items-item">
                    <label for="email">EMAIL</label>
                    <input type="text" id="editKhachHang_email" name="editKhachHang_email">
                </div>

                <div class="detail_product-items-item">
                    <label for="tendn">TÊN ĐĂNG NHẬP</label>
                    <input type="text" id="editKhachHang_tendangnhap" name="editKhachHang_tendangnhap">
                </div>

                <div class="detail_product-items-item">
                    <label for="MK">MẬT KHẨU</label>
                    <input type="text" id="editKhachHang_matkhau" name="editKhachHang_matkhau">
                </div>

            </div>
        </div>
        <div class="form-control">
            <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()" value="Hủy">Hủy</button>
            <button class="control-btn-form addproduct_btn_save" type="Button" onclick="saveEditKhachHang()" value="Lưu">Lưu edit</button>
        </div>
    </form>
</div>
<script src="static/admin/js/modal_KhachHang.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>