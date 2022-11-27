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

$nama = $_GET["nama"];

$id = $_GET["id"];

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



if(hapus($id) > 0){
    echo "<script>
    document.location.href = 'index.php?nama=$nama' ;
    </script>";
    exit();
}else{
    echo "<script>
    alert('Gagal')
    </script>";
}

?>