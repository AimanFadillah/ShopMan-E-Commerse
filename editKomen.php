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
    $idkomen = $_GET["id_komen"];
    $nama = $_GET["nama"];

    $komen = ambil("SELECT * FROM komentar_$id WHERE id = $idkomen")[0];

    if($nama !== $komen["nama"]){
        echo "<script>
            alert('kamu tidak berhak Edit komentar ini');
            document.location.href = 'produk.php?id=$id&nama=$nama';
            </script>";
    }

    if(isset($_POST["kirim"]) ){
        if(editKomentar($_POST) > 0){
            echo "<script>
            document.location.href = 'produk.php?id=$id&nama=$nama';
            </script>";
        }else{
            echo "<script>
            alert('kamu tidak mengedit apapun')
            document.location.href = 'produk.php?id=$id&nama=$nama';
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
    <link rel="stylesheet" href="css/editKomen.css">
</head>
<body>
    
    <div class="container">
        <h1>Edit Komentar</h1>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="id_komen" value="<?= $idkomen ?>">
            <input type="hidden" name="nama" id="nama" value="<?= $nama ?>">

            <label for="komentar">User : <?= $nama ?></label><br>
            <textarea name="komentar" id="komentar"><?= $komen["komentar"] ?></textarea>
            <div class="mid">
                <input type="submit" value="kirim" id="kirim" name="kirim">
            </div>
        </form>
    </div>

</body>
</html>