<?php
    require "fungsi.php";
    session_start();

    if(!isset($_SESSION["login"])){
        $_SESSION["login"] === false;
    }else{
        $_SESSION["login"] === true;
    }

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
        <a href="index.php"><h1>Kembali</h1></a>
        <?php if($_SESSION["login"] === false) : ?>  
        <ul class="pilihan">
            <li class="ganti"><a href="login.php">Login</a></li>
        </ul>
        <?php endif ; ?>
        <?php if($_SESSION["login"] === true) : ?>  
        <ul class="pilihan">
            <li class="delete"><a href="Delete.php?id=<?= $produk["id"] ?>" onclick="return confirm('Yakin')">Delete</a></li>
            <li class="ganti"><a href="ganti.php?id=<?= $produk["id"] ?>">Edit</a></li>
            <li class="tambah"><a href="tambah.php">Tambah</a></li>
        </ul>
        <?php endif ; ?>
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
            <?php if($_SESSION["login"] === true) : ?>  
            <div class="kanan"><a href="tambahKomen.php?id=<?= $produk["id"] ?>"
            class="tambahKomen">Tambah</a></div>
            <?php endif ; ?>
        </div>
        <?php if(empty($komentar) ) : ?>
            <h2>Tidak Ada Komentar :( </h2>
        <?php endif ; ?>
        <ul class="isi_komentar">
            <?php foreach($komentar as $komen) : ?>
            <li>
                <div class="atas">
                    <div class="kiri"><h3><?= $komen["nama"] ?></h3></div>
                    <div class="kanan">
                    <?php if($_SESSION["login"] === true) : ?>  
                        <a href="editKomen.php?id=<?= $produk["id"] ?>&id_komen=<?= $komen["id"] ?>" class="editbutton">Edit</a>
                        <a href="hapusKomen.php?id=<?= $produk["id"] ?>&id_komen=<?= $komen["id"] ?>" onclick="return confirm('Yakin')">Hapus</a>
                        <?php endif ; ?>
                    </div>
                </div>
                <p><?= $komen["komentar"] ?></p>
            </li>
            <?php endforeach ; ?>
        </ul>
    </div>


</body>
</html>