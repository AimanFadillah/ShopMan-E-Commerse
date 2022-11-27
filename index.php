<?php

require 'fungsi.php';

session_start();

if( !isset($_SESSION["login"]) ){
    $_SESSION["login"] = false;
}


if($_SESSION["login"] === false){
    $nama = "null";
}

// KEAMANAN JIKA ADA YANG NGUTAK ATIK ID
if($_SESSION["login"] === true){
    $nama = $_GET["nama"];
    $user = ambil("SELECT * FROM user WHERE id = $nama ");
    if(empty($user) ){
        echo "<script>
        document.location.href = 'logout.php';
        </script>";
    }
}

if(empty($nama)){
    $nama = "null";
}



$produk = ambil("SELECT * FROM produk");



$kategori = ambil("SELECT * FROM kategori");

if(isset($_POST["keyword"]) ){
    $keyword = $_POST["keyword"];
    echo "<script>
    document.location.href = 'cari.php?keyword=$keyword&nama=$nama';
    </script>";
}

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
        <form action="" method="post">
            <input type="search" name="keyword" id="keyword" placeholder="Cari Barang..." autofocus autocomplete="off">
        </form>
        <ul>
            <?php if($_SESSION["login"] === false) : ?>    
                <li class="login"><a href="login.php">Login</a></li>
            <?php endif ; ?>
            <?php if($_SESSION["login"] === true) : ?>    
                <li class="logout"><a href="logout.php">Logout</a></li>
                <li class="tambah"><a href="tambah.php?nama="<?= $nama ?>>Tambah</a></li>
            <?php endif ; ?>
        </ul>
    </div>

    <!-- main -->

    <div class="kelompok">
        <h1>REKOMENDASI</h1>
        <ul class="produk">
            <?php foreach($produk as $produknya) : ?>
            <li>
                <div class="isi">
                    <a href="produk.php?id=<?= $produknya["id"] ?>&nama=<?= $nama ?>">
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
            <li><a href="kategori.php?kategori=<?= $kategorinya["kategori"] ?>&nama=<?= $nama ?>">
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