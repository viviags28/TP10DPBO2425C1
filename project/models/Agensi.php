<?php
require_once "config/Database.php";

class Agensi
{
    private $conn;      // Menyimpan koneksi database
    private $table = "agensi"; // Nama tabel yang digunakan

    public function __construct()
    {
        // Membuat objek Database dan mendapatkan koneksi PDO
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Ambil semua data agensi
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengembalikan array asosiatif semua baris
    }

    // Ambil data agensi berdasarkan ID
    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Mengembalikan satu baris sebagai array
    }

    // Tambah data agensi baru
    public function create($nama, $alamat, $kontak)
    {
        $query = "INSERT INTO " . $this->table . " (nama, alamat, kontak) 
                  VALUES (:nama, :alamat, :kontak)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":alamat", $alamat);
        $stmt->bindParam(":kontak", $kontak);
        return $stmt->execute(); // Mengembalikan true jika berhasil
    }

    // Update data agensi berdasarkan ID
    public function update($id, $nama, $alamat, $kontak)
    {
        $query = "UPDATE " . $this->table . " 
                  SET nama = :nama, alamat = :alamat, kontak = :kontak 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":alamat", $alamat);
        $stmt->bindParam(":kontak", $kontak);
        return $stmt->execute();
    }

    // Hapus data agensi berdasarkan ID
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
