const LIST_MA_TRUY_CAP = [1, 5, 9, 13, 17, 21, 25, 29, 30];
let btnAddPhanQuyen = document.getElementById("addNewPhanQuyen");
btnAddPhanQuyen.addEventListener('click', () => {
    document.getElementById("permission-id").value = phanQuyen.length + 1;
    // for (let i = 1; i <= 30; i++) {
    //     let checkbox = document.getElementById('add-permission-' + i);
    //     if ([1, 5, 9, 13, 17, 21, 25, 29].includes(i)) {
    //         console.log(checkbox.checked);
    //         // If the checkbox is not checked, disable the next 3 checkboxes
    //         if (!checkbox.checked) {
    //             for (let j = i + 1; j <= i + 3 && j <= 30; j++) {
    //                 let nextCheckbox = document.getElementById('add-permission-' + j);
    //                 nextCheckbox.disabled = true;
    //             }
    //         } else if(checkbox.checked) {
    //             // If the checkbox is checked, enable the next 3 checkboxes
    //             for (let j = i + 1; j <= i + 3 && j <= 30; j++) {
    //                 let nextCheckbox = document.getElementById('add-permission-' + j);
    //                 nextCheckbox.disabled = false;
    //             }
    //         }
    //     }
    // }
    initStateForDisabledCheckbox('add');
    document.querySelector(".AddPhanQuyen").classList.add("open");
    addEventListenersForTruyCap('add');
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
    addEventListenersForTruyCap('edit')
}
function updateCheckboxes(manhomquyen) {
    $.post({
        url: 'src/admin/functions/getDsQuyenTheoNhomQuyen.php',
        data: { idNhomQuyen: manhomquyen },
        success: response => {
            let maquyens = JSON.parse(response);

            maquyens.forEach(maquyen => {
                let checkbox = document.getElementById('edit-permission-' + maquyen);
                checkbox.checked = true;
            });
            initStateForDisabledCheckbox('edit');

        },
        error: () => {
            console.error('Error fetching MAQUYEN');
        }
    });
}

function initStateForDisabledCheckbox(type) {
    const idTruyCapCheckboxs = LIST_MA_TRUY_CAP.map(val => `${type}-permission-${val}`);


    if (type === 'edit') {
        idTruyCapCheckboxs.forEach(val =>{
            const checkboxEle = document.getElementById(val);
            const isChecked = checkboxEle.checked;
            if(!isChecked) {
                const closestTr = checkboxEle.closest('tr');
                closestTr.querySelectorAll('input[type=checkbox]').forEach(checkbox => {
                    checkbox.disabled = checkbox !== checkboxEle;
                })
            }
        })
    } else {

        document.querySelectorAll(`input[type="checkbox"][id^="${type}-permission-"]`).forEach(checkbox => {
            if (!idTruyCapCheckboxs.includes(checkbox.id)) {
                checkbox.disabled = true;
            }
        });
    }
}

function addEventListenersForTruyCap(type) {
    LIST_MA_TRUY_CAP.forEach(maTruyCap => {
        let checkbox = document.getElementById(`${type}-permission-` + maTruyCap);
        checkbox.addEventListener('change', (event) => {
            toggleNextThreeCheckboxes(checkbox, event.target.checked);
        });
    });
}

function toggleNextThreeCheckboxes(checkbox, checkState) {
    // select siblings input elements
    const tRowElement = checkbox.closest('tr');
    const siblings = tRowElement.querySelectorAll('input[type="checkbox"]');
    // loop through siblings
    siblings.forEach(sibling => {
        if (sibling !== checkbox) {
            sibling.disabled = !checkState;
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
        success: function (response) {
            // Handle the response from the server
            console.log(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Handle any errors
            console.error(textStatus, errorThrown);
        }
    });
}

function onClose(type) {
    // query all input has id start with edit-permission
    finish()
    document.querySelectorAll(`input[id^="${type}-permission-"]`).forEach(checkbox => {
        checkbox.checked = false;
        checkbox.disabled = false;
    });
}