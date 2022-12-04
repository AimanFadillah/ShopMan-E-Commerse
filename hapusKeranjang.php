<?php

require 'fungsi.php';
session_start();

if( !isset( $_SESSION["login"] ) ){
    $_SESSION["login"] = false;
 }

 if($_SESSION["login"] === false){
     header("location:login.php");
     exit();
 }

$user_id = $_SESSION["user"];
$user = ambil("SELECT * FROM user WHERE id = '$user_id' ")[0];
$user_name = $user["nama"];

$idKeranjang = $_GET["id_produk"];

if(hapusKeranjang($idKeranjang,$user_name) > 0){
    echo "<script>
            document.location.href = 'keranjang.php';
            </script>";
}


?>