<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Más Noticias</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preload" href="/assets/css/global.min.css" as="style">
    <link rel="stylesheet" href="/assets/css/global.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="preload" as="style">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">

    <?php $this->renderSection('css') ?>
</head>

<body>
    <?= view("components/navbar") ?>

    <?php $this->renderSection('content') ?>

    <?php $this->renderSection('js') ?>

    <?php
    $response = session()->get('response');
    if (isset($response)) :
    ?>
        <div id="alert-response" data-response="<?= htmlspecialchars(json_encode($response)) ?>"></div>
    <?php endif; ?>
    <script src="/assets/js/alert-response.min.js"></script>
    <script src="/assets/js/navbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.js"></script>
</body>

</html>