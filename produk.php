<?php
    require "fungsi.php";

    $id = $_GET["id"];

    $produk = ambil("SELECT * FROM produk WHERE id = $id")[0];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produk.css">
    <title>Barang | <?= $produk["produk"] ?></title>
</head>
<body>
    
  <!-- navbar -->

  <div class="navbar">
        <h1>ShopMan</h1>
        
        <ul>
            <li><a href="tambah.php">Tambah</a></li>
        </ul>
    </div>

    <!-- main -->

    <div class="produk">
        <img src="jeruk.jpg" alt="jeruk">
        <div class="penjualan">
            <div class="list_produk">
                <h1 class="judul"><?= $produk["produk"] ?></h1>
                <h1 class="harga"><?= $produk["harga"] ?></h1>
            </div>
            <div class="list_akhir">
                <div  class="tombol_keranjang"><a href="#">Keranjang</a></div>
                <div  class="tombol_beli"><a href="#">Beli</a></div>
            </div>
        </div>
    </div>


</body>
</html>