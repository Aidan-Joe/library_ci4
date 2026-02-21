<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2>Edit Kategori</h2>

<form action="/categories/update/<?= $category['id'] ?>" method="post">
    <?= csrf_field() ?>

    <input type="text" name="name" value="<?= $category['name'] ?>">

    <button type="submit">Update</button>
</form>

<?= $this->endSection() ?>
