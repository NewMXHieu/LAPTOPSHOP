

<?php

require __DIR__ . '/router.php';


Route::add('/laptopshop/', function() {
    require __DIR__ . '/trangchu.php';
});

Route::add('/laptopshop/trangchu', function() {
    require __DIR__ . '/trangchu.php';
});

// Route::add('/laptopshop/sanpham', function() {
//     require __DIR__ . '/product-list.php';
// });

Route::add('/laptopshop/sign-in', function() {
    require __DIR__ . '/sign-in.php';
});

Route::add('/laptopshop/sign-up', function() {
    require __DIR__ . '/sign-up.php';
});

// Route::add('/laptopshop/about', function() {
//     require __DIR__ . '/about.php';
// });

// Route::add('/laptopshop/contact', function() {
//     require __DIR__ . '/contact.php';
// });

Route::add('/laptopshop/logout', function() {
    require __DIR__ . '/logout.php';
});

Route::add('/laptopshop/orderstatus', function() {
    require __DIR__ . '/orderstatus.php';
});

Route::add('/laptopshop/profile', function() {
    require __DIR__ . '/profile.php';
});

Route::add('/laptopshop/cart', function() {
    require __DIR__ . '/cart.php';
});

Route::add('/laptopshop/product-detail', function() {
    require __DIR__ . '/product-detail.php';
});

Route::submit();

?>