<?= $this->extend('app') ?>

<?= $this->section('content') ?>

<?php if (!empty($news) && is_array($news)) : ?>

    <?php foreach ($news as $news_item) : ?>

        <h3><?= $news_item['title'] ?></h3>

        <div class="main">
            <?= $news_item['body'] ?>
        </div>
        <p><a href="<?= 'news/' . $news_item['slug'] ?>">View article</a></p>

    <?php endforeach; ?>

<?php else : ?>

    <h3><?= $msgNoNews ?></h3>

    <p><?= $msgNoNewsDetail ?></p>

<?php endif ?>
<?= $this->endSection() ?>