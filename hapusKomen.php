<?php

require 'fungsi.php';

$id = $_GET["id"];
$id_komen = $_GET["id_komen"];

if(hapusKomentar($id,$id_komen) > 0){
    echo "<script>
            document.location.href = 'produk.php?id=$id';
            </script>";
}else{
    echo "<script>
    alert('naha gagal')
    </script>";
}



?>
