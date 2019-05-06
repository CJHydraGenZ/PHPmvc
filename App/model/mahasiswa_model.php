<?php

class mahasiswa_model
{
    // private $mhs = [
    //     [
    //         "nama" => "cahya",
    //         "nim" => "170030390",
    //         "email" => "cahyasaga321@gmail.com",
    //         "jurusan" => "Sistem informasi"
    //     ],
    //     [
    //         "nama" => "Dyna",
    //         "nim" => "170030390",
    //         "email" => "cahyasaga321@gmail.com",
    //         "jurusan" => "Sistem informasi"
    //     ],
    //     [
    //         "nama" => "Tahie",
    //         "nim" => "170030390",
    //         "email" => "cahyasaga321@gmail.com",
    //         "jurusan" => "Sistem informasi"
    //     ]
    // ];

    private $dbh; //databasse handler
    private $stmt;

    public function __construct()

    {
        // koneksi
        // data source name
        $dsn  = 'mysql:host=localhost;dbname=phpmvc';
        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // query

    public function getAllmahasiswa()
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
        // hari di isi execute biar aman
        $this->stmt->execute();
        // ambil semua datanya
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); //kembalikan sebagai array assoc
    }
}
