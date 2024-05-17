$(document).ready(function() {
    $('.addCart').click(function() {
        var productId = $(this).data('id');

        $.ajax({
            url: 'api/add_to_cart.php',
            method: 'POST',
            data: { product_id: productId },
            success: function(response) {
                console.log('Product added to cart');
            }
        });
    });
});