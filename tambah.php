<?php

require 'fungsi.php';

if(isset($_POST["kirim"]) ){
    if(tambah($_POST) > 0){
        echo "<script>
        document.location.href = 'index.php' ;
        </script>";
      }else{       
        echo "<script>
            alert('naha gagal')
            </script>";
    }
}

// echo "<script>
// document.location.href = 'index.php' ;
// </script>";

// echo "<script>
// alert('gagal')
// </script>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="css/tambah.css">
</head>
<body>
    <!-- main -->
    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            
            <h1>Tambah Barang</h1>
            <input type="hidden" name="id_komen" value="<?= uniqid() ?>">
            <label for="produk">Nama Produk </label><br>
            <input type="text" name="produk" id="produk" autocomplete="off" require> 
            <label for="Harga">Harga Produk </label><br>
            <input type="text" name="harga" id="Harga" autocomplete="off" require>
            <label for="gambar">Gambar Produk</label><br> 
            <input type="file" name="gambar" id="gambar" class="gambar"><br>
            <label for="tentang_produk">Tentang Produk </label><br>
            
            <textarea name="tentang_produk" id="tentang_produk" class="tentang_produk" autocomplete="off" require></textarea>
            <div class="botton" style="  display: flex;justify-content: center;">
            <button type="submit" value="Kirim" name="kirim">Kirim</button>
            </div>
        
        </form>
    </div>
</body>
</html>