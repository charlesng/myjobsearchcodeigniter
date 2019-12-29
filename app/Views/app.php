<!doctype html>
<html>

<head>
    <title><?= lang('Core.title') ?></title>
</head>

<body>
    <?= lang('Core.welcomeMessage') ?>
    <h1><?= $title; ?></h1>
    <?= $this->renderSection('content') ?>
    <em>&copy; 2019</em>
</body>

</html>