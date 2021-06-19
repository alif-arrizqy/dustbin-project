<!doctype html>

<head>
    <meta charset="UTF-8">
    <title>Smart Dustbin</title>
    <link rel="shortcut icon" href="<?= base_url('public/dist/images/trash32.png') ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- CSS -->
    <?= $this->include('layout/css') ?>

</head>

<body id="main-container" class="default">
    <?= $this->include('layout/header') ?>
    <!-- Content -->
    <?= $this->renderSection('content'); ?>
    <!-- Footer -->
    <?= $this->include('layout/footer') ?>
    <!-- /.site-footer -->
    <!-- JS -->
    <?= $this->include('layout/js') ?>
</body>