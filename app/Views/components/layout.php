<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Más Noticias</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
</body>

</html>