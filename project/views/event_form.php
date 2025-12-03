<?php require_once 'views/template/header.php'; ?>

<h2><?= isset($event) ? 'Edit Event' : 'Tambah Event'; ?></h2>

<form action="index.php?entity=event&action=<?= isset($event) ? 'update&id='.$event['id'] : 'save'; ?>" method="POST">

    <label>Nama Event</label>
    <input type="text" name="nama_event" value="<?= isset($event) ? $event['nama_event'] : ''; ?>" required>

    <label>Lokasi</label>
    <input type="text" name="lokasi" value="<?= isset($event) ? $event['lokasi'] : ''; ?>" required>

    <label>Tipe Event</label>
    <input type="text" name="tipe_event" value="<?= isset($event) ? $event['tipe_event'] : ''; ?>" required>

    <button type="submit">Simpan</button>
</form>

<?php require_once 'views/template/footer.php'; ?>
