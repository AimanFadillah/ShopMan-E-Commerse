<?php

require 'fungsi.php';

$id = $_GET["id"];
$produk = ambil("SELECT * FROM produk WHERE id = $id")[0];

if( isset( $_POST["kirim"] ) ){
    if(ganti($_POST) > 0){
        echo "<script>
        document.location.href = 'index.php' ;
        </script>";
    }else{
        echo "<script>
            alert('naha gagal')
            </script>";
    }
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ganti.css">
    <title>Edit | Barang</title>
</head>
<body>
    
    <!-- container -->
    <div class="container">
        <h1>Edit</h1>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mid">
            <img src="img/<?= $produk["img"] ?>" alt="gambar"><br>
            <input type="file" name="gambar" id="gambar"><br><br>
        </div>
        <input type="hidden" name="id" value="<?= $produk["id"] ?>">
        <input type="hidden" name="gambarlama" id="gambarlama" value="<?= $produk["img"] ?>">
        <label for="nama">Nama Produk</label><br>
        <input type="text" name="nama" id="nama" value="<?= $produk["produk"] ?>" require autocomplete="off">
        <label for="harga">Harga Produk</label><br>
        <input type="text" name="harga" id="harga" value="<?= $produk["harga"] ?>" require autocomplete="off">
        <label for="keterangan">Tentang Barang</label><br>
        <textarea name="keterangan" id="keterangan"></textarea>
        <div class="mid">
            <input type="submit" value="kirim" name="kirim" class="kirim">
        </div>
        </form>
    </div>

</body>
</html>