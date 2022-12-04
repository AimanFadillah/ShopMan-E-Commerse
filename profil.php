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

 $id_user = $_SESSION["user"];
 $user = ambil("SELECT * FROM user WHERE id = '$id_user' ")[0];

 $utama = false;
 $toko = true;


// pengendali
 if(isset($_POST["utama"])){
     $utama = true;
     $toko = false;
 }

 if(isset($_POST["toko"])){
     $utama = false;
     $toko = true;
 }

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
        <form action="" method="POST">
        <ul>
            <li class="kembali"><a href="index.php">Kembali</a></li>
            <li><button name="utama" id="utama">Profil</button></li>
            <li><a>Edit</a></li>
            <li><button name="toko" id="toko">Toko</button></li>
            <li class="keranjang"><a href="keranjang.php">Keranjang</a></li>
            <li class="logout"><a href="logout.php">Log Out</a></li>
            <li class="none"></li>
        </ul>
        </form>
    </div>
    <div class="isi">
        <!-- utama -->
        <?php if($utama === true) : ?>
        <div class="utama">
            <div class="head">
                <img src="img_kategori/bawaan.jpg" alt="gambar">
                <div class="tengah">
                    <h1><?= $user["nama"] ?></h1>
                </div>
                
            </div>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias reprehenderit incidunt ipsam, illum inventore hic quo maxime id cum aliquid ab dicta, expedita reiciendis magnam! Soluta magni tenetur accusamus at.</p>
        </div>
        <?php endif ; ?>
        <!-- toko -->
        <?php if($toko === true) : ?>
        <div class="toko">
             <div class="navbarToko">
                 <h1>🏢Toko</h1>
                 <a class="tambahToko" href="tambah.php">➕Tambah</a>
             </div>
             <ul>
                 <?php foreach($produknya as $produk) : ?>
                 <li>
                 <a href="#">
                    <div class="barangToko">
                        <div class="kiriToko">
                        <img class="gambarToko" src="img/<?= $produk["img"] ?>" alt="gambar">
                        <h1><?= $produk["produk"] ?></h1>
                        </div>
                        <div class="kananToko">
                            <h1 class="HargaToko"> <?= $produk["kategori"] ?> | 💰<?= $produk["harga"] ?></h1>
                            <a class="editToko" href="ganti.php?id=<?= $produk["id"] ?>">🔧</a>
                            <a class="hapusToko" href="delete.php?id=<?= $produk["id"] ?>" onclick="return confirm('Yakin')">❌</a>
                        </div>
                    </div>
                 </a>
                </li>
                <?php endforeach ; ?>
             </ul>
        </div>
        <?php endif ; ?>
    </div>
</div>


</body>
</html>
