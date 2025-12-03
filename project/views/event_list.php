<?php require_once 'views/template/header.php'; ?>

<h2>Daftar Event</h2>
<a href="index.php?entity=event&action=add">+ Tambah Event</a>

<table>
    <tr>
        <th>Nama Event</th>
        <th>Lokasi</th>
        <th>Tipe</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($eventList as $e): ?>
        <tr>
            <td><?= htmlspecialchars($e['nama_event']); ?></td>
            <td><?= htmlspecialchars($e['lokasi']); ?></td>
            <td><?= htmlspecialchars($e['tipe_event']); ?></td>
            <td>
                <a class="btn-edit" href="index.php?entity=event&action=edit&id=<?= $e['id']; ?>">Edit</a> |
                <a class="btn-danger" href="index.php?entity=event&action=delete&id=<?= $e['id']; ?>"
                   onclick="return confirm('Hapus event ini?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'views/template/footer.php'; ?>
