<?php 
    include('includes/functions.php');

    $id = $_GET["id"];
    if(delete_data($id) > 0)
    {
        echo "
            <script>
                alert('Penghapusan Data Berhasil!');
                document.location.href = 'index.php';
            </script>
        ";
    }
    else {
        echo "
        <script>
            alert('Penghapusan Data Gagal!');
            document.location.href = 'index.php';
        </script>
        ";
    }

?>

