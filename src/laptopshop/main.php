<?php
    if(isset($_GET['action'])){
        $tmp = $_GET['action'];
    } else {
        $tmp = "";
    }
    if($tmp == "trangchu"){
        include "trangchu.php";
    } else if($tmp == "sanpham"){
        include 'product-list.php';
    } else if($tmp == "sign-in"){
        include 'sign-in.php';
    } else if($tmp == "sign-up"){
        include 'sign-up.php';
    } else {
        include 'trangchu.php';
    }
?>