<?php require_once 'views/template/header.php'; ?>

<h2><?= isset($jadwal) ? 'Edit Jadwal' : 'Tambah Jadwal'; ?></h2>

<form action="index.php?entity=jadwal&action=<?= isset($jadwal) ? 'update&id='.$jadwal['id'] : 'save'; ?>" method="POST">

    <label>Idol</label>
    <select name="idol_id">
        <?php foreach ($idolList as $i): ?>
            <option value="<?= $i['id']; ?>"
                <?= isset($jadwal) && $jadwal['idol_id'] == $i['id'] ? 'selected' : ''; ?>>
                <?= $i['nama']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Event</label>
    <select name="event_id">
        <?php foreach ($eventList as $e): ?>
            <option value="<?= $e['id']; ?>"
                <?= isset($jadwal) && $jadwal['event_id'] == $e['id'] ? 'selected' : ''; ?>>
                <?= $e['nama_event']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Tanggal</label>
    <input type="date" name="tanggal" value="<?= isset($jadwal) ? $jadwal['tanggal'] : ''; ?>" required>

    <label>Jam</label>
    <input type="time" name="jam" value="<?= isset($jadwal) ? $jadwal['jam'] : ''; ?>" required>

    <button type="submit">Simpan</button>
</form>

<?php require_once 'views/template/footer.php'; ?>
