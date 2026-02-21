<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2>Data Buku</h2>

<a href="/books/create">+ Tambah Buku</a>

<?php if(session()->getFlashdata('success')): ?>
<p style="color:green"><?= session()->getFlashdata('success') ?></p>
<?php endif; ?>

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Tahun</th>
    <th>Kategori</th>
    <th>Cover</th>
    <th>Aksi</th>
</tr>

<?php $no=1; foreach($books as $b): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $b['title'] ?></td>
    <td><?= $b['author'] ?></td>
    <td><?= $b['year'] ?></td>
    <td><?= $b['category'] ?></td>
    <td>
        <img src="/uploads/<?= $b['image'] ?>" width="100">
    </td>
    <td>
        <a href="/books/edit/<?= $b['id'] ?>">Edit</a>

        <form action="/books/delete/<?= $b['id'] ?>" method="post" style="display:inline;">
            <?= csrf_field() ?>
            <button onclick="return confirm('Hapus buku?')">Delete</button>
        </form>
    </td>
</tr>
<?php endforeach; ?>
</table>

<?= $this->endSection() ?>