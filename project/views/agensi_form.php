<?php require_once 'views/template/header.php'; ?>

<h2><?= isset($agensi) ? 'Edit Agensi' : 'Tambah Agensi'; ?></h2>

<form action="index.php?entity=agensi&action=<?= isset($agensi) ? 'update&id='.$agensi['id'] : 'save'; ?>" method="POST">

    <label>Nama</label>
    <input type="text" name="nama" value="<?= isset($agensi) ? $agensi['nama'] : ''; ?>" required>

    <label>Alamat</label>
    <input type="text" name="alamat" value="<?= isset($agensi) ? $agensi['alamat'] : ''; ?>" required>

    <label>Kontak</label>
    <input type="text" name="kontak" value="<?= isset($agensi) ? $agensi['kontak'] : ''; ?>" required>

    <button type="submit">Simpan</button>
</form>

<?php require_once 'views/template/footer.php'; ?>
