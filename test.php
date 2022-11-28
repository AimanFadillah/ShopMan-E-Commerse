<?php

require 'fungsi.php';


    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
        $url = "https://";   
    else {
        $url = "http://";   
        $url.= $_SERVER['HTTP_HOST'];   
        $url.= $_SERVER['REQUEST_URI'];    
    }

    if( $url === "http://localhost/shopman/test.php"){
        header("Location:index.php");
        exit();
    }





?>