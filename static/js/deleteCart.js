function deleteFromCart(MAGH, MASP) {
    $.ajax({
        url: 'api/delete_from_cart.php', // URL to the PHP file that will handle the deletion
        type: 'POST',
        data: {
            'MAGH': MAGH,
            'MASP': MASP
        },
        success: function(response) {
            response = JSON.parse(response);
            // Handle the response from the server
            if(response.status === 'success') {
                alert('Xóa sản phẩm khỏi giỏ hàng thành công!');
                location.reload()
            } else {
                alert('There was an error removing the item');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle any errors
            alert('There was an error: ' + textStatus);
        }
    });
}