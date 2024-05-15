<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Modal add TÀI KHOẢN</title>
</head>

<body>

    <!-- add Tài Khoản -->
    <div class="modal addTaiKhoan">
        <form action="" method="POST" class="addTKform">
            <H2 class="add-product-title" style="height: 50px">Thêm Tài Khoản</H2>
            <div class="addTK">
                <input type="date" id="addTaiKhoan_ngaytao" name="addTaiKhoan_ngaytao" style="display: none">
                <div class="detail_product-items">
                    <div class="detail_product-items-item">
                        <label for="ten">MÃ TÀI KHOẢN</label>
                        <input type="text" id="addTaiKhoan_id" name="addTaiKhoan_id">
                    </div>
                    <div class="detail_product-items-item">
                        <label for="ten">TÊN ĐĂNG NHẬP</label>
                        <input type="text" id="addTaiKhoan_ten" name="addTaiKhoan_ten">
                    </div>
                    <div class="detail_product-items-item">
                        <label for="matkhau">MẬT KHẨU</label>
                        <input type="text" id="addTaiKhoan_matkhau" name="addTaiKhoan_matkhau">
                    </div>
                    <div class="detail_product-items-item">
                        <label for="thuonghieu">NHÓM QUYỀN</label>
                        <select id="addTaiKhoan_select_loainhomquyen" name="addTaiKhoan_select_loainhomquyen">
                            <option value="1">Admin</option>
                            <option value="2">Nhân Viên</option>
                            <option value="3">Khách Hàng</option>
                        </select>
                    </div>
                    <div class="detail_product-items-item">
                        <label for="trangthai">TRẠNG THÁI</label>
                        <select id="addTaiKhoan_select_trangthai" name="addTaiKhoan_select_trangthai">
                            <option value="1">Hoạt Động</option>
                            <option value="0">Khóa</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-control" style="height: 50px">
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()"
                    value="Hủy">Hủy</button>
                <button class="control-btn-form addproduct_btn_save" type="Button" onclick="saveTaiKhoan()"
                    value="Lưu">Lưu</button>
            </div>
        </form>
    </div>

    <!-- edit Tài Khoản -->
    <div class="modal editTaiKhoan">
        <form class="editTKform" action="" method="POST">
            <input type="text" id="idTaiKhoan" name="idTaiKhoan" style="display:none">
            <H2 class="edit-product-title" style="height: 50px">Sửa Tài Khoản</H2>
            <div class="addTK">
                <div class="detail_product-items">
                    <div class="detail_product-items-item">
                        <label for="ten">MÃ TÀI KHOẢN</label>
                        <input type="text" id="editTaiKhoan_id" name="addTaiKhoan_id" readonly>
                    </div>
                    <div class="detail_product-items-item">
                        <label for="ten">TÊN ĐĂNG NHẬP</label>
                        <input type="text" id="editTaiKhoan_ten" name="editTaiKhoan_ten">
                    </div>
                    <div class="detail_product-items-item">
                        <label for="matkhau">MẬT KHẨU</label>
                        <input type="text" id="editTaiKhoan_matkhau" name="editTaiKhoan_matkhau">
                    </div>
                    <div class="detail_product-items-item">
                        <label for="ngaytao">NGÀY TẠO</label>
                        <input type="date" id="editTaiKhoan_ngaytao" name="editTaiKhoan_ngaytao">
                    </div>
                    <div class="detail_product-items-item">
                        <label for="thuonghieu">NHÓM QUYỀN</label>
                        <select id="editTaiKhoan_select_loainhomquyen" name="editTaiKhoan_select_loainhomquyen">
                            <option value="1">Admin</option>
                            <option value="2">Nhân Viên</option>
                            <option value="3">Khách Hàng</option>
                        </select>
                    </div>
                    <div class="detail_product-items-item">
                        <label for="trangthai">TRẠNG THÁI</label>
                        <select id="editTaiKhoan_select_trangthai" name="editTaiKhoan_select_trangthai">
                            <option value="1">Hoạt Động</option>
                            <option value="0">Khóa</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-control" style="height: 50px">
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()"
                    value="Hủy">Hủy</button>
                <button class="control-btn-form addproduct_btn_save" type="Button" onclick="saveEditTaiKhoan()"
                    value="Lưu">Lưu edit</button>
            </div>
        </form>
    </div>
    <script src="static/admin/js/modal_taikhoan.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>