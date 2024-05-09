<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/admin/css/modal_baohanh.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Modal edit ĐƠN HÀNG</title>
</head>

<body>
    <!-- add phiếu nhập -->
    <div class="modal addbaohanh">
        <div class="modal-close modal-close-baohanh">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <form id="addbaohanhform" action="" method="POST">
            <H2 class="edit-product-title">THÊM BẢO HÀNH</H2>
            <div class="detail_product chitiethd">
                <div class="detail_product-items">
                    <div class="detail_product-items-item ">
                        <label for="TENNV">MÃ NHÂN VIÊN</label>
                        <input type="text" id="addbaohanh_tennhanvien" name="addbaohanh_tennhanvien">
                    </div>

                    <div class="detail_product-items-item">
                        <label for="DVBH">ĐƠN VỊ BẢO HÀNH</label>
                        <select name="addbaohanh_dvbh" id="addbaohanh_dvbh">
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
                        <label for="TONGTIEN">THỜI HẠN (NĂM)</label>
                        <input type="number" id="addbaohanh_thoihan" name="addbaohanh_thoihan">
                    </div>

                    
                </div>
            </div>
            <!-- <div class="detail_product-items dataUpdate">
                <div class="detail_product-items-title">
                    <h3>DANH SÁCH THÔNG TIN BẢO HÀNH ĐÃ CÓ</h3>
                </div>
                <div class="table-margin">
                    <div class="detail_product-items-table">
                        <table style='width:100%'>
                            <thead>
                                <tr>
                                    <th>MÃ BẢO HÀNH</th>
                                    <th>MÃ NHÂN VIÊN</th>
                                    <th>ĐƠN VỊ BẢO HÀNH</th>
                                    <th>THỜI HẠN</th>
                                    <th>TRẠNG THÁI</th>
                                </tr>
                            </thead>

                            <tbody id="databaohanh">
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div> -->
            <div class="form-control">
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()" value="Hủy">Hủy</button>
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="savebaohanh()">Lưu</button>
            </div>
        </form>
    </div>

    <!-- edit phiếu nhập -->
    <div class="modal editbaohanh">
        <div class="modal-close modal-close-baohanh">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <form id="editbaohanhform" action="" method="POST">
            <input type="text" id="editbaohanh_idbaohanh" name="editbaohanh_idbaohanh" style="display:none">
            <H2 class="edit-product-title">CHI TIẾT BẢO HÀNH</H2>
            <div class="detail_product chitiethd">
                <div class="detail_product-items">
                    <div class="detail_product-items-item ">
                        <label for="TENNV">MÃ NHÂN VIÊN</label>
                        <input type="text" id="detailbaohanh_tennhanvien" name="detailbaohanh_tennhanvien">
                    </div>

                    <div class="detail_product-items-item">
                        <label for="DVBH">ĐƠN VỊ BẢO HÀNH</label>
                        <select name="detailbaohanh_dvbh" id="detailbaohanh_dvbh">
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
                        <label for="TONGTIEN">THỜI HẠN (NĂM)</label>
                        <input type="number" id="detailbaohanh_thoihan" name="detailbaohanh_thoihan">
                    </div>

                    <div class="detail_product-items-item">
                        <label for="TRANGTHAI">CHỌN TRẠNG THÁI</label>
                        <select id="detailbaohanh_TrangThai" name="detailbaohanh_TrangThai">
                            <option value="0">Đã Khóa</option>
                            <option value="1">Hoạt động</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- <div class="detail_product-items dataUpdate">
                <div class="detail_product-items-title">
                    <h3>DANH SÁCH THÔNG TIN BẢO HÀNH ĐÃ CÓ</h3>
                </div>
                <div class="table-margin">
                    <div class="detail_product-items-table">
                        <table style='width:100%'>
                            <thead>
                                <tr>
                                    <th>MÃ BẢO HÀNH</th>
                                    <th>MÃ NHÂN VIÊN</th>
                                    <th>ĐƠN VỊ BẢO HÀNH</th>
                                    <th>THỜI HẠN</th>
                                    <th>TRẠNG THÁI</th>
                                </tr>
                            </thead>

                            <tbody id="databaohanh">
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div> -->
            <div class="form-control">
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="finish()" value="Hủy">Hủy</button>
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="saveEditBaoHanh()">Lưu</button>
            </div>
        </form>
    </div>
    <script src="static/admin/js/modal_baohanh.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

</body>

</html>