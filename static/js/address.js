let provinces = []
let districts = []
let wards = []

const selectProvincesEleId = 'province'
const selectDistrictEleId = 'district'
const selectWardEleId = 'ward'

const defaultSelectValueMapping = {
    [selectProvincesEleId]: '<option disabled selected hidden value="">Tỉnh/TP</option>',
    [selectDistrictEleId]: '<option disabled selected hidden value="">Quận/huyện</option>',
    [selectWardEleId]: '<option disabled selected hidden value="">Phường/xã</option>'
}

const getProvinces = async () => {
    const res = await fetch('static/json/tinh_tp.json')
    const data = await res.json()
    return data
}

const getListDistrict = async () => {
    const res = await fetch('static/json/quan_huyen.json')
    const data = await res.json()
    return data
}

const getListWard = async () => {
    const res = await fetch('static/json/xa_phuong.json')
    const data = await res.json()
    return data
}

const getAllVietNamAddresses = async () => {
    [provinces, districts, wards] = await Promise.all([
        getProvinces(),
        getListDistrict(),
        getListWard()
    ])
}

function appendSelectItem(listItem, selectEleId) {
    if(listItem.length <= 0 || !selectEleId) {
        return
    }

    const selectEle = document.getElementById(selectEleId)
    if(!selectEleId) {
        return
    }
    resetSelectEle(selectEleId)

    listItem.forEach(item => {
        const option = document.createElement('option')
        option.value = item.nwt
        option.text = item.nwt
        option.dataset.id = item.cod
        selectEle.appendChild(option)
    })
}

function resetSelectEle(selectEleId) {
    const selectEle = document.getElementById(selectEleId)
    selectEle.innerHTML = defaultSelectValueMapping[selectEleId]
}


getAllVietNamAddresses().then(() => {
    appendSelectItem(provinces, selectProvincesEleId)

    const selectProvincesEle = document.getElementById(selectProvincesEleId)
    selectProvincesEle.addEventListener('change', (e) => {
        // remove all child inside of e.target except first one
        // get dataset-id of the selected option

        resetSelectEle(selectDistrictEleId)
        resetSelectEle(selectWardEleId)
        const provinceCodeId = e.target.selectedOptions[0].dataset.id
        const districtList = districts.filter(district => district.pcod === provinceCodeId)
        appendSelectItem(districtList, selectDistrictEleId)
    })

    const selectDistrictEle = document.getElementById(selectDistrictEleId)
    selectDistrictEle.addEventListener('change', (e) => {
        resetSelectEle(selectWardEleId)
        const districtCodeId = e.target.selectedOptions[0].dataset.id
        const wardList = wards.filter(ward => ward.pcod === districtCodeId)
        appendSelectItem(wardList, selectWardEleId)
    })
})
