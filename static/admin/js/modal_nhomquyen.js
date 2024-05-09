let btnAddPhanQuyen = document.getElementById("addNewPhanQuyen");
btnAddPhanQuyen.addEventListener('click', () => {
    document.getElementById("permission-id").value = phanQuyen.length + 1;
    document.querySelector(".AddPhanQuyen").classList.add("open");
})
var indexNQ;
function editPhanQuyen(id) {
    let index = phanQuyen.findIndex(item => {
        return item.MANHOMQUYEN == id
    })
    indexNQ = index;
    document.getElementById("edit-permission-id").value = phanQuyen[index].MANHOMQUYEN;
    document.querySelector(".editPhanQuyen").classList.add("open");
    document.getElementById("edit-permission-name").value = phanQuyen[index].TENNHOMQUYEN;
    document.getElementById("edit-permission-description").value = phanQuyen[index].MOTA;
    updateCheckboxes(phanQuyen[index].MANHOMQUYEN);
}
function updateCheckboxes(manhomquyen) {
    $.post({
        url: 'src/admin/functions/getDsQuyenTheoNhomQuyen.php',
        data: { idNhomQuyen: manhomquyen },
        success: response => {
            let maquyens = JSON.parse(response);
            for (let i = 1; i <= 30; i++) {
                let checkbox = document.getElementById('edit-permission-' + i);
                if (maquyens.includes(i.toString())) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
            }
        },
        error: () => {
            console.error('Error fetching MAQUYEN');
        }
    });
}

function saveEditNhomQuyen() {
    let idNhomQuyen = document.getElementById("edit-permission-id").value;
    let tenNhomQuyen = document.getElementById("edit-permission-name").value;
    let moTa = document.getElementById("edit-permission-description").value;
    let maquyens = [];
    for (let i = 1; i <= 30; i++) {
        let checkbox = document.getElementById('edit-permission-' + i);
        if (checkbox.checked) {
            maquyens.push(i.toString());
        } else {
            let index = maquyens.indexOf(i.toString());
            if (index !== -1) {
                maquyens.splice(index, 1);
            }
        }
    }

    $.ajax({
        url: 'api/admin/saveEditNhomQuyen.php',
        type: 'POST',
        data: { idNhomQuyen: idNhomQuyen, tenNhomQuyen: tenNhomQuyen, moTa: moTa, maquyens: maquyens },
        success: function (data) {
            console.log(data);
            getDsPhanQuyen();
            document.querySelector(".editPhanQuyen").classList.remove("open");
        },
        error: function (xhr, status, error) {
            console.error('Error sending request to PHP:', error);
        }
    });

}
function AddNhomQuyen() {
    let idNhomQuyen = document.getElementById("permission-id").value;
    let tenNhomQuyen = document.getElementById("permission-name").value;
    let moTa = document.getElementById("permission-description").value;
    let maquyens = [];
    for (let i = 1; i <= 30; i++) {
        let checkbox = document.getElementById('add-permission-' + i);
        if (checkbox.checked) {
            maquyens.push(i.toString());
        }
    }
    $.ajax({
        url: 'api/admin/addNhomQuyen.php',
        type: 'POST',
        data: { idNhomQuyen: idNhomQuyen, tenNhomQuyen: tenNhomQuyen, moTa: moTa, maquyens: maquyens },
        success: function (data) {
            console.log(data);
            getDsPhanQuyen();
            document.querySelector(".AddPhanQuyen").classList.remove("open");
        },
        error: function (xhr, status, error) {
            console.error('Error sending request to PHP:', error);
        }
    });
}
function deletePhanQuyen(id) {
    let index = phanQuyen.findIndex(item => {
        return item.MANHOMQUYEN == id
    })
    if (confirm("Xóa nhóm quyền " + phanQuyen[index].MANHOMQUYEN + " ?")) {
        deleteStatusPhanQuyen(phanQuyen[index].MANHOMQUYEN);
        alert("Đã Xóa nhóm quyền " + phanQuyen[index].MANHOMQUYEN + " thành công");
        getDsPhanQuyen();
    }
}

function deleteStatusPhanQuyen(id) {
    $.ajax({
        url: 'api/admin/deleteNhomQuyen.php',
        type: 'POST',
        data: { idNhomQuyen: id },
        success: function(response) {
            // Handle the response from the server
            console.log(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle any errors
            console.error(textStatus, errorThrown);
        }
    });
}