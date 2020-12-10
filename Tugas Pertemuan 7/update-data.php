<?php
require 'function.php';
if($_SESSION){
    $nama = $_SESSION["nama"];
}else{
    header("Location: login.php");
}
$id_data = $_GET['id_data'];
$data = query("SELECT * FROM data WHERE id_data = '$id_data'")[0];

if (isset($_POST['update'])){
    if(updatedata($_POST) > 0){
        echo "
                <script>
                    alert('data berhasil ditambah!');
                    document.location.href = 'index-admin.php';
                </script>
            ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/style.css">
    <title>Tambah Data</title>
</head>
<body class="tambah-bg">
    <div class="container">
        <div class="card w-75 rounded mt-3 mb-3 p-4" id="tambah-data">
            <h4 class="text-center p-3 bg-info text-white">Update Data Mahasiswa</h4>
            <form action="" method="POST">
            <input type="hidden" name="id_data" id="id_data"  value="<?=$data['id_data'];?>">
                <div class="row">
                    <div class="form-group col-md-10 ml-3">
                        <label for="nim">Nomor Induk Mahasiswa</label>
                        <input type="text" name="nim" id="nim" placeholder="Masukkan NIM" required  class="form-control" value="<?=$data['nim'];?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-10 ml-3">
                        <label for="nama">Nama Mahasiswa</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan nama" required  class="form-control" value="<?=$data['nama'];?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-10 ml-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat" required  class="form-control" value="<?=$data['alamat'];?>">
                    </div>
                </div>
                
                <button class="btn btn-warning  w-50" name="update" type="update" id="tombol">Update</button>
            </form>
        </div>
    </div>
</body>
</html>