<?php
    require "fungsi.php";

    $id = $_GET["id"];

    $produk = ambil("SELECT * FROM produk WHERE id = $id")[0];

    $nama_produk = $produk["produk"];
    $id_komen = $produk["id_komen"];

    $komentar = ambil("SELECT * FROM komentar_$id_komen");
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
        <a href="index.php"><h1>ShopMan</h1><a>
        
        <ul class="pilihan">
            <li class="delete"><a href="Delete.php?id=<?= $produk["id"] ?>" onclick="return confirm('Yakin')">Delete</a></li>
            <li class="ganti"><a href="ganti.php?id=<?= $produk["id"] ?>">Edit</a></li>
            <li class="tambah"><a href="tambah.php">Tambah</a></li>
        </ul>
    </div>

    <!-- main -->

    <div class="produk">
        <img src="img/<?= $produk["img"] ?>" alt="jeruk">
        <div class="penjualan">
            <div class="list_produk">
                <h1 class="judul"><?= $produk["produk"] ?></h1>
                <h1 class="harga">Rp.<?= $produk["harga"] ?></h1>
            </div>
            <div class="list_akhir">
                <div  class="tombol_keranjang"><a href="#">Keranjang</a></div>
                <div  class="tombol_beli"><a href="#">Beli</a></div>
            </div>
        </div>
    </div>
    
    </div>

    <!-- tentang produk -->
    <div class="komentar">
        <div class="list_komentar">
            <div class="kiri"><h1>Komentar</h1></div>
            <div class="kanan"><a href="tambahKomen.php?id=<?= $produk["id"] ?>"
            class="tambahKomen">Tambah</a></div>
        </div>
        <ul class="isi_komentar">
            <?php foreach($komentar as $komen) : ?>
            <li>
                <h3><?= $komen["nama"] ?></h3>
                <p><?= $komen["komentar"] ?></p>
            </li>
            <?php endforeach ; ?>
        </ul>
    </div>


</body>
</html>