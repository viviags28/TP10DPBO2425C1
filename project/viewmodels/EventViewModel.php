<?php
require_once 'models/Event.php';

class EventViewModel
{
    private $event; // Menyimpan instance model Event

    public function __construct()
    {
        $this->event = new Event(); // Membuat objek Event
    }

    // Ambil semua data event
    public function getEventList()
    {
        return $this->event->getAll();
    }

    // Ambil event berdasarkan ID
    public function getEventById($id)
    {
        return $this->event->getById($id);
    }

    // Tambah event baru
    public function addEvent($nama_event, $lokasi, $tipe_event)
    {
        return $this->event->create($nama_event, $lokasi, $tipe_event);
    }

    // Update event
    public function updateEvent($id, $nama_event, $lokasi, $tipe_event)
    {
        return $this->event->update($id, $nama_event, $lokasi, $tipe_event);
    }

    // Hapus event
    public function deleteEvent($id)
    {
        return $this->event->delete($id);
    }
}
