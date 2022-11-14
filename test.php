<?php

require 'fungsi.php';

$test = ambil("SELECT MAX(id) FROM PRODUK")[0];

echo $test["MAX(id)"];


?>