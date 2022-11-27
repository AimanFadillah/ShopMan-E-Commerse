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
$id_komen = $_GET["id_komen"];
$nama = $_GET["nama"];
$nama_komen = $_GET["nama_komen"];


if($nama !== $nama_komen){
    echo "<script>
        alert('kamu tidak berhak Menghapus komentar ini');
        document.location.href = 'produk.php?id=$id&nama=$nama';
        </script>";
    die();
}

if(hapusKomentar($id,$id_komen) > 0){
    echo "<script>
            document.location.href = 'produk.php?id=$id&nama=$nama';
            </script>";
}else{
    echo "<script>
    alert('naha gagal')
    </script>";
}



?>
