<?= $this->extend('app') ?>

<?= $this->section('content') ?>

<?= \Config\Services::validation()->listErrors(); ?>

<form action="<?= '/' . $locale . '/news/create' ?>">

    <label for="title"><?= $createTitleLabel ?></label>
    <input type="input" name="title" /><br />

    <label for="body"><?= $createTextLabel ?></label>
    <textarea name="body"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />

</form>
<?= $this->endSection() ?>