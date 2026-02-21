<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h2><?= $article['title'] ?></h2>
<p><?= $article['content'] ?></p>

<a href="/">Kembali</a>

<?= $this->endSection() ?>
