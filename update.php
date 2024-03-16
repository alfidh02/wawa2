<?php 
    include('includes/functions.php');

    // ambil data dari database berdasarkan id yang dikirimkan melalui URL
    $id = $_GET["id"];
    $mahasiswa = query ("SELECT * FROM mahasiswa WHERE id=$id")[0];
     
    // mengecek apakah tombol update sudah di klik (form-nya disubmit)
    if(isset($_POST['update']))
    {

        // mengecek nilai kembalian dari fungsi update_data($query) supaya bisa menjalankan fungsi alert
        // fungsi update_data($id) ada di file yang di include-kan -> functions.php
        if(update_data($_POST) > 0)
        {
            echo "
            <script>
                alert('Pengubahan Data Berhasil!');
                document.location.href = 'index.php';
            </script>
            ";
        }
        else 
        {
            echo "
            <script>
                alert('Pengubahan Data Gagal!');
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
    <title>Pertemuan 9</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h3>Edit data mahasiswa</h3>
        <br>
        <a href="index.php"> Kembali ke Daftar Mahasiswa</a>
        <br><br>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?=$mahasiswa["id"];?>">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" value="<?=$mahasiswa["nim"];?>">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?=$mahasiswa["nama"];?>">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?=$mahasiswa["email"];?>">
            <label for="prodi" class="form-label">Prodi</label>
            <input type="text" name="prodi" id="prodi" class="form-control" value="<?=$mahasiswa["prodi"];?>">
            <br>
            <button type="submit" name="update" class ="btn btn-success">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>