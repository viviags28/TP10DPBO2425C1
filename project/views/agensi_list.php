<?php require_once 'views/template/header.php'; ?>

<h2>Daftar Agensi</h2>
<a href="index.php?entity=agensi&action=add">+ Tambah Agensi</a>

<table>
    <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kontak</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($agensiList as $a): ?>
        <tr>
            <td><?= htmlspecialchars($a['nama']); ?></td>
            <td><?= htmlspecialchars($a['alamat']); ?></td>
            <td><?= htmlspecialchars($a['kontak']); ?></td>
            <td>
                <a class="btn-edit" href="index.php?entity=agensi&action=edit&id=<?= $a['id']; ?>">Edit</a> |
                <a class="btn-danger" href="index.php?entity=agensi&action=delete&id=<?= $a['id']; ?>" 
                   onclick="return confirm('Yakin hapus?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'views/template/footer.php'; ?>
