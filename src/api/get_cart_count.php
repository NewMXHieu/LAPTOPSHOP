<?php
session_start();
if(isset($_SESSION['product_cart'])){
    echo count($_SESSION['product_cart']);
} else {
    echo 0;
}
?>