function updateQuantity(productId, quantity, action, element) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'api/update_cart.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.status == 200) {
            var response = JSON.parse(this.responseText); // Parse the JSON response
            console.log(response); // Log the response
            // Update the quantity in the input field
            var inputElement = action === 'plus' ? element.previousElementSibling : element.nextElementSibling;
            inputElement.value = response.quantity;
             // Use the updated quantity from the response
            window.location.reload();
        } else {
            console.error('Request failed.  Returned status of ' + this.status);
        }
    };
    xhr.send('productId=' + productId +'&quantity=' + quantity + '&action=' + action);
}