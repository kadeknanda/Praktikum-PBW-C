<?php
include 'koneksi.php';
function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows [] = $row;
    }
    return $rows;
}
function adduser(){
    global $koneksi;
    $nim = htmlspecialchars($_POST['nim']);
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);

    $query = "INSERT INTO data (nim, nama, telepon, alamat) VALUES ('$nim', '$nama', '$alamat')";
    $hasil = mysqli_query($koneksi, $query);
    if(!$hasil){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    }else{
        echo "
                <script>
                    alert('Data berhasil ditambah!');
                    document.location.href = 'index-admin.php';
                </script>
            ";
        
    }

}

function updatedata(){
    global $koneksi;
    $id_data = htmlspecialchars($_POST['id_data']);
    $nim = htmlspecialchars($_POST['nim']);
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $query = "UPDATE data SET nim = '$nim', nama = '$nama', alamat = '$alamat' WHERE id_data = '$id_data'";
    $hasil = mysqli_query($koneksi, $query);
    if(!$hasil){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    }else{
        echo "
                <script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'index-admin.php';
                </script>
            ";
        
    }


}

function hapusdata($id_data){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM data WHERE id_data = '$id_data'");
    return mysqli_affected_rows($koneksi);
}
?>
