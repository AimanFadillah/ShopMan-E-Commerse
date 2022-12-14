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


$idUser = $_SESSION["user"];
$user = ambil("SELECT * FROM user WHERE id = '$idUser' ")[0];

if( isset( $_POST["kirim"] ) ){
    if(gantiProfil($_POST) > 0){
        echo "<script>
        document.location.href = 'profil.php?user=$idUser' ;
        </script>";
    }else{
        echo "<script>
            alert('Anda tidak mengedit apapun')
            document.location.href = 'toko.php' ;
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
    <title>Edit Profil</title>
    <link rel="stylesheet" href="css/ganti.css">
</head>
<body class="Profil">
    <!-- container -->
    <div class="containerProfil">
        <h1>Edit Profil</h1>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mid">
            <img src="img/<?= $user["img"] ?>" alt="gambar"><br>
            <input type="file" name="gambar" id="gambar"><br><br>
        </div>
        <input type="hidden" name="idUser" value="<?= $idUser ?>">
        <input type="hidden" name="gambarlama" id="gambarlama" value="<?= $user["img"] ?>">
        <label for="nama">Nama Toko</label><br>
        <input type="text" name="namaToko" id="nama" value='<?= $user["namaToko"] ?>' require autocomplete="off">

        <label for="keterangan">Tentang Toko</label><br>
        <textarea name="tentangToko" id="keterangan"><?= $user["tentangToko"] ?></textarea>
        <div class="mid">
            <input type="submit" value="kirim" name="kirim" class="kirim">
        </div>
        </form>
    
    </div>
</body>
</html>