<?php
require 'function.php';
$id_data = $_GET['id_data'];
if(hapusdata($id_data) > 0){
     echo "
            <script>
            alert('Data telah terhapus!');
            document.location.href = 'index-admin.php';
            </script>
            ";
}else{
    echo "
            <script>
            alert('Data gagal terhapus!');
            document.location.href = 'tambah-data.php';
            </script>
            ";
    }
?>