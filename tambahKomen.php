<?php

    require 'fungsi.php';
    session_start();


    // sesion login
    if( !isset( $_SESSION["login"] ) ){
       $_SESSION["login"] = false;
    }

    if($_SESSION["login"] === false){
        header("location:login.php");
        exit();
    }

    $id = $_GET["id"];
    $nama = $_GET["nama"];

    if(isset($_POST["kirim"]) ){
        if(tambahKomentar($_POST) > 0){
            echo "<script>
            document.location.href = 'produk.php?id=$id&nama=$nama';
            </script>";
        }else{
            echo "<script>
            alert('naha gagal')
            </script>";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Komentar</title>
    <link rel="stylesheet" href="css/tambahKomen.css">
</head>
<body>
    
    <div class="container">
        <h1>Tambah Komentar</h1>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="nama" id="nama" value="<?= $nama ?>">
            <!-- hidden -->
            <label for="komentar">User : <?= $nama ?></label><br>
            <textarea name="komentar" id="komentar"></textarea>
            <div class="mid">
                <input type="submit" value="kirim" id="kirim" name="kirim">
            </div>
        </form>
    </div>

</body>
</html>