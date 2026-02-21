<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2>Tambah Kategori</h2>

<form action="/categories/store" method="post">
    <?= csrf_field() ?>

    <label>Nama Kategori</label><br>
    <input type="text" name="name" required><br><br>

    <button type="submit">Simpan</button>
</form>

<?= $this->endSection() ?>
