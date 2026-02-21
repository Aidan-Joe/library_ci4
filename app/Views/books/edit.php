<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2>Edit Buku</h2>

<form action="/books/update/<?= $book['id'] ?>" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>

<input type="hidden" name="old_image" value="<?= $book['image'] ?>">

Judul <br>
<input type="text" name="title" value="<?= $book['title'] ?>"><br><br>

Penulis <br>
<input type="text" name="author" value="<?= $book['author'] ?>"><br><br>

Tahun <br>
<input type="number" name="year" value="<?= $book['year'] ?>"><br><br>

Kategori <br>
<select name="category_id">
<?php foreach($categories as $c): ?>
<option value="<?= $c['id'] ?>"
<?= $c['id']==$book['category_id']?'selected':'' ?>>
<?= $c['name'] ?>
</option>
<?php endforeach ?>
</select><br><br>

Gambar Lama <br>
<img src="/uploads/<?= $book['image'] ?>" width="120"><br><br>

Ganti Gambar <br>
<input type="file" name="image"><br><br>

<button type="submit">Update</button>
</form>

<?= $this->endSection() ?>