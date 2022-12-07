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

//  toko

$produknya = ambil("SELECT * FROM produk WHERE pemilik = '$id_user' ");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profil.css">
    <title>Toko</title>
</head>
<body>
    
<!-- main -->
<div class="container">
    <div class="navbar">
        <ul>
            <li class="kembali"><a href="index.php">Kembali</a></li>
            <li><a href="profil.php?user=<?= $id_user ?>">Profil</a></li>
            <li><a>Edit</a></li>
            <li><a href="toko.php">Toko</a></li>
            <li class="keranjang"><a href="keranjang.php">Keranjang</a></li>
            <li class="logout"><a href="logout.php">Log Out</a></li>
            <li class="none"></li>
        </ul>
    </div>
    <div class="isi">
        <!-- toko -->

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

    </div>
</div>


</body>
</html>
