let products = [];

function fetchCurrentPrices() {
    const cartItems = document.querySelectorAll('.cart-item');
    console.log("da vao");
    cartItems.forEach(item => {
        const id = item.querySelector('.checkbox').getAttribute('data-id');
        const isChecked = item.querySelector('.checkbox').checked;
        const price = parseInt(item.querySelector('.product-price').textContent.replace(/\D/g, ''));
        const quantity = parseInt(item.querySelector('.quanlity p').textContent);
        const total = price * quantity;
        let product = {
            id: id,
            total: total,
            isChecked: isChecked,
            quantity: quantity
        };
        products.push(product);
    });
    console.log(products);
}

function getProductById(id) {
    return products.find(product => product.id === id);
}

function updateCart(productId, quantity, method, isChecked = null) {
    console.log('updateCart:', productId, quantity, method, isChecked);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/laptopshop/config/update_cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (this.status === 200) {
            try {
                const response = JSON.parse(this.responseText);
                const product = getProductById(productId);
                if (isChecked !== null) {
                    product.isChecked = isChecked;
                }
                if (response && response.quantity && response.total && response.checkout) {
                    console.log(response.quantity, response.total, response.checkout);
                    let quantityElement = document.querySelector('.quanlity p[data-id="' + productId + '"]');
                    if (quantityElement) {
                        product.quantity = response.quantity;
                        product.total = response.checkout;
                        quantityElement.textContent = product.quantity;
                    }
                    let totalElement = document.querySelector('.product-total[data-id="' + productId + '"]');
                    if (totalElement) {
                        product.total = response.total;
                        totalElement.textContent = Number(product.total).toLocaleString('vi-VN') + 'đ';
                    }
                    let tienElement = document.querySelector('.total-price');
                    if (tienElement && isChecked !==null || tienElement && product.isChecked === true) {
                        let totalprice = parseInt(tienElement.textContent.replace(/\D/g, ''));
                        console.log('totalprice:', totalprice);
                        if (product) {
                            if (product.isChecked) {
                                console.log('isChecked:', product.isChecked);
                                if(method === 'checkbox'){
                                    totalprice = totalprice + product.total;
                                }else if(method === 'plus'){
                                    totalprice = totalprice + product.total/product.quantity;
                                }else if(method === 'minus'){
                                    totalprice = totalprice - product.total/product.quantity;
                                }
                                tienElement.textContent = 'Tổng cộng:' + Number(totalprice).toLocaleString('vi-VN') + 'đ';
                            } else {
                                console.log('isChecked:', product.isChecked);
                                totalprice = totalprice - product.total;
                                tienElement.textContent = 'Tổng cộng:' + Number(totalprice).toLocaleString('vi-VN') + 'đ';
                            }
                        }
                    }
                    console.log('product:', product);
                } else {
                    console.error('Response does not contain quantity or total:', response);
                }
            } catch (error) {
                console.error('Error parsing JSON:', error);
                console.error('Response:', this.responseText);
            }
        } else {
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
                let b = quantity;
                quantity = Math.max(1, quantity - 1);
                b=b-1;
                method = 'minus';
                if(b >= 1){
                    updateCart(productId, quantity, method);
                }
            } else {
                quantity += 1;
                method = 'plus';
                updateCart(productId, quantity, method);
            }
            quantityElement.textContent = quantity;
            console.log(productId, quantity, method);
            
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
            const product = find(productId);
            updateCart(productId, quantity, method, isChecked);
        }
    });
});

