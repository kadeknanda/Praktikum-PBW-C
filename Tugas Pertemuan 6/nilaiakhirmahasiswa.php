<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Akhir Mahasiswa</title>
</head>

<body>
    <div>
        <form action="nilaiakhirmahasiswa.php" method="POST">
            <h2>Formulir Penilaian Mahasiswa</h2>
            <div class="row">
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama">
                </div>
            </div>

            <div class="row">
                <div>
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" id="nim">
                </div>
            </div>

            <div class="row">
                <div>
                    <label for="n_t">Nilai Tugas</label>
                    <input type="number" name="n_t" id="n_t">
                </div>
            </div>

            <div class="row">
                <div>
                    <label for="n_uts">Nilai UTS</label>
                    <input type="number" name="n_uts" id="n_uts">
                </div>
            </div>

            <div class="row">
                <div>
                    <label for="n_uas">Nilai UAS</label>
                    <input type="number" name="n_uas" id="n_uas">
                </div>
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
    
    <h3>
        <?php
            $n_akhir = 0;
            if (isset($_POST['submit'])){
                    $tugas = $_POST['n_t'];
                    $uts = $_POST['n_uts'];
                    $uas = $_POST['n_uas']; 
                    $n_akhir = ($uts + $uas + $tugas)/3;

                    if($n_akhir >= 80){
                        echo "Nilai Akhir = " . $n_akhir . "<br> "; 
                        echo "Anda dinyatakan lulus dengan predikat A";
                    }

                    else if($n_akhir >= 70){
                        echo "Nilai Akhir = " . $n_akhir . "<br> ";
                        echo "Anda dinyatakan lulus dengan predikat B";
                    }
                    else if($n_akhir >= 60){
                        echo "Nilai Akhir = " . $n_akhir . "<br> "; 
                        echo "Anda dinyatakan lulus dengan predikat C";
                    }
                    else{
                        echo "Nilai Akhir = " . $n_akhir . "<br> ";
                        echo "Anda dinyatakan tidak lulus";
                    }
                }
            ?>
    </h3>
</body>
</html>