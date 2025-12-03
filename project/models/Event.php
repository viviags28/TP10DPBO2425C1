<?php
require_once "config/Database.php";

class Event
{
    private $conn;  
    private $table = "event"; // Nama tabel

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Ambil semua event
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil event berdasarkan ID
    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah event baru
    public function create($nama_event, $lokasi, $tipe_event)
    {
        $query = "INSERT INTO " . $this->table . " (nama_event, lokasi, tipe_event)
                  VALUES (:nama_event, :lokasi, :tipe_event)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nama_event", $nama_event);
        $stmt->bindParam(":lokasi", $lokasi);
        $stmt->bindParam(":tipe_event", $tipe_event);
        return $stmt->execute();
    }

    // Update event
    public function update($id, $nama_event, $lokasi, $tipe_event)
    {
        $query = "UPDATE " . $this->table . "
                  SET nama_event = :nama_event, lokasi = :lokasi, tipe_event = :tipe_event
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nama_event", $nama_event);
        $stmt->bindParam(":lokasi", $lokasi);
        $stmt->bindParam(":tipe_event", $tipe_event);
        return $stmt->execute();
    }

    // Hapus event
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
