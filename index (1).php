<?php 
    include('includes/functions.php');
    require('includes/navbar.php');

    // RETRIEVE DATA DARI DB MENGGUNAKAN FUNGSI QUERY
    // fungsi query ada file yang di include -> functions.php
    $mahasiswa = query("SELECT * FROM mahasiswa");
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
        <h3>Daftar Mahasiswa</h3>
        <br>
        <a href="insert.php"> Tambah Mahasiswa</a>
        <br><br>

        <!-- FORM CARI -->
        <form action="" method="">
            <div class="input-group mb-3">
                <input type="text" name="keyword" class="form-control" placeholder="Cari mahasiswa">
                <button class="btn btn-primary" type="submit" name="cari">Cari</button>
            </div>
        </form>
        <!-- END FORM CARI -->
        <table border="1" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Prodi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    // untuk variabel $mahasiswa, itu harus sesuai sama nama variabel seperti di line 7
                    foreach($mahasiswa as $mhs) : 
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $mhs["nim"] ?></td>
                    <td><?= $mhs["nama"] ?></td>
                    <td><?= $mhs["email"] ?></td>
                    <td><?= $mhs["prodi"] ?></td>
                    <td>
                        <a href="update.php?id=<?=$mhs["id"];?>" class="btn btn-info">Update</a> |
                        <a href="delete.php?id=<?=$mhs["id"];?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin menghapus')">Delete</a>
                    </td>
                </tr>

                <?php
                    $i++; 
                    endforeach; 
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>