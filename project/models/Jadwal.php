<?php
require_once "config/Database.php";

class Jadwal
{
    private $conn;
    private $table = "jadwal";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Ambil semua jadwal beserta nama idol dan event
    public function getAll()
    {
        $query = "
            SELECT j.*, 
                   i.nama AS idol_nama,
                   e.nama_event AS event_nama
            FROM jadwal j
            JOIN idol i ON j.idol_id = i.id
            JOIN event e ON j.event_id = e.id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil jadwal berdasarkan ID
    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah jadwal baru
    public function create($idol_id, $event_id, $tanggal, $jam)
    {
        $query = "INSERT INTO " . $this->table . " 
                  (idol_id, event_id, tanggal, jam)
                  VALUES (:idol_id, :event_id, :tanggal, :jam)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":idol_id", $idol_id);
        $stmt->bindParam(":event_id", $event_id);
        $stmt->bindParam(":tanggal", $tanggal);
        $stmt->bindParam(":jam", $jam);
        return $stmt->execute();
    }

    // Update jadwal
    public function update($id, $idol_id, $event_id, $tanggal, $jam)
    {
        $query = "UPDATE " . $this->table . "
                  SET idol_id = :idol_id,
                      event_id = :event_id,
                      tanggal = :tanggal,
                      jam = :jam
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":idol_id", $idol_id);
        $stmt->bindParam(":event_id", $event_id);
        $stmt->bindParam(":tanggal", $tanggal);
        $stmt->bindParam(":jam", $jam);
        return $stmt->execute();
    }

    // Hapus jadwal
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
