<?php
    if(isset($_GET['value']) && $_GET['value']!=""){
        $value = $_GET['value'];
        if($value == 'a'){
            echo "Day la a";
        } else if ($value == 'b'){
            echo "Day la b";
        } else {
            echo "ko co";
        }
    }
?>