<?php
    //KONEKSI MENGGUNAKAN PDO
    $host       = "localhost";
    $db_name    = "pertemuan8";
    $username   = "root";
    $pw         = "";

    $shortcut = "mysql:host=$host;dbname=$db_name";
    // $conn       = new PDO($shortcut, $username, $pw);

    // try {
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     echo 'Database connected successfully!';
    // }
    // catch (PDOException $e){
    //     echo 'Connection error : ' . $e->getMessage();
    // }


    /*--------------------------------------------------------------------------------------------------------------------------------------------------*/ 

    // KONEKSI MENGGUNAKAN MYSQLI
    $conn = new mysqli($host, $username, $pw, $db_name);
    if(mysqli_connect_errno())
    {
        die("Connection error : " . mysqli_connect_error());
    }


    // FUNCTION QUERY
    function query($query)
    {
        global $conn;
        $results = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($results))
        {
            $rows[] = $row; 
        }
        return $rows;
    }

    /*------------------------------------------------------------------------------------------------------------------------------------------------ */

    // FUNCTION INSERT DATA BARU
    function insert_data($data)
    {
        global $conn;
        $nim    = $data["nim"];
        $nama   = $data["nama"];
        $email  = $data["email"];
        $prodi  = $data["prodi"];

        $query  =  "INSERT INTO mahasiswa
                    VALUES
                    ('',  '$nim', '$nama', '$email', '$prodi')
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    // FUNCTION HAPUS DATA 
    function delete_data($id)
    {
        global $conn;
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

        return mysqli_affected_rows($conn);
        
    }

    
    // FUNCTION UPDATE DATA
    function update_data($data)
    {
        global $conn;
        $id     = $data["id"]; 
        $nim    = $data["nim"];
        $nama   = $data["nama"];
        $email  = $data["email"];
        $prodi  = $data["prodi"];

        $query  =  "UPDATE mahasiswa SET
                        nim = '$nim',
                        nama = '$nama',
                        email = '$email',
                        prodi = '$prodi'
                    WHERE id = $id;
                    ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    // FUNCTION CARI DATA
    function cari($keyword)
    {
        $query = "SELECT * FROM mahasiswa
        WHERE 
        nama LIKE '$keyword'
        OR
        nim LIKE '$keyword'
        OR
        email LIKE '$keyword'
        OR
        prodi LIKE '$keyword'
        ";
    }

?>