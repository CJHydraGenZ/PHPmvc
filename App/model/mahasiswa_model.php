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

    // private $dbh; //databasse handler
    // private $stmt;

    // public function __construct()

    // {
    //     // koneksi
    //     // data source name
    //     $dsn  = 'mysql:host=localhost;dbname=phpmvc';
    //     try {
    //         $this->dbh = new PDO($dsn, 'root', '');
    //     } catch (PDOException $e) {
    //         die($e->getMessage());
    //     }
    // }

    // query




    private $table = 'mahasiswa';
    private $db;



    public function __construct()
    {
        $this->db = new Database;
    }



    public function getAllmahasiswa()
    {



        // query
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();

        // $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
        // // hari di isi execute biar aman
        // $this->stmt->execute();
        // // ambil semua datanya
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC); //kembalikan sebagai array assoc
    }
    public function getMahasiswaByID($id)
    {
        $this->db->query('SELECT * FROM' . $this->table . 'WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}
