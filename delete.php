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

$nama = $_GET["nama"];

$id = $_GET["id"];


if($nama !== $komen["nama"]){
    echo "<script>
        alert('kamu tidak berhak Edit komentar ini');
        document.location.href = 'produk.php?id=$id&nama=$nama';
        </script>";
}

if(hapus($id) > 0){
    echo "<script>
    document.location.href = 'index.php?nama=$nama' ;
    </script>";
    exit();
}else{
    echo "<script>
    alert('Gagal')
    </script>";
}

?>