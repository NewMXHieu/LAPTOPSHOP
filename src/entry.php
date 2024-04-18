<?php 
// check if path starts with laptopshop/admin
$isRequestAdminPage = strpos($_SERVER['REQUEST_URI'], '/laptopshop/admin') === 0;

if ($isRequestAdminPage) {
    chdir(__DIR__. '/admin/views');
    require __DIR__. '/admin/views/index.php';
} else {
    chdir(__DIR__. '/laptopshop');
    require __DIR__. '/laptopshop/index.php';
}
?>