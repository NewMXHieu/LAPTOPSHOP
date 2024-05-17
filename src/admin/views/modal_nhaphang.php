<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/admin/css/modal_phieunhap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Modal edit ĐƠN HÀNG</title>
</head>

<body>
    <!-- add phiếu nhập -->
    <div class="modal addphieunhap">
        <form id="editphieunhapform" action="" method="POST">
            <input type="text" id="addphieunhap_id" name="addphieunhap_id" style="display:none">
            <input type="text" id="addphieunhap_tongtien" name="addphieunhap_tongtien" style="display:none">
            <input type="date" id="addphieunhap_ngaynhap" name="addphieunhap_ngaynhap" style="display:none">
            <input type="number" name="detail_nhaphang_soluong" id='detail_nhaphang_soluong' style="display:none">

            <H2 class="edit-product-title">NHẬP SẢN PHẨM</H2>
            <div class="detail_product editphieunhapEdit1">
                <div class="detail_product-items">
                    <div class="detail_product-items-item">
                        <label for="TENNV">MÃ NHÂN VIÊN</label>
                        <input type="number" id="addphieunhap_manv" name="addphieunhap_manv">
                    </div>

                    <div class="detail_product-items-item">
                        <label for="MANCC">NHÀ CUNG CẤP</label>
                        <select name="detail_nhaphang_nhacungcap_select" id="detail_nhaphang_nhacungcap_select" onchange="getDataSPCodeNhap()">
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
                </div>
            </div>

            <div class="detail_product-items dataUpdate1">
                <div class="detail_product-items-title">
                    <h3>NHẬP SẢN PHẨM</h3>
                </div>
                <div class="table-margin">
                    <div class="detail_product-items-table">
                    <table style="width:100%">
                    <thead>
                        <tr>
                            <th>MÃ SẢN PHẨM</th>
                            <th>TÊN SẢN PHẨM</th>
                            <th>NHÀ CUNG CẤP</th>
                            <th>SỐ LƯỢNG</th>
                            <th>MÃ BẢO HÀNH</th>
                            <th>NGÀY SẢN XUẤT</th>
                            <th>CHỨC NĂNG</th>
                        </tr>
                    </thead>
                    <tbody id="dataSpAddPhieuNhap">
                        
                    </tbody>
                </table>
                    </div>
                </div>
            </div>

            <div class="form-control editphieunhapcontrol">
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()" value="Hủy">Hủy</button>
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="savephieunhap()">Lưu</button>
            </div>
        </form>
    </div>

    <!-- edit phiếu nhập -->
    <div class="modal editphieunhap">
        <form id="editphieunhapform" action="" method="POST">
            <input type="text" id="editphieunhap_idphieunhap" name="editphieunhap_idphieunhap" style="display:none">
            <H2 class="edit-product-title">CHI TIẾT PHIẾU NHẬP</H2>
            <div class="detail_product editphieunhapEdit">
                <div class="detail_product-items">
                    <div class="detail_product-items-item">
                        <label for="TENNV">TÊN NHÂN VIÊN</label>
                        <input type="text" id="detailphieunhap_tennhanvien" name="detailphieunhap_tennhanvien">
                    </div>

                    <div class="detail_product-items-item">
                        <label for="NGAYNHAP">NGÀY NHẬP</label>
                        <input type="date" id="detailphieunhap_ngaynhap" name="detailphieunhap_ngaynhap" onchange="checkDate()">
                    </div>

                    <div class="detail_product-items-item">
                        <label for="TONGTIEN">TỔNG TIỀN</label>
                        <input type="text" id="detailphieunhap_tongtien" name="detailphieunhap_tongtien">
                    </div>

                    <div class="detail_product-items-item">
                        <label for="TRANGTHAI">CHỌN TRẠNG THÁI</label>
                        <select id="detailphieunhap_TrangThai" name="detailphieunhap_TrangThai">
                            <option value="0">Chưa xử lý</option>
                            <option value="1">Đã xử lý</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="detail_product-items dataUpdate">
                <div class="detail_product-items-title">
                    <h3>DANH SÁCH SẢN PHẨM NHẬP</h3>
                </div>
                <div class="table-margin">
                    <div class="detail_product-items-table">
                        <table style='width:100%'>
                            <thead>
                                <tr>
                                    <th>MÃ SẢN PHẨM</th>
                                    <th>MÃ NHÀ CUNG CẤP</th>
                                    <th>SỐ LƯỢNG</th>
                                    <th>ĐƠN GIÁ</th>
                                </tr>
                            </thead>

                            <tbody id="dataSanPhamNhap">
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>
                                        <select name="1" id="1">
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
                                    </td>
                                    <td><input type="date" name="1" id="1" ></td>
                                </tr>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
            <div class="form-control editphieunhapcontrol">
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()" value="Hủy">Hủy</button>
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="saveEditphieunhap()">Lưu</button>
            </div>
        </form>
    </div>
    <script src="static/admin/js/modal_nhaphang.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

</body>

</html>