<?= $this->extend('app') ?>

<?= $this->section('content') ?>

<?= \Config\Services::validation()->listErrors(); ?>

<form action="/news/create">

    <label for="title"><?= lang('News.createTitleLabel') ?></label>
    <input type="input" name="title" /><br />

    <label for="body"><?= lang('News.createTextLabel') ?></label>
    <textarea name="body"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />

</form>
<?= $this->endSection() ?>