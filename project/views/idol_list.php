<?php require_once 'views/template/header.php'; ?>

<h2>Daftar Idol</h2>
<a href="index.php?entity=idol&action=add">+ Tambah Idol</a>

<table>
    <tr>
        <th>Nama</th>
        <th>Umur</th>
        <th>Grup</th>
        <th>Agensi</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($idolList as $i): ?>
        <tr>
            <td><?= htmlspecialchars($i['nama']); ?></td>
            <td><?= htmlspecialchars($i['umur']); ?></td>
            <td><?= htmlspecialchars($i['grup']); ?></td>
            <td><?= htmlspecialchars($i['agensi_nama']); ?></td>
            <td>
                <a class="btn-edit" href="index.php?entity=idol&action=edit&id=<?= $i['id']; ?>">Edit</a> |
                <a class="btn-danger" href="index.php?entity=idol&action=delete&id=<?= $i['id']; ?>"
                   onclick="return confirm('Yakin hapus idol?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once 'views/template/footer.php'; ?>
