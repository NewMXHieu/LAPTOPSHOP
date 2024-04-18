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

<!-- chi tiết hóa đơn -->
<div class="modal chitiethoadon">
    <div class="modal-close modal-close-DonHang">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <form id="editDonHangform" action="../functions/updateTrangThaiDonHang.php" method="POST">
        <input type="text" id="idDonHang" name="idDonHang" style="display:none">
        <input type="date" id="editDonHang_ngaytaotk" name="editDonHang_ngaytaotk" style="display:none">
        <input type="text" id="editDonHang_trangthai" name="editDonHang_trangthai" style="display:none">
        <H2 class="edit-product-title">CHI TIẾT HÓA ĐƠN</H2>
        <div class="detail_product">
        <div class="detail_product-items">
                <div class="detail_product-items-item">
                    <label for="TENKH">TÊN KHÁCH HÀNG</label>
                    <input type="text" id="detailDonHang_tenkhachhang" name="detailDonHang_tenkhachhang">
                </div>

                <div class="detail_product-items-item">
                    <label for="TENNV">TÊN NHÂN VIÊN</label>
                    <input type="text" id="detailDonHang_tennhanvien" name="detailDonHang_tennhanvien">
                </div>

                <div class="detail_product-items-item">
                    <label for="NGAYTAO">NGÀY</label>
                    <input type="date" id="detailDonHang_ngay" name="detailDonHang_ngay">
                </div>
                
            </div>

            <div class="detail_product-items">
                <div class="detail_product-items-item">
                    <label for="giohang">THÔNG TIN GIỎ HÀNG</label>
                    <input type="text" id="detailDonHang_giohang" name="detailDonHang_giohang" style="display:none">
                </div>

                <div class="detail-giohang-list">
                    <div class="detail-giohang-list-data-item">
                        <div>MÃ SẢN PHẨM</div>
                        <div>SỐ LƯỢNG</div>
                        <div>ĐƠN GIÁ</div>
                    </div>
                    <div id="detail-giohang-list-data">
                        <div class="detail-giohang-list-data-item">
                            <div class="" id="tensp">SP1</div>
                            <div id="soluong">1</div>
                            <div class="" id="dongia">120000000</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="form-control">
            <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()" value="Hủy">Hủy</button>
        </div>
    </form>
</div>
<script src="static/admin/js/modal_DonHang.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>