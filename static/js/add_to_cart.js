$(document).ready(function() {
    $('.addCart').click(function() {
        var productId = $(this).data('id');

        $.ajax({
            url: 'api/add_to_cart.php',
            method: 'POST',
            data: { product_id: productId },
            success: function(response) {
                if(response =="Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng"){
                    alert("Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng");
                    window.location.href = "sign-in";
                }
                updateCartCount();
            }
        });
    });
});
