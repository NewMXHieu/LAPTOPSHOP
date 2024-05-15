<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/admin/css/modal_nhomquyen.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Modal phân quyền nhóm quyền</title>
</head>

<body>

    <!-- Thêm Nhóm Quyền -->
    <div class="modal AddPhanQuyen">
        <form class="addNQ" action="" method="POST">
            <h2 style="height: 50px">Thông tin chi tiết</h2>
            <div class="detail-info">
                <div class="form-group1">
                    <label for="permission-id">ID Quyền:</label>
                    <input type="text" id="permission-id" readonly>
                </div>
                <div class="form-group2">
                    <label for="permission-name">Tên nhóm quyền:</label>
                    <input type="text" id="permission-name">
                </div>
                <div class="form-group3">
                    <label for="permission-description">Mô tả:</label>
                    <textarea id="permission-description" name="permission-description"></textarea>
                </div>
            </div>
            <div class="permission-details">
                <h2>Chi tiết quyền</h2>
                <table class="table table-striped">
                    <thead class="table-header">
                        <tr>
                            <th rowspan="2">ID</th>
                            <th rowspan="2">Tên Chức Năng</th>
                            <th colspan="4">Hành động</th>
                        </tr>
                        <tr>
                            <th style="width: 15%">Truy cập</th>
                            <th style="width: 15%">Thêm</th>
                            <th style="width: 15%">Sửa</th>
                            <th style="width: 15%">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Quản lý sản phẩm</td>
                            <td><input type="checkbox" id="add-permission-1"></td>
                            <td><input type="checkbox" id="add-permission-2"></td>
                            <td><input type="checkbox" id="add-permission-3"></td>
                            <td><input type="checkbox" id="add-permission-4"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Quản lý nhân viên</td>
                            <td><input type="checkbox" id="add-permission-5"></td>
                            <td><input type="checkbox" id="add-permission-6"></td>
                            <td><input type="checkbox" id="add-permission-7"></td>
                            <td><input type="checkbox" id="add-permission-8"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Quản lý khách hàng</td>
                            <td><input type="checkbox" id="add-permission-9"></td>
                            <td><input type="checkbox" id="add-permission-10"></td>
                            <td><input type="checkbox" id="add-permission-11"></td>
                            <td><input type="checkbox" id="add-permission-12"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Quản lý đơn hàng</td>
                            <td><input type="checkbox" id="add-permission-13"></td>
                            <td><input type="checkbox" id="add-permission-14"></td>
                            <td><input type="checkbox" id="add-permission-15"></td>
                            <td><input type="checkbox" id="add-permission-16"></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Quản lý nhóm quyền</td>
                            <td><input type="checkbox" id="add-permission-17"></td>
                            <td><input type="checkbox" id="add-permission-18"></td>
                            <td><input type="checkbox" id="add-permission-19"></td>
                            <td><input type="checkbox" id="add-permission-20"></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Quản lý phiếu nhập</td>
                            <td><input type="checkbox" id="add-permission-21"></td>
                            <td><input type="checkbox" id="add-permission-22"></td>
                            <td><input type="checkbox" id="add-permission-23"></td>
                            <td><input type="checkbox" id="add-permission-24"></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Quản lý bảo hành</td>
                            <td><input type="checkbox" id="add-permission-25"></td>
                            <td><input type="checkbox" id="add-permission-26"></td>
                            <td><input type="checkbox" id="add-permission-27"></td>
                            <td><input type="checkbox" id="add-permission-28"></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Thống kê</td>
                            <td><input type="checkbox" id="add-permission-29"></td>
                            <td style="text-align: center;">x</td>
                            <td style="text-align: center;">x</td>
                            <td style="text-align: center;">x</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Mua hàng</td>
                            <td><input type="checkbox" id="add-permission-30"></td>
                            <td style="text-align: center;">x</td>
                            <td style="text-align: center;">x</td>
                            <td style="text-align: center;">x</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-control" style="height: 50px">
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="onClose('add')"
                    value="Hủy">Hủy</button>
                <button class="control-btn-form addproduct_btn_save" type="Button" onclick="AddNhomQuyen()"
                    value="Lưu">Thêm</button>
            </div>
        </form>
    </div>


    <!-- edit NHÂN VIÊN -->
    <div class="modal editPhanQuyen">
        <form class="editNQ" action="" method="POST">
            <h2 style="height: 50px">Thông tin chi tiết</h2>
            <div class="detail-info">
                <div class="form-group1">
                    <label for="permission-id">ID Quyền:</label>
                    <input type="text" id="edit-permission-id" readonly>
                </div>
                <div class="form-group2">
                    <label for="permission-name">Tên nhóm quyền:</label>
                    <input type="text" id="edit-permission-name">
                </div>
                <div class="form-group3">
                    <label for="permission-description">Mô tả:</label>
                    <textarea id="edit-permission-description" name="permission-description"></textarea>
                </div>
            </div>
            <div class="permission-details">
                <h2>Chi tiết quyền</h2>
                <table class="table table-striped">
                    <thead class="table-header">
                        <tr>
                            <th rowspan="2">ID</th>
                            <th rowspan="2">Tên Chức Năng</th>
                            <th colspan="4">Hành động</th>
                        </tr>
                        <tr>
                            <th style="width: 15%">Truy cập</th>
                            <th style="width: 15%">Thêm</th>
                            <th style="width: 15%">Sửa</th>
                            <th style="width: 15%">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dữ liệu bảng được điền vào đây -->
                        <tr>
                            <td>1</td>
                            <td>Quản lý sản phẩm</td>
                            <td><input type="checkbox" id="edit-permission-1"></td>
                            <td><input type="checkbox" id="edit-permission-2"></td>
                            <td><input type="checkbox" id="edit-permission-3"></td>
                            <td><input type="checkbox" id="edit-permission-4"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Quản lý nhân viên</td>
                            <td><input type="checkbox" id="edit-permission-5"></td>
                            <td><input type="checkbox" id="edit-permission-6"></td>
                            <td><input type="checkbox" id="edit-permission-7"></td>
                            <td><input type="checkbox" id="edit-permission-8"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Quản lý khách hàng</td>
                            <td><input type="checkbox" id="edit-permission-9"></td>
                            <td><input type="checkbox" id="edit-permission-10"></td>
                            <td><input type="checkbox" id="edit-permission-11"></td>
                            <td><input type="checkbox" id="edit-permission-12"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Quản lý đơn hàng</td>
                            <td><input type="checkbox" id="edit-permission-13"></td>
                            <td><input type="checkbox" id="edit-permission-14"></td>
                            <td><input type="checkbox" id="edit-permission-15"></td>
                            <td><input type="checkbox" id="edit-permission-16"></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Quản lý nhóm quyền</td>
                            <td><input type="checkbox" id="edit-permission-17"></td>
                            <td><input type="checkbox" id="edit-permission-18"></td>
                            <td><input type="checkbox" id="edit-permission-19"></td>
                            <td><input type="checkbox" id="edit-permission-20"></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Quản lý phiếu nhập</td>
                            <td><input type="checkbox" id="edit-permission-21"></td>
                            <td><input type="checkbox" id="edit-permission-22"></td>
                            <td><input type="checkbox" id="edit-permission-23"></td>
                            <td><input type="checkbox" id="edit-permission-24"></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Quản lý bảo hành</td>
                            <td><input type="checkbox" id="edit-permission-25"></td>
                            <td><input type="checkbox" id="edit-permission-26"></td>
                            <td><input type="checkbox" id="edit-permission-27"></td>
                            <td><input type="checkbox" id="edit-permission-28"></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Thống kê</td>
                            <td><input type="checkbox" id="edit-permission-29"></td>
                            <td style="text-align: center;">x</td>
                            <td style="text-align: center;">x</td>
                            <td style="text-align: center;">x</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Mua hàng</td>
                            <td><input type="checkbox" id="edit-permission-30"></td>
                            <td style="text-align: center;">x</td>
                            <td style="text-align: center;">x</td>
                            <td style="text-align: center;">x</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-control" style="height: 50px">
                <button class="control-btn-form addproduct_btn_cancel" type="Button" onclick="onClose('edit')"
                    value="Hủy">Hủy</button>
                <button class="control-btn-form addproduct_btn_save" type="Button" onclick="saveEditNhomQuyen()"
                    value="Lưu">Lưu</button>
            </div>
        </form>
    </div>
    <script src="static/admin/js/modal_nhomquyen.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>