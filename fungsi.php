<?php

$conn = mysqli_connect('localhost','root','','shop');

// BISI ADA YANG MASUK
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
        $url = "https://";   
    else {
        $url = "http://";   
        $url.= $_SERVER['HTTP_HOST'];   
        $url.= $_SERVER['REQUEST_URI'];    
    }

    if( $url === "http://localhost/shopman/fungsi.php"){
        header("Location:index.php");
        exit();
    }

function ambil($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
} 

function tambah($tambah){
    global $conn;
    $produk = htmlspecialchars( $tambah["produk"] );
    $harga = htmlspecialchars( $tambah["harga"] );
    $tentang = htmlspecialchars( $tambah["tentang_produk"] );
    $kategori = $tambah["kategori"];
    $gambar = upload();

    if(!$gambar){
        return false;
    }

    
    // menambahkan isi dari tabel produk
    $data = "INSERT INTO produk VALUES ('','$produk','$tentang','$harga','$gambar','$kategori')";
    mysqli_query($conn,$data);


    return mysqli_affected_rows($conn);
};


function upload(){
    $namefile = $_FILES["gambar"]["name"];
    $tmp_name = $_FILES["gambar"]["tmp_name"];
    $error = $_FILES["gambar"]["error"];
    $size = $_FILES["gambar"]["size"];

    // cek web error atau tidak
    if($error === 4){
        echo "<script>
                alert('Error om')
                </script>";
        return false;
    }

    // cek file
    $cek_valid = ["jpg","png","jpeg"];
    // buat misahin
    $cek_gambar = explode('.',$namefile);
    // buat milih nama paling belakang
    $cek_gambar = strtolower(end($cek_gambar) );

    // cek array 
    if(!in_array($cek_gambar,$cek_valid) ){
        echo "<script>
                alert('yehhh buka foto itu mah')
                </script>";
        return false;
    }

    // cek size
    if($size > 10000000){
        echo "<script>
        alert('badagg teuing file naa')
        </script>";
        return false;
    }

    // uniqid digunakan agar nama file tidak sama dengan yang lain
    $namabaru = uniqid();
    $namabaru .= ".";
    $namabaru = $cek_gambar;

    move_uploaded_file($tmp_name,"img/".$namefile);

    return $namefile;

}

function cari($data){
    $produk = "SELECT * FROM produk WHERE produk LIKE '%$data%' OR
                                       harga LIKE '%$data%' OR
                                       kategori LIKE '%$data%' ";
    
    return ambil($produk);
}

function hapus($id){
    global $conn;

    $img = ambil("SELECT img FROM produk WHERE id = $id")[0];

    $gambar = $img["img"];

    unlink("img/$gambar");

    mysqli_query($conn,"DELETE FROM komentar WHERE id_produk = '$id' ");
    mysqli_query($conn,"DELETE FROM keranjang WHERE id_produk = $id ");
    mysqli_query($conn,"DELETE FROM produk WHERE id = $id ");

    return mysqli_affected_rows($conn);
}

function ganti($data){
    global $conn;
    $id = $data["id"];
    $produk = htmlspecialchars( $data["nama"] );
    $harga = htmlspecialchars( $data["harga"] );
    $kategori = $data["kategori"];
    $keterangan = htmlspecialchars( $data["keterangan"] );
    $gambarlama = htmlspecialchars( $data["gambarlama"] );

    if($_FILES["gambar"]["error"] === 4){
        $gambar = $gambarlama;

    }else{
        $gambar = upload();
    }

    $isi = "UPDATE produk SET
            produk = '$produk',
            harga = '$harga',
            keterangan = '$keterangan',
            img = '$gambar',
            kategori = '$kategori'
            WHERE id = $id;
            ";

    mysqli_query($conn,$isi);


    return mysqli_affected_rows($conn);

}

function tambahKomentar($data){
    global $conn;
    $id = $_POST["id"];
    $nama = htmlspecialchars( $data["nama"] );
    $komen = htmlspecialchars( $data["komentar"] );

    $isi = "INSERT INTO komentar VALUES ('','$nama','$komen','$id');";

    mysqli_query($conn,$isi);

    return mysqli_affected_rows($conn);

}

function hapusKomentar($id_komen){
    global $conn;
   
    $isi = "DELETE FROM komentar WHERE id = $id_komen ";
    mysqli_query($conn,$isi);

    return mysqli_affected_rows($conn);
}

function editKomentar($data){
    global $conn;
    $idkomen = $data["id_komen"];
    $komentar = $data["komentar"];

    $isi = "UPDATE komentar SET
            komentar = '$komentar'
            WHERE id = $idkomen;
    ";

    mysqli_query($conn,$isi);

    return mysqli_affected_rows($conn);

}

function daftar($data){
    global $conn;
    $username = strtolower( stripslashes($data["username"]) );
    $password = mysqli_real_escape_string($conn,$data["password"] );
    $password2 = $data["password2"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE nama = '$username' ");

    if(mysqli_fetch_assoc($result)){
        echo "
        <script>
            alert('username sudah ada')
        </script>";
        return false;
    }

    if($password !== $password2){
        echo "
        <script>
            alert('Password konfimasi salah')
        </script>";
        return false;
    }

    $idUser = uniqid();
    $password = password_hash($password,PASSWORD_DEFAULT);

    mysqli_query($conn,"INSERT INTO user VALUES('$idUser','$username','$password')");

    return mysqli_affected_rows($conn);


}

function tambahkeranjang($data){
    global $conn;
    $id_produk = $data["id_produk"];
    $user  = $data["user"];

    mysqli_query($conn,"INSERT INTO keranjang VALUES ($id_produk,'$user') ");

    return mysqli_affected_rows($conn);
}

function hapusKeranjang($id_produk,$user){
    global $conn;
    mysqli_query($conn,"DELETE FROM keranjang WHERE id_produk = $id_produk AND user = '$user' ");
    return mysqli_affected_rows($conn);
}

?>