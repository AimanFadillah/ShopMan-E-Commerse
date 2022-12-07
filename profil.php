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

 $id_user = $_GET["user"];
 $user = ambil("SELECT * FROM user WHERE id = '$id_user' ")[0];

//  toko

$produknya = ambil("SELECT * FROM produk");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profil.css">
    <title>Profil</title>
</head>
<body>
    
<!-- main -->
<div class="container">
    <div class="navbar">
        <?php if($_SESSION["user"] === $id_user ) : ?>
        <ul>
            <li class="kembali"><a href="index.php">Kembali</a></li>
            <li><a href="profil.php?user=<?= $id_user ?>">Profil</a></li>
            <li><a>Edit</a></li>
            <li><a href="toko.php">Toko</a></li>
            <li class="keranjang"><a href="keranjang.php">Keranjang</a></li>
            <li class="logout"><a href="logout.php">Log Out</a></li>
            <li class="none"></li>
        </ul>
        <?php endif ; ?>
        <?php if($_SESSION["user"] !== $id_user ) : ?>
            <ul>
            <li class="kembali"><a href="index.php">Kembali</a></li>
            <li><a href="profil.php?user=<?= $id_user ?>">Profil</a></li>
            <li class="none2"></li>
        </ul>
        <?php endif ; ?>
    </div>
    <div class="isi">
        <!-- utama -->

        <div class="utama">
            <div class="head">
                <img src="img_kategori/bawaan.jpg" alt="gambar">
                <div class="tengah">
                    <h1><?= $user["nama"] ?></h1>
                </div>
                
            </div>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias reprehenderit incidunt ipsam, illum inventore hic quo maxime id cum aliquid ab dicta, expedita reiciendis magnam! Soluta magni tenetur accusamus at.</p>
        </div>
        <!-- toko -->

      
</div>


</body>
</html>
