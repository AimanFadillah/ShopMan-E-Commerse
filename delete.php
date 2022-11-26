<?php

require 'fungsi.php';

session_start();


    // sesion login
    if( !isset( $_SESSION["login"] ) ){
       $_SESSION["login"] = false;
    }

    if($_SESSION["login"] === false){
        header("location:login.php");
        exit();
    }


$id = $_GET["id"];

if(hapus($id) > 0){
    echo "<script>
    document.location.href = 'index.php' ;
    </script>";
    exit();
}else{
    echo "<script>
    alert('Gagal')
    </script>";
}

?>