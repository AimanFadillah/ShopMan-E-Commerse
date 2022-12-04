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
$id_komen = $_GET["id_komen"];
$user_nama = $_SESSION["user"];
$nama_komen = $_GET["nama_komen"];
$user = ambil("SELECT * FROM user WHERE id = '$user_nama' ")[0];





if($user["nama"] !== $nama_komen){
    echo "<script>
        alert('kamu tidak berhak Menghapus komentar ini');
        document.location.href = 'produk.php?id=$id';
        </script>";
    die();
}

if(hapusKomentar($id_komen) > 0){
    echo "<script>
            document.location.href = 'produk.php?id=$id';
            </script>";
}else{
    echo "<script>
    alert('naha gagal');
    document.location.href = 'produk.php?id=$id';
    </script>";
}



?>
