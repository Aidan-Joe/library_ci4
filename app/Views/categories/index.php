<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2>Data Kategori</h2>

<a href="/categories/create">+ Tambah</a>

<table border="1" cellpadding="5">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Aksi</th>
</tr>

<?php $no=1; foreach($categories as $c): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $c['name'] ?></td>
    <td>
        <button>
        <a href="/categories/edit/<?= $c['id'] ?>">Edit</a></button>

        <form action="/categories/delete/<?= $c['id'] ?>" method="post" style="display:inline;">
            <?= csrf_field() ?>
            <button onclick="return confirm('Hapus data?')">Delete</button>
        </form>
    </td>
</tr>
<?php endforeach; ?>
</table>


<?= $this->endSection() ?>


