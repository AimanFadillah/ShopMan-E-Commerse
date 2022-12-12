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
$user_name = $user["nama"];
$beli = false;

if(isset($_POST["beli"])){
    $beli = true;
}

if(isset($_POST["batalBeli"])){
    $beli = false;
}

$keranjang = ambil("SELECT * FROM produk INNER JOIN keranjang ON keranjang.id_produk = produk.id WHERE keranjang.user = '$user_name' ");
$totalHarga = 
ambil("SELECT SUM(harga),COUNT(produk) FROM produk INNER JOIN keranjang ON keranjang.id_produk = produk.id WHERE keranjang.user = '$user_name' ")[0];

$sisaDompet = $user["dompet"] - $totalHarga["SUM(harga)"];


if(isset($_POST["jadiBeli"])){
   foreach($keranjang as $keranjangYOO){
        pembelian($keranjangYOO["id_produk"],$id_user);
   }
   header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/keranjang.css">
    <title>Keranjang | <?= $user_name ?></title>
</head>
<body>

  


<!-- navbar -->
<div class="navbar">
        <a href="index.php" class="kembali"><h1>Kembali</h1></a>

        <!-- navbar -->
        <form action="" method="POST" >
        <ul>
            <?php if($_SESSION["login"] === false) : ?>    
                <li class="login"><a href="login.php">Login</a></li>
            <?php endif ; ?>
            <?php if($_SESSION["login"] === true) : ?>    
                <li class="beli"><button name="beli">Beli</button></li>
            <?php endif ; ?>
        </ul>
        </form>
</div>

<!-- beli -->
<?php if($beli === true) : ?>
     <div class="center">
        <div class="beliProduk">
            <div class="judulBeli">
                <h1>Pembelian</h1>
                <h2>💰<?= $user["dompet"] ?></h2>
            </div>
        <div class="isiBeli">
            <table>
                <?php foreach($keranjang as $keranjangsih) : ?>
                <tr>
                    <td><?= $keranjangsih["produk"] ?></td>
                    <td> : 💰<?= $keranjangsih["harga"] ?></td>
                </tr>
                <?php endforeach ; ?>
                <tr>
                    <td><div class="batasBeli"></div></td>
                    <td><div class="batasBeli"></div></td>
                </tr>
                <tr>
                    <td>Sisa Dompet</td>
                    <td> : 💰<?= $sisaDompet ?> </td>
                </tr>
            </table>
        </div>
        <form action="" method="post">
            
        <?php if($sisaDompet === "Tidak Cukup") : ?>
        <div class="pilihBeli">
            <button class="batalBeli" name="batalBeli">Batal</button>
        </div>
        <?php endif ; ?>
        <?php if($sisaDompet !== "Tidak Cukup") : ?>
        <div class="pilihBeli">
            <button class="batalBeli" name="batalBeli">Batal</button>
            <button class="jadiBeli" name="jadiBeli">Beli</button>
        </div>
        <?php endif ; ?>
    </div>
</div>
<?php endif ; ?>  
 
        <!-- main -->
        <div class="data">
            <h1 class="totalHarga">Total Harga :💰 <?= $totalHarga["SUM(harga)"] ?></h1>
            <h1 class="totalHarga">Jumlah Barang : <?= $totalHarga["COUNT(produk)"] ?> </h1>
        </div>
        <ul><form action="" method="post">
            <?php if(empty($keranjang) ) : ?>
                <li>
                <div class="produk">
                     <div class="kiri">
                        <h1>Tidak ada Barang yang masuk ke Keranjang</h1>
                     </div>
                </div>
            </li>
            <?php endif ; ?>
            <?php foreach($keranjang as $keranjangnya) : ?>
            <li>
                <a href="produk.php?id=<?= $keranjangnya["id_produk"] ?>" >
                <div class="produk">
                     <div class="kiri">
                        <img src="img/<?= $keranjangnya["img"] ?>" alt="gambar">
                        <h1><?= $keranjangnya["produk"] ?></h1>
                     </div>
                    <div class="kanan">
                        <h1>💰 <?= $keranjangnya["harga"] ?></h1>
                        <a class="hapus" href="hapusKeranjang.php?id_produk=<?= $keranjangnya["id_produk"] ?>">Batal</a>
                    </div>
                </div>
               </a>
            </li>
            <?php endforeach ; ?>
            </form>
        </ul>
