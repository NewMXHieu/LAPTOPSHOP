<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/admin/css/modal_sanpham.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Modal edit ĐƠN HÀNG</title>
</head>

<body>

    <!-- chi tiết hóa đơn -->
    <div class="modal chitiethoadon">
        <div class="modal-close modal-close-DonHang">
            <i class="fa-solid fa-xmark"></i>
        </div>

        <form id="editphieunhapform" action="" method="POST">
            <input type="text" id="idDonHang" name="idDonHang" style="display:none">
            <H2 class="edit-product-title">CHI TIẾT HÓA ĐƠN</H2>
            <div class="detail_product editdonhang3">
                <div class="detail_product-items">
                    <div class="detail_product-items-item">
                        <label for="TENKH">KHÁCH HÀNG</label>
                        <input type="text" id="detailDonHang_tenkhachhang" name="detailDonHang_tenkhachhang">
                    </div>

                    <div class="detail_product-items-item">
                        <label for="TENNV">NHÂN VIÊN</label>
                        <input type="text" id="detailDonHang_tennhanvien" name="detailDonHang_tennhanvien">
                    </div>

                    <div class="detail_product-items-item">
                        <label for="NGAYTAO">NGÀY</label>
                        <input type="date" id="detailDonhang_ngay" name="detailDonhang_ngay">
                    </div>

                    
                </div>
                <div class="detail_product-items">
                <div class="detail_product-items-item">
                        <label for="SHIPPER">CHỌN SHIPPER</label>
                        <select id="detailDonHang_shipper" name="detailDonHang_shipper">
                            <option value="0">Chưa chọn</option>
                        </select>
                    </div>
                    <div class="detail_product-items-item">
                        <label for="SHIPPER">TỔNG TIỀN</label>
                        <input type="text" id="detailDonHang_tongtien" name="detailDonHang_tongtien">
                    </div>

                    <div class="detail_product-items-item">
                        <label for="TRANGTHAI">CHỌN TRẠNG THÁI</label>
                        <select id="detailDonHang_TrangThai" name="detailDonHang_TrangThai">
                            <option value="0">Chưa xử lý</option>
                            <option value="1">Đã xử lý</option>
                            <option value="2">Đang giao hàng</option>
                            <option value="3">Đã hủy</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="detail_product-items donhangtable5">
                <div class="detail_product-items-title">
                    <h3>THÔNG TIN GIỎ HÀNG</h3>
                </div>
                <div class="table-margin">
                    <div class="detail_product-items-table">
                        <table style='width:100%'>
                            <thead>
                                <tr>
                                    <th>MÃ SẢN PHẨM</th>
                                    <th>MÃ SERIAL</th>
                                    <th>ĐƠN GIÁ</th>
                                </tr>
                            </thead>

                            <tbody id="detail-giohang-list-data">
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="form-control editphieunhapcontrol">
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()" value="Hủy">Hủy</button>
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="saveEditDonHang()">Lưu</button>
            </div>
        </form>

        <!-- <form id="editDonHangform" action="" method="POST">
            
            <div class="detail_product">
                <div class="detail_product-items">
                    
                </div>

                <div class="detail_product-items">
                    <div class="detail_product-items-item">
                        <label for="giohang"></label>
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
                                <div class="" id="tensp"></div>
                                <div id="soluong"></div>
                                <div class="" id="dongia"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="form-control">
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()"
                    value="Hủy">Hủy</button>
                <button class="control-btn-form addproduct_btn_cancel" type="Button"
                    onclick="saveEditDonHang()">Lưu</button>
            </div>
        </form> -->
    </div>
    <script src="static/admin/js/modal_DonHang.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>