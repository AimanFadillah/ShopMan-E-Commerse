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
 $user_name = $user["nama"];
 $keranjangnya = 
ambil("SELECT COUNT(produk) FROM produk INNER JOIN keranjang ON keranjang.id_produk = produk.id WHERE keranjang.user = '$user_name' ")[0];
 $produknya = ambil("SELECT COUNT(produk) FROM produk WHERE pemilik = '$id_user' ")[0];
//  toko

$produk = ambil("SELECT * FROM produk WHERE pemilik = '$id_user' ");

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
            <li><a>Status</a></li>
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
            <li class="none"></li>
        </ul>
        <?php endif ; ?>
    </div>
    <div class="isi">
        <!-- utama -->

        <div class="utama">
            <div class="head">
                <img src="img/<?= $user["img"] ?>" alt="gambar">
                <div class="tengah">
                    <div class="masterKananHead">
                        <div class="kananHead">
                        <h1><?= $user["namaToko"] ?></h1>
                        <?php if($_SESSION["user"] === $id_user) : ?>
                            <h2 class="editTengah"><a href="editProfil.php" >🔧</a></h2>
                        <?php endif ; ?>
                        </div>
                        <h4>User : <?= $user["nama"] ?></h4>
                    </div>
                   
                    <div class="kiriHead">
                        <h2 class="dompetTengah"><a href="#" >💰<?= $user["dompet"] ?></a></h2>
                        <h2 class="keranjangTengah"><a href="#" >🛒<?= $keranjangnya["COUNT(produk)"] ?></a></h2>
                        <h2 class="tokoTengah"><a href="#" >🏢<?= $produknya["COUNT(produk)"] ?></a></h2>
                        <h2 class="sukaTengah"><a href="#" >💖5</a></h2>
                    </div>

                </div>
                
            </div>
            <p><?= $user["tentangToko"] ?></p>
        </div>
        <!-- toko -->

        <div class="tokoProfil">
        
            <h1>Barang Toko ini</h1>

            <ul class="unggulan">
            <?php foreach($produk as $produknya) : ?>
                <li>
                    <div class="random_isi">
                        <a href="#">
                            <img src="img/<?= $produknya["img"] ?>">
                            <h4 ><?= $produknya["produk"] ?></h4>
                            <h3>💰<?= $produknya["harga"] ?></h3>
                        </a>
                    </div>
                </li>
            <?php endforeach ; ?>
            </ul>
        </div>

      
</div>


</body>
</html>
