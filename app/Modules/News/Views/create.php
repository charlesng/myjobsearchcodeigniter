<?= $this->extend('app') ?>

<?= $this->section('content') ?>

<?= \Config\Services::validation()->listErrors(); ?>

<form action="/news/create">

    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="body">Text</label>
    <textarea name="body"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />

</form>
<?= $this->endSection() ?>