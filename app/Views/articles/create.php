<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2>Tambah Artikel</h2>

<form action="/articles/store" method="post">
    <?= csrf_field() ?>

    <label>Judul</label><br>
    <input type="text" name="title" required><br><br>

    <label>Isi Artikel</label><br>
    <textarea name="content" rows="5" required></textarea><br><br>

    <label>Kategori</label><br>
    <select name="category_id" required>
        <option value="">-- Pilih Kategori --</option>
        <?php foreach($categories as $c): ?>
            <option value="<?= $c['id'] ?>">
                <?= $c['name'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>

<?= $this->endSection() ?>
