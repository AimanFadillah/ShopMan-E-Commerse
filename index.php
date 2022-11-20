<?php

require 'fungsi.php';

$produk = ambil("SELECT * FROM produk");

$kategori = ambil("SELECT * FROM kategori")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ShopMan</title>
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

    <div class="kelompok">
        <h1>REKOMENDASI</h1>
        <ul class="produk">
            <?php foreach($produk as $produknya) : ?>
            <li>
                <div class="isi">
                    <a href="produk.php?id=<?= $produknya["id"] ?>">
                        <img src="img/<?= $produknya["img"] ?>">
                        <h4 ><?= $produknya["produk"] ?></h4>
                        <h3>Rp.<?= $produknya["harga"] ?></h3>
                    </a>
                </div>
            </li>
            <?php endforeach ; ?>
        </ul>
    </div>

    <!-- kategori -->
    <div class="container">
        <h1>KATEGORI</h1>
        <ul class="isikategori">
            <?php foreach($kategori as $kategorinya) : ?>
            <li><a href="kategori.php?kategori=<?= $kategorinya["kategori"] ?>">
                <div class="tipe">
                    <img src="img_kategori/<?= $kategorinya["img"] ?>.jpg" alt="foto" class="ketegori">
                    <h5><?= $kategorinya["kategori"] ?></h5>
                </div>
                </a>
            </li>
            <?php endforeach ; ?>
        </ul>
    </div>

</body>
</html>