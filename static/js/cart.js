let currentPrices = {};

function updateCart(productId, quantity, method, isChecked = null) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/laptopshop/config/update_cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (this.status === 200) {
            try {
                const response = JSON.parse(this.responseText);
                if (response && response.quantity && response.total && response.checkout !== null) {
                    console.log(response.quantity, response.total, response.checkout);
                    let quantityElement = document.querySelector('.quanlity p[data-id="' + productId + '"]');
                    if (quantityElement) {
                        quantityElement.textContent = response.quantity;
                    }
                    let totalElement = document.querySelector('.product-total[data-id="' + productId + '"]');
                    if (totalElement) {
                        totalElement.textContent = Number(response.total).toLocaleString('vi-VN') + 'đ';
                    }
                    let tienElement = document.querySelector('.total-price');
                    if(tienElement && checkout !== null){
                        tienElement.textContent = 'Tổng cộng:' + Number(response.checkout).toLocaleString('vi-VN') + 'đ';
                    }
                } else {
                    console.error('Response does not contain quantity or total:', response);
                }
            } catch (error) {
                console.error('Error parsing JSON:', error);
                console.error('Response:', this.responseText);
            }
        }else{
            console.error('Error:', this.status);
            console.error('Response:', this.responseText);
        }
    }
    let data = `productId=${productId}&quantity=${quantity}&method=${method}`;
    if (isChecked !== null) {
        data += `&checked=${isChecked}`;
    }
    xhr.send(data);
}

document.querySelectorAll('.minus, .plus').forEach(button => {
    button.addEventListener('click', (event) => {
        console.log('da vao');
        const productId = event.target.getAttribute('data-id');
        const quantityElement = event.target.closest('.cart-item').querySelector('.quanlity p');
        if (quantityElement) {
            let quantity = parseInt(quantityElement.textContent);
            let method;
            if (event.target.classList.contains('minus')) {
                quantity = Math.max(1, quantity - 1);
                method = 'minus';
            } else {
                quantity += 1;
                method = 'plus';
            }
            quantityElement.textContent = quantity;
            console.log(productId, quantity, method);
            updateCart(productId, quantity, method);
        }
    });
});

document.querySelectorAll('.checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', (event) => {
        const productId = event.target.getAttribute('data-id');
        const quantityElement = event.target.closest('.cart-item').querySelector('.product-quantity p');
        if (quantityElement) {
            quantity = parseInt(quantityElement.textContent);
            const method = 'checkbox';
            const isChecked = event.target.checked;
            updateCart(productId, quantity, method, isChecked);
        }
    });
});



function fetchCurrentPrices() {
    document.querySelectorAll('.cart-item').forEach(item => {
        const productId = item.getAttribute('data-id');
        const totalElement = item.querySelector('.product-total');
        if (totalElement) {
            const totalText = totalElement.textContent;
            const price = totalText.match(/\d+/g).pop();
            currentPrices[productId] = price;
        }
    });
}
document.addEventListener('DOMContentLoaded', fetchCurrentPrices);