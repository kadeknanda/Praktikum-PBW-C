<?php
require 'koneksi.php';

if($_SESSION){
    if($_SESSION["tingkatan_user"] == 'admin'){
        header("Location: index-admin.php");
    }else if ($_SESSION['tingkatan_user'] == 'pegawai'){
        header("Location: index-pegawai.php");
    }
}

if(isset($_POST["submit"])){
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = mysqli_escape_string ($koneksi, $_POST["password"]);

    $cek = mysqli_query($koneksi,"SELECT id_user,nama, username, password, tingkatan_user FROM user_data WHERE username = '$username'" );

    //cek username 
    if (mysqli_num_rows($cek) == 1){
        $row = mysqli_fetch_assoc($cek);

        if($password == $row["password"]){
            if($row["tingkatan_user"] == 'admin'){
                $_SESSION['login'] = true;
                $_SESSION['nama'] = $row["nama"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['password'] = $row["password"];
                $_SESSION['tingkatan_user'] = $row["tingkatan_user"];
                $_SESSION['id_user'] = $row["id_user"];
                header("Location: index-admin.php");

            }else if ($row['tingkatan_user'] == 'pegawai'){
                $_SESSION['login'] = true;
                $_SESSION['nama'] = $row["nama"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['password'] = $row["password"];
                $_SESSION['tingkatan_user'] = $row["tingkatan_user"];
                $_SESSION['id_user'] = $row["id_user"];
                header("Location: index-pegawai.php");
            }
        }
    }
    $error = true;
}

?>
<!DOCTYPE html lang = "en">
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="stylesheet/login.css">
    </head>

    <body class="login">
	<div id="container">
        <form action="" method="POST">
            <img id="logo" src="stylesheet/gambar/logo.png">
            <label for="fname">Username:</label>
            
            <div class="form-group">
            <input type="text" name="username" id="username" placeholder="Username Anda" required autofocus />
            <i class="fas fa-user"></i>
            </div>
            
            <label for="lname">Password:</label>
            
            <div class="form-group">
            <input type="password" name="password" id="password" placeholder="Password Anda" required />
            <i class="fas fa-key"></i>
            </div>
            
            <?php if (isset($error)) : ?>
                <p style="color:red; font-style:italic";>Username/Password Salah!</p>
             <?php endif; ?>

             <button type="submit" name="submit">Login</button><br/>
            <input type="reset" value="Reset">
          </form>
	</div>
    </body>
</html>