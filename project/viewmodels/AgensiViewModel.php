<?php
require_once 'models/Agensi.php';

class AgensiViewModel
{
    private $agensi; // Menyimpan instance model Agensi

    public function __construct()
    {
        $this->agensi = new Agensi(); // Membuat objek Agensi untuk mengakses fungsi CRUD
    }

    // Ambil semua data agensi
    public function getAgensiList()
    {
        return $this->agensi->getAll();
    }

    // Ambil data agensi berdasarkan ID
    public function getAgensiById($id)
    {
        return $this->agensi->getById($id);
    }

    // Tambah data agensi baru
    public function addAgensi($nama, $alamat, $kontak)
    {
        return $this->agensi->create($nama, $alamat, $kontak);
    }

    // Update data agensi berdasarkan ID
    public function updateAgensi($id, $nama, $alamat, $kontak)
    {
        return $this->agensi->update($id, $nama, $alamat, $kontak);
    }

    // Hapus data agensi berdasarkan ID
    public function deleteAgensi($id)
    {
        return $this->agensi->delete($id);
    }
}
