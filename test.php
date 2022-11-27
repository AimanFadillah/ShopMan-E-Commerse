<?php

require 'fungsi.php';

$produk = ambil("SELECT id FROM produk");

$ye = [];

foreach($produk as $produknya){
    $ye[] = $produknya["id"];
}



$random = array_rand($ye,5);

echo $ye[$random[4]];









?>