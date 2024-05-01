<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION = [];
session_unset();
session_destroy();
echo "<script>window.location.href = '/laptopshop';</script>";
?>