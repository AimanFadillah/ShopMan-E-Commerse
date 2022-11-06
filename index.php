<?php

require 'fungsi.php';

$produk = ambil("SELECT * FROM produk");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ShopMan</title>
</head>
<body>
    <!-- navbar -->

    <div class="navbar">
        <h1>ShopMan</h1>
        
        <ul>
            <li><a href="#">Login</a></li>
        </ul>
    </div>

    <!-- main -->

    <div class="kelompok">
        <h1>Rekomendasi</h1>
        <ul class="produk">
            <?php foreach($produk as $produknya) : ?>
            <li>
                <div class="isi">
                    <a href="#  ">
                        <img src="jeruk.jpg">
                        <h1><?= $produknya["produk"] ?></h1>
                    </a>
                </div>
            </li>
            <?php endforeach ; ?>
        </ul>
    </div>

</body>
</html>