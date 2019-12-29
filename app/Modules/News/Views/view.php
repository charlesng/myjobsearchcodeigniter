<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<?php
echo '<h2>' . $news['title'] . '</h2>';
echo $news['body'];
?>
<?= $this->endSection() ?>