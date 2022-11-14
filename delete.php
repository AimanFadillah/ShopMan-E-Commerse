<?php

require 'fungsi.php';

$id = $_GET["id"];

if(hapus($id) > 0){
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