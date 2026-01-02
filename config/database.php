<?php

class Database {
private $host = "localhost";
private $dbname = "todo";
private $username = "root";
private $password = "";

public $conn;

public function getConnection()
    {
        $this->conn = null;

try {
   $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo("Koneksi database gagal: " . $e->getMessage());
}
  return $this->conn;
}
}