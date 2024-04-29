let popup = document.getElementById('popup-order');
function openPopup() {
    popup.classList.add("open-popup");
}
function closePopup() {
    popup.classList.remove("open-popup");
}
function deleteOrder(button) {
    var orderId = button.getAttribute('data-order-id');
    console.log(orderId); // replace this with your order ID
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api/cancel-order.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            var response = JSON.parse(this.responseText);
            if (response.success) {
                location.reload();
            } else {
                alert(response.message);
            }
        }
    }
    xhr.send("orderId=" + orderId);
}