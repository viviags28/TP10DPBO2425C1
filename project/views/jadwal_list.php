<?php require_once 'views/template/header.php'; ?>

<h2>Daftar Jadwal Idol</h2>
<a href="index.php?entity=jadwal&action=add">+ Tambah Jadwal</a>

<table>
    <tr>
        <th>Idol</th>
        <th>Event</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($jadwalList as $j): ?>
        <tr>
            <td><?= htmlspecialchars($j['idol_nama']); ?></td>
            <td><?= htmlspecialchars($j['event_nama']); ?></td>
            <td><?= htmlspecialchars($j['tanggal']); ?></td>
            <td><?= htmlspecialchars($j['jam']); ?></td>
            <td>
                <a class="btn-edit" href="index.php?entity=jadwal&action=edit&id=<?= $j['id']; ?>">Edit</a> |
                <a class="btn-danger" href="index.php?entity=jadwal&action=delete&id=<?= $j['id']; ?>"
                   onclick="return confirm('Hapus jadwal ini?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'views/template/footer.php'; ?>
