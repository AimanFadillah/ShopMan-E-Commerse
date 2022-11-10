<?php

require 'fungsi.php';

$id = $_GET["id"];
$komen = $_GET["komen"];
$produk = $_GET["produk"];

if(hapus($id,$komen,$produk) > 0){
    echo "<script>
    document.location.href = 'index.php' ;
    </script>";
    exit();
}else{
    echo "<script>
    alert('Gagal')
    </script>";
}

?>