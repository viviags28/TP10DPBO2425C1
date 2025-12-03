<?php
require_once 'models/Idol.php';
require_once 'models/Agensi.php';  // Dibutuhkan untuk dropdown agensi

class IdolViewModel
{
    private $idol;   // Instance model Idol
    private $agensi; // Instance model Agensi untuk ambil daftar agensi

    public function __construct()
    {
        $this->idol = new Idol();      
        $this->agensi = new Agensi();  
    }

    // CRUD Idol
    public function getIdolList()
    {
        return $this->idol->getAll(); // Ambil semua data idol beserta nama agensi
    }

    public function getIdolById($id)
    {
        return $this->idol->getById($id);
    }

    public function addIdol($nama, $umur, $grup, $agensi_id)
    {
        return $this->idol->create($nama, $umur, $grup, $agensi_id);
    }

    public function updateIdol($id, $nama, $umur, $grup, $agensi_id)
    {
        return $this->idol->update($id, $nama, $umur, $grup, $agensi_id);
    }

    public function deleteIdol($id)
    {
        return $this->idol->delete($id);
    }

    // Ambil daftar agensi untuk dropdown di form tambah/edit idol
    public function getAgensi()
    {
        return $this->agensi->getAll();
    }
}
