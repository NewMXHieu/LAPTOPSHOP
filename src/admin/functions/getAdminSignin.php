<?php
    if(isset($_POST['name'])){
        echo $_POST['name'];
    } else if(isset($_POST['username'])){
        echo $_POST['username'];
    } else{
        echo "Null admin";
    }
?>