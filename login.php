<?php

require 'fungsi.php';

session_start();

$error = false;
$daftar = false;

if(isset($_POST["daftar"])){
    $daftar = true;
}

if(isset($_POST["login"]) ){
    $daftar = false;
}

if(isset($_POST["kirimDaftar"]) ){
    if(daftar($_POST) > 0){
        echo "
        <script>
            document.location.href = 'login.php' ;
        </script>";
    }else{
        $daftar = true;
    }
}

if( isset($_POST["kirimLogin"]) ){
    $nama = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE nama = '$nama' ");

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row["password"]) ){
            $nama = $row["id"];
            $_SESSION["login"] = true;
            $_SESSION["user"] = $nama;
            echo "
            <script>
                document.location.href = 'index.php' ;
            </script>";
        }
    }

    $error = true;

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopman | Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    
    <!-- navbar -->
    <nav>
        <h1>Shopman</h1>
        <ul>
            <li>Butuh Bantuan?</li>
        </ul>
    </nav>

    <!-- login -->
    <div class="login" style="background-image: url('img_kategori/login.jpg');">
        <div class="div"></div>
        <!-- login-->
        <?php if($daftar === false) : ?>
        <div class="isiLogin">
            <form action="" method="post">
            <h1>Log In</h1>
            <input type="text" name="username" id="username" placeholder="Username" require autocomplete="off">
        
            <input type="password" name="password" id="password" class="password" placeholder="Password" require autocomplete="off">
            <?php if($error === true) : ?>
            <p style="color: red;">Nama / Password Salah</p>
            <?php endif ; ?>    
            <button type="submit" name="kirimLogin" id="kirimLogin" class="kirim">LOG IN</button>
            <h6>Belum Punya Akun bisa <button name="daftar">Daftar</button> Dulu Disini</h6>

            </form>
        </div>
        <?php endif ; ?>
        <!-- daftar -->
        <?php if($daftar === true) : ?>
        <div class="isiDaftar">
            <form action="" method="post">
            <h1>Daftar</h1>
            <input type="text" name="username" id="username" placeholder="Username" require autocomplete="off">
        
            <input type="password" name="password" id="password" class="password" placeholder="Password" require autocomplete="off">
            <input type="password" name="password2" id="password2" class="password" placeholder="Konfirmasi Password" require autocomplete="off">

            <button type="submit" name="kirimDaftar" id="kirimDaftar" class="kirim" >Daftar</button>
            <h6>Udah Punya Akun bisa <button name="login">Login</button>Disini</h6>

            </form>
        </div>
        <?php endif ; ?>
    </div>
    

</body>
</html>