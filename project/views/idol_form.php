<?php require_once 'views/template/header.php'; ?>

<h2><?= isset($idol) ? 'Edit Idol' : 'Tambah Idol'; ?></h2>

<form action="index.php?entity=idol&action=<?= isset($idol) ? 'update&id='.$idol['id'] : 'save'; ?>" method="POST">

    <label>Nama</label>
    <input type="text" name="nama" value="<?= isset($idol) ? $idol['nama'] : ''; ?>" required>

    <label>Umur</label>
    <input type="number" name="umur" value="<?= isset($idol) ? $idol['umur'] : ''; ?>" required>

    <label>Grup</label>
    <input type="text" name="grup" value="<?= isset($idol) ? $idol['grup'] : ''; ?>" required>

    <label>Agensi</label>
    <select name="agensi_id">
        <?php foreach ($agensiList as $a): ?>
            <option value="<?= $a['id']; ?>"
                <?= isset($idol) && $idol['agensi_id'] == $a['id'] ? 'selected' : ''; ?>>
                <?= $a['nama']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Simpan</button>
</form>

<?php require_once 'views/template/footer.php'; ?>
