<?php
// Include semua ViewModel yang dibutuhkan
require_once 'viewmodels/AgensiViewModel.php';
require_once 'viewmodels/IdolViewModel.php';
require_once 'viewmodels/EventViewModel.php';
require_once 'viewmodels/JadwalViewModel.php';

// Ambil entity dan action dari query string, default: 'idol' dan 'list'
$entity = isset($_GET['entity']) ? $_GET['entity'] : 'idol';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

/* ============================================================
   =====================  AGENSI ROUTES  =====================
   ============================================================ */
if ($entity === 'agensi') {
    $vm = new AgensiViewModel(); // Buat instance AgensiViewModel

    switch ($action) {

        case 'list':
            $agensiList = $vm->getAgensiList(); // Ambil semua data agensi
            require 'views/agensi_list.php';     // Tampilkan view list
            break;

        case 'add':
            require 'views/agensi_form.php';     // Tampilkan form tambah agensi
            break;

        case 'edit':
            $id = $_GET['id'];                   // Ambil ID dari URL
            $agensi = $vm->getAgensiById($id);   // Ambil data agensi untuk diedit
            require 'views/agensi_form.php';     // Tampilkan form edit
            break;

        case 'save':
            // Simpan data baru ke database
            $vm->addAgensi($_POST['nama'], $_POST['alamat'], $_POST['kontak']);
            header('Location: index.php?entity=agensi&action=list'); // Redirect ke list
            break;

        case 'update':
            $id = $_GET['id'];
            // Update data agensi
            $vm->updateAgensi($id, $_POST['nama'], $_POST['alamat'], $_POST['kontak']);
            header('Location: index.php?entity=agensi&action=list');
            break;

        case 'delete':
            $vm->deleteAgensi($_GET['id']); // Hapus data agensi
            header('Location: index.php?entity=agensi&action=list');
            break;

        default:
            echo "Invalid action."; // Jika action tidak dikenali
    }

/* ============================================================
   =====================  IDOL ROUTES  =======================
   ============================================================ */
} elseif ($entity === 'idol') {
    $vm = new IdolViewModel(); // Buat instance IdolViewModel

    switch ($action) {

        case 'list':
            $idolList = $vm->getIdolList(); // Ambil semua data idol
            require 'views/idol_list.php';
            break;

        case 'add':
            $agensiList = $vm->getAgensi(); // Ambil list agensi untuk dropdown
            require 'views/idol_form.php';
            break;

        case 'edit':
            $id = $_GET['id'];
            $idol = $vm->getIdolById($id);   // Ambil data idol untuk diedit
            $agensiList = $vm->getAgensi();  // Ambil list agensi untuk dropdown
            require 'views/idol_form.php';
            break;

        case 'save':
            // Simpan data idol baru
            $vm->addIdol($_POST['nama'], $_POST['umur'], $_POST['grup'], $_POST['agensi_id']);
            header('Location: index.php?entity=idol&action=list');
            break;

        case 'update':
            $id = $_GET['id'];
            // Update data idol
            $vm->updateIdol($id, $_POST['nama'], $_POST['umur'], $_POST['grup'], $_POST['agensi_id']);
            header('Location: index.php?entity=idol&action=list');
            break;

        case 'delete':
            $vm->deleteIdol($_GET['id']); // Hapus data idol
            header('Location: index.php?entity=idol&action=list');
            break;
        
        default:
            echo "Invalid action.";
    }

/* ============================================================
   =====================  EVENT ROUTES  ======================
   ============================================================ */
} elseif ($entity === 'event') {
    $vm = new EventViewModel();

    switch ($action) {

        case 'list':
            $eventList = $vm->getEventList(); // Ambil semua event
            require 'views/event_list.php';
            break;

        case 'add':
            require 'views/event_form.php';
            break;

        case 'edit':
            $id = $_GET['id'];
            $event = $vm->getEventById($id); // Ambil data event untuk diedit
            require 'views/event_form.php';
            break;

        case 'save':
            $vm->addEvent($_POST['nama_event'], $_POST['lokasi'], $_POST['tipe_event']);
            header('Location: index.php?entity=event&action=list');
            break;

        case 'update':
            $id = $_GET['id'];
            $vm->updateEvent($id, $_POST['nama_event'], $_POST['lokasi'], $_POST['tipe_event']);
            header('Location: index.php?entity=event&action=list');
            break;

        case 'delete':
            $vm->deleteEvent($_GET['id']); // Hapus event
            header('Location: index.php?entity=event&action=list');
            break;

        default:
            echo "Invalid action.";
    }

/* ============================================================
   =====================  JADWAL ROUTES  =====================
   ============================================================ */
} elseif ($entity === 'jadwal') {
    $vm = new JadwalViewModel();

    switch ($action) {

        case 'list':
            $jadwalList = $vm->getJadwalList(); // Ambil semua jadwal
            require 'views/jadwal_list.php';
            break;

        case 'add':
            $idolList = $vm->getIdol();   // Ambil list idol untuk dropdown
            $eventList = $vm->getEvent(); // Ambil list event untuk dropdown
            require 'views/jadwal_form.php';
            break;

        case 'edit':
            $id = $_GET['id'];
            $jadwal = $vm->getJadwalById($id); // Ambil data jadwal untuk diedit
            $idolList = $vm->getIdol();
            $eventList = $vm->getEvent();
            require 'views/jadwal_form.php';
            break;

        case 'save':
            $vm->addJadwal($_POST['idol_id'], $_POST['event_id'], $_POST['tanggal'], $_POST['jam']);
            header('Location: index.php?entity=jadwal&action=list');
            break;

        case 'update':
            $id = $_GET['id'];
            $vm->updateJadwal($id, $_POST['idol_id'], $_POST['event_id'], $_POST['tanggal'], $_POST['jam']);
            header('Location: index.php?entity=jadwal&action=list');
            break;

        case 'delete':
            $vm->deleteJadwal($_GET['id']);
            header('Location: index.php?entity=jadwal&action=list');
            break;

        default:
            echo "Invalid action.";
    }
} else {
    echo "Invalid entity."; // Jika entity tidak dikenali
}