<?php
    require "fungsi.php";
    session_start();

    if(!isset($_SESSION["login"])){
        $_SESSION["login"] === false;
    }else{
        $_SESSION["login"] === true;
    }

    $id = $_GET["id"];
    $produk = ambil("SELECT * FROM produk WHERE id = $id")[0];
    
    if(isset($_SESSION["user"])){
        $id = $_GET["id"];
        $_SESSION["login"] === true;
        $id_user = $_SESSION["user"];
        $user = ambil("SELECT * FROM user WHERE id = '$id_user' ")[0];
        $user_name = $user["nama"];
        $keranjang = ambil("SELECT * FROM keranjang WHERE id_produk = $id AND user = '$user_name' ");
        $sisaDompet = $user["dompet"] - $produk["harga"];

        if($sisaDompet < 0){
            $sisaDompet = "Tidak Cukup";
        }
    }

   
    
    
    $nama_produk = $produk["produk"];

    $komentar = ambil("SELECT * FROM komentar WHERE id_produk = '$id' ");

    $id_pembuat = $produk["pemilik"];
    $nama_pembuat = ambil("SELECT * FROM user WHERE id = '$id_pembuat' ")[0]; 

    // beli
    $beli = false;
    if(isset($_POST["beli"])){
        $beli = true;
    }

    if(isset($_POST["batalBeli"])){
        $beli = false;
    }
    // random

    $produk_rekomendasi = ambil("SELECT * FROM produk ORDER BY RAND() LIMIT 5");


    if(isset($_POST["keranjang"] )){
        if(tambahkeranjang($_POST) > 0 ){
            header("Location:produk.php?id=$id");
            exit();
        }
    }

    if(isset($_POST["jadiBeli"])){
        if(pembelian($_POST["idProdukBeli"],$_POST["idPembeli"]) > 0 ){
            header("Location:index.php");
            exit();
        }else{
            echo "
                <script>
                    alert('lah gagal');
                </script>
            ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produk.css">
    <title>Barang | <?= $produk["produk"] ?></title>
</head>
<body>
    
  <!-- navbar -->

  <div class="navbar">
        <a href="index.php"><h1>Kembali</h1></a>
        <?php if($_SESSION["login"] === false) : ?>  
        <ul class="pilihan">
            <li class="ganti"><a href="login.php">Login</a></li>
        </ul>
        <?php endif ; ?>
        <?php if($_SESSION["login"] === true) : ?>  
        <ul class="pilihan">
           
        </ul>
        <?php endif ; ?>
    </div>

     <!-- beli -->
     <?php if($beli === true) : ?>
     <div class="center">
     <div class="beliProduk">
        <div class="judulBeli">
          <h1>Pembelian</h1>
          <h2>💰<?= $user["dompet"] ?></h2>
        </div>
        <div class="isiBeli">
            <table>
                <tr>
                    <td><?= $produk["produk"] ?></td>
                    <td> : 💰<?= $produk["harga"] ?></td>
                </tr>
                <tr>
                    <td><div class="batasBeli"></div></td>
                    <td><div class="batasBeli"></div></td>
                </tr>
                <tr>
                    <td>Sisa Dompet</td>
                    <td> : 💰<?= $sisaDompet ?> </td>
                </tr>
            </table>
        </div>
        <form action="" method="post">
            
        <?php if($sisaDompet === "Tidak Cukup") : ?>
            <div class="pilihBeli">
            <button class="batalBeli" name="batalBeli">Batal</button>
        </div>
        <?php endif ; ?>
        <?php if($sisaDompet !== "Tidak Cukup") : ?>
            <div class="pilihBeli">
            <input type="hidden" name="idProdukBeli" value="<?= $id ?>">
            <input type="hidden" name="idPembeli" value="<?= $id_user ?>">
            <button class="batalBeli" name="batalBeli">Batal</button>
            <button class="jadiBeli" name="jadiBeli">Beli</button>
        </div>
        <?php endif ; ?>
       
        </form>
    </div>
     </div>
    <?php endif ; ?>


    <!-- main -->

    <div class="produk">
        <img src="img/<?= $produk["img"] ?>" alt="jeruk">
        <div class="penjualan">
            <div class="list_produk">
                <h1 class="judul"><?= $produk["produk"] ?></h1>
                <h1 class="harga">💰 <?= $produk["harga"] ?></h1>
            </div>
            <div class="list_akhir">
                <?php if($_SESSION["login"] === false) { ?>
                    <div  class="tombol_keranjang">
                    <a id="keranjang" href="login.php">Keranjang</a>
                    </div>
                <?php } elseif($user_name === $nama_pembuat["nama"]) { ?>
                    <div  class="tombol_keranjang">
                    <a id="keranjang" href="keranjang.php">Check Dikeranjang</a>
                    </div>
                <?php } elseif(empty($keranjang)) { ?>
                <div  class="tombol_keranjang">
                <form action="" method="post">
                    <input type="hidden" name="id_produk" id="id_produk" value="<?= $produk["id"] ?>">
                    <button name="keranjang" id="keranjang" type="filter_input">Keranjang</button>
                    <input type="hidden" name="user" id="user" value="<?= $user["nama"] ?>">
                </form>
                </div>
                <?php } elseif(!empty($keranjang)) { ?>
                    <div  class="sudah_keranjang">
                    <a class="sudah" href="keranjang.php">Sudah di Keranjang</a>
                    </div>
                <?php } ?>
                <?php if($_SESSION["login"] === false) { ?>
                    <div  class="tombol_beli">
                        <a href="login.php">Beli</a>
                    </div>
                <?php } elseif($user_name === $nama_pembuat["nama"]) { ?>
                <div  class="tombol_beli">
                        <a href="toko.php">Check Ditoko</a>
                    </div>
                </div>
                <?php } elseif($_SESSION["login"] === true) { ?>
                <div  class="tombol_beli">
                    <form action="" method="post">
                        <button name="beli">Beli</button>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

   
    <!-- pembuat -->
    <a href="profil.php?user=<?= $produk["pemilik"] ?>">

    <div class="pembuatProduk">
        <div class="keteranganPembuat">
        <img src="img_kategori/bawaan.jpg" alt="gambar" class="imgPembuat">
        <h1><?= $nama_pembuat["nama"]?></h1>
        </div>
        
    </div>

    </a>
    
    </div>

    <!-- tentang produk -->
    <div class="komentar">
        <div class="list_komentar">
            <div class="kiri"><h1>Komentar</h1></div>
            <?php if($_SESSION["login"] === true) : ?>  
            <div class="kanan"><a href="tambahKomen.php?id=<?= $produk["id"] ?>" class="tambahKomen">Tambah</a></div>
            <?php endif ; ?>
        </div>
        <?php if(empty($komentar) ) : ?>
            <h2>Tidak Ada Komentar :( </h2>
        <?php endif ; ?>
        <ul class="isi_komentar">
            <?php foreach($komentar as $komen) : ?>
            <li>
                <div class="atas">
                    <div class="kiri"><h3><?= $komen["nama"] ?></h3></div>
                    <div class="kanan">
                    <?php if($_SESSION["login"] === true) : ?> 
                        <?php if($user_name === $komen["nama"]) : ?>
                        <a href="editKomen.php?id=<?= $produk["id"] ?>&id_komen=<?= $komen["id"] ?>" class="editbutton">Edit</a>
                        <a href="hapusKomen.php?id=<?= $produk["id"] ?>&id_komen=<?= $komen["id"] ?>&nama_komen=<?= $komen["nama"] ?>" onclick="return confirm('Yakin')">Hapus</a>
                        <?php endif ; ?>
                    <?php endif ; ?>
                    </div>
                </div>
                <p><?= $komen["komentar"] ?></p>
            </li>
            <?php endforeach ; ?>
        </ul>
    </div>

    <!-- random rekomendasi -->
    <div class="kelompok">
        <h1>Rekomendasi</h1>
        <ul class="random">
        <?php foreach($produk_rekomendasi as $produk_random) : ?>
            <li>
                <div class="random_isi">
                    <a href="produk.php?id=<?= $produk_random["id"] ?>">
                        <img src="img/<?= $produk_random["img"] ?>">
                        <h4 ><?= $produk_random["produk"] ?></h4>
                        <h3>💰<?= $produk_random["harga"] ?></h3>
                    </a>
                </div>
            </li>
        <?php endforeach ; ?>
        </ul>
    </div>


</body>
</html>