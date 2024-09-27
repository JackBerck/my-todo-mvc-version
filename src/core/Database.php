<?php

class Database
{
    private $host = DB_HOST; // "localhost"
    private $user = DB_USER; // "root"
    private $pass = DB_PASSWORD; // ""
    private $db_name = DB_NAME; // "my_todo"
    private $dbh; // database handler
    private $stmt; // statement

    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db_name}"; // "mysql:host=localhost;dbname=my_todo"

        $option = [
            PDO::ATTR_PERSISTENT => true, // membuat koneksi terjaga terus
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // menampilkan error
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option); // membuat koneksi
        } catch (PDOException $e) {
            die($e->getMessage()); // jika gagal, tampilkan error
        }
    }

    // method untuk menjalankan query
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query); // menyiapkan query
    }

    // method untuk memasukkan data
    public function bind($param, $value, $type = null)
    {
        // cek tipe data
        if (is_null($type)) {
            switch (true) {
                case is_int($value): // jika tipe data integer
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value): // jika tipe data boolean
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value): // jika tipe data null
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR; // jika tipe data string
            }
        }

        $this->stmt->bindValue($param, $value, $type); // mengikat nilai
    }

    // method untuk mengeksekusi query
    public function execute()
    {
        $this->stmt->execute(); // menjalankan query
    }

    // method untuk menampilkan banyak data
    public function resultSet()
    {
        $this->execute(); // menjalankan query
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); // menampilkan banyak data
    }

    // method untuk menampilkan satu data
    public function single()
    {
        $this->execute(); // menjalankan query
        return $this->stmt->fetch(PDO::FETCH_ASSOC); // menampilkan satu data
    }

    // method untuk menghitung baris
    public function rowCount()
    {
        return $this->stmt->rowCount(); // menghitung baris
    }
}
