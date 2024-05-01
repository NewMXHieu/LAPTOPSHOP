<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/admin/css/modal_sanpham.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <title>Modal add NHÂN VIÊN</title>
</head>
<body>

<!-- Thêm NHÂN VIÊN -->
<div class="modal AddNhanVien">
    <div class="modal-close modal-close-nhanvien">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <form action="" method="POST">
        <h2 class="add-product-title">THÊM NHÂN VIÊN</h2>
        <input type="date" id="addNhanVien_ngaytaotk" name="addNhanVien_ngaytaotk" style="display:none">
        <input type="text" id="addNhanVien_trangthai" name="addNhanVien_trangthai" style="display:none">
        <input type="text" id="addNhanVien_taikhoan" name="addNhanVien_taikhoan" style="display:none">
        
        <div class="detail_product">
            <div class="detail_product-items">
                <div class="detail_product-items-item">
                    <label for="ten">TÊN NHÂN VIÊN</label>
                    <input type="text" id="addNhanVien_ten" name="addNhanVien_ten">
                </div>
                <div class="detail_product-items-item">
                    <label for="thuonghieu">LOẠI TÀI KHOẢN</label>
                    <select id="addNhanVien_select_loaitk" name="addNhanVien_select_loaitk">
                        <option value="0" selected>Chọn 1 loại</option>
                        <option value="1">ADMIN</option>
                        <option value="2">QUẢN LÝ</option>
                        <option value="3">KHO</option>
                        <option value="4">THU NGÂN</option>
                    </select>
                </div>

                <div class="detail_product-items-item">
                    <label for="ngaysinh">NGÀY SINH</label>
                    <input type="date" id="addNhanVien_ngaysinh" name="addNhanVien_ngaysinh">
                </div>

                <div class="detail_product-items-item">
                    <label for="sdt">SĐT</label>
                    <input type="number" id="addNhanVien_sdt" name="addNhanVien_sdt">
                </div>
                
                <div class="detail_product-items-item">
                    <label for="diachi">ĐỊA CHỈ</label>
                    <input type="text" id="addNhanVien_diachi" name="addNhanVien_diachi">
                </div>
            </div>

            <div class="detail_product-items">
                <div class="detail_product-items-item">
                    <label for="email">EMAIL</label>
                    <input type="text" id="addNhanVien_email" name="addNhanVien_email">
                </div>

                <div class="detail_product-items-item">
                    <label for="tendn">TÊN ĐĂNG NHẬP</label>
                    <input type="text" id="addNhanVien_tendangnhap" name="addNhanVien_tendangnhap">
                </div>

                <div class="detail_product-items-item">
                    <label for="MK">MẬT KHẨU</label>
                    <input type="text" id="addNhanVien_matkhau" name="addNhanVien_matkhau">
                </div>

            </div>
        </div>
        <div class="form-control">
            <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()" value="Hủy">Hủy</button>
            <button class="control-btn-form addproduct_btn_save" type="Button" onclick="saveNhanVien()" value="Lưu">Lưu</button>
        </div>
    </form>
</div>


<!-- edit NHÂN VIÊN -->
<div class="modal editNhanVien">
    <div class="modal-close modal-close-nhanvien">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <form id="editNhanVienform" action="" method="POST">
        <input type="text" id="idNhanVien" name="idNhanVien" style="display:none">
        <input type="date" id="editNhanVien_ngaytaotk" name="editNhanVien_ngaytaotk" style="display:none">
        <input type="text" id="editNhanVien_trangthai" name="editNhanVien_trangthai" style="display:none">
        <H2 class="edit-product-title">SỬA NHÂN VIÊN</H2>
        <div class="detail_product">
        <div class="detail_product-items">
                <div class="detail_product-items-item">
                    <label for="ten">TÊN NHÂN VIÊN</label>
                    <input type="text" id="editNhanVien_ten" name="editNhanVien_ten">
                </div>
                <div class="detail_product-items-item">
                    <label for="thuonghieu">LOẠI TÀI KHOẢN</label>
                    <select id="editNhanVien_select_loaitk" name="editNhanVien_select_loaitk">
                        <option value="0" selected>Chọn 1 loại</option>
                        <option value="1">ADMIN</option>
                        <option value="2">QUẢN LÝ</option>
                        <option value="3">KHO</option>
                        <option value="4">THU NGÂN</option>
                    </select>
                </div>

                <div class="detail_product-items-item">
                    <label for="ngaysinh">NGÀY SINH</label>
                    <input type="date" id="editNhanVien_ngaysinh" name="editNhanVien_ngaysinh">
                </div>

                <div class="detail_product-items-item">
                    <label for="sdt">SĐT</label>
                    <input type="number" id="editNhanVien_sdt" name="editNhanVien_sdt">
                </div>
                
                <div class="detail_product-items-item">
                    <label for="diachi">ĐỊA CHỈ</label>
                    <input type="text" id="editNhanVien_diachi" name="editNhanVien_diachi">
                </div>

                <div class="detail_product-items-item">
                    <label for="matk">MÃ TÀI KHOẢN</label>
                    <input type="text" id="editNhanVien_taikhoan" name="editNhanVien_taikhoan">
                </div>
            </div>

            <div class="detail_product-items">
                <div class="detail_product-items-item">
                    <label for="email">EMAIL</label>
                    <input type="text" id="editNhanVien_email" name="editNhanVien_email">
                </div>

                <div class="detail_product-items-item">
                    <label for="tendn">TÊN ĐĂNG NHẬP</label>
                    <input type="text" id="editNhanVien_tendangnhap" name="editNhanVien_tendangnhap">
                </div>

                <div class="detail_product-items-item">
                    <label for="MK">MẬT KHẨU</label>
                    <input type="text" id="editNhanVien_matkhau" name="editNhanVien_matkhau">
                </div>

            </div>
        </div>
        <div class="form-control">
            <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()" value="Hủy">Hủy</button>
            <button class="control-btn-form addproduct_btn_save" type="Button" onclick="saveEditNhanVien()" value="Lưu">Lưu edit</button>
        </div>
    </form>
</div>
<script src="static/admin/js/modal_nhanvien.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>