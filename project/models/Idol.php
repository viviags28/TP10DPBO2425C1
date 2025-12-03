<?php
require_once "config/Database.php";

class Idol
{
    private $conn;
    private $table = "idol";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Ambil semua idol beserta nama agensi
    public function getAll()
    {
        $query = "
            SELECT i.*, a.nama AS agensi_nama
            FROM idol i
            JOIN agensi a ON i.agensi_id = a.id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil satu idol
    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah idol baru
    public function create($nama, $umur, $grup, $agensi_id)
    {
        $query = "INSERT INTO " . $this->table . " (nama, umur, grup, agensi_id)
                  VALUES (:nama, :umur, :grup, :agensi_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":umur", $umur);
        $stmt->bindParam(":grup", $grup);
        $stmt->bindParam(":agensi_id", $agensi_id);
        return $stmt->execute();
    }

    // Update idol
    public function update($id, $nama, $umur, $grup, $agensi_id)
    {
        $query = "UPDATE " . $this->table . " 
                  SET nama = :nama, umur = :umur, grup = :grup, agensi_id = :agensi_id
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nama", $nama);
        $stmt->bindParam(":umur", $umur);
        $stmt->bindParam(":grup", $grup);
        $stmt->bindParam(":agensi_id", $agensi_id);
        return $stmt->execute();
    }

    // Hapus idol
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
