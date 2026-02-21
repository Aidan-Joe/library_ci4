<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2>Edit Artikel</h2>

<form action="/articles/update/<?= $article['id'] ?>" method="post">
    <?= csrf_field() ?>

    <label>Judul</label><br>
    <input type="text" name="title" value="<?= $article['title'] ?>"><br><br>

    <label>Isi</label><br>
    <textarea name="content"><?= $article['content'] ?></textarea><br><br>

    <label>Kategori</label><br>
    <select name="category_id">
        <?php foreach($categories as $c): ?>
        <option value="<?= $c['id'] ?>"
            <?= $c['id'] == $article['category_id'] ? 'selected' : '' ?>>
            <?= $c['name'] ?>
        </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Update</button>
</form>

<?= $this->endSection() ?>
