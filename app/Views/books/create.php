<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2>Tambah Buku</h2>

<form action="/books/store" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>

<?php if(session()->getFlashdata('errors')): ?>
<ul style="color:red;">
<?php foreach(session()->getFlashdata('errors') as $e): ?>
    <li><?= $e ?></li>
<?php endforeach ?>
</ul>
<?php endif; ?>

Judul <br>
<input type="text" name="title" value="<?= old('title') ?>"><br><br>

Penulis <br>
<input type="text" name="author" value="<?= old('author') ?>"><br><br>

Tahun <br>
<input type="number" name="year" value="<?= old('year') ?>"><br><br>

Kategori <br>
<select name="category_id">
<option value="">--Pilih--</option>
<?php foreach($categories as $c): ?>
<option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
<?php endforeach ?>
</select><br><br>

Upload Cover <br>
<input type="file" name="image"><br><br>

<button type="submit">Simpan</button>
</form>

<?= $this->endSection() ?>