<?php
require_once 'models/Jadwal.php';
require_once 'models/Idol.php';
require_once 'models/Event.php';

class JadwalViewModel
{
    private $jadwal; // Instance model Jadwal
    private $idol;   // Instance model Idol untuk dropdown
    private $event;  // Instance model Event untuk dropdown

    public function __construct()
    {
        $this->jadwal = new Jadwal();
        $this->idol = new Idol();
        $this->event = new Event();
    }

    // CRUD Jadwal
    public function getJadwalList()
    {
        return $this->jadwal->getAll(); // Ambil semua jadwal beserta nama idol dan event
    }

    public function getJadwalById($id)
    {
        return $this->jadwal->getById($id);
    }

    public function addJadwal($idol_id, $event_id, $tanggal, $jam)
    {
        return $this->jadwal->create($idol_id, $event_id, $tanggal, $jam);
    }

    public function updateJadwal($id, $idol_id, $event_id, $tanggal, $jam)
    {
        return $this->jadwal->update($id, $idol_id, $event_id, $tanggal, $jam);
    }

    public function deleteJadwal($id)
    {
        return $this->jadwal->delete($id);
    }

    // Ambil daftar idol untuk dropdown di form tambah/edit jadwal
    public function getIdol()
    {
        return $this->idol->getAll();
    }

    // Ambil daftar event untuk dropdown di form tambah/edit jadwal
    public function getEvent()
    {
        return $this->event->getAll();
    }
}
