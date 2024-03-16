<?php 
    include('includes/functions.php');
    require('includes/navbar.php');

    // Mengecek apakah tombol submit sudah di klik (form-nya disubmit)
    if(isset($_POST['submit']))
    {

        // mengecek nilai kembalian dari fungsi insert_data($query) supaya bisa menjalankan fungsi alert
        // fungsi insert_data($query) ada di file yang di include-kan -> functions.php
        if(insert_data($_POST) > 0)
        {
            echo "
            <script>
                alert('Penambahan Data Berhasil!');
                document.location.href = 'index.php';
            </script>
            ";
        }
        else 
        {
            echo "
            <script>
                alert('Penambahan Data Gagal!');
                document.location.href = 'index.php';
            </script>
            "; 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pertemuan 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h3>Tambahkan mahasiswa baru</h3>
        <br>
        <a href="index.php"> Kembali ke Daftar Mahasiswa</a>
        <br><br>
        <form action="" method="POST">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control"
            <label for="prodi" class="form-label">Prodi</label>
            <input type="text" name="prodi" id="prodi" class="form-control">
            <br>
            <button type="submit" name="submit" class ="btn btn-success">Submit</button>
        </form>
    </div>
</body>
</html>