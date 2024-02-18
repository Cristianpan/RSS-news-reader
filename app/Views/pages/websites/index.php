<?php $this->extend('components/layout'); ?>

<?php $this->section('css') ?>
<link rel="stylesheet" href="/assets/css/websites.min.css">
<?php $this->endSection() ?>

<?php $this->section('js') ?> 
<script src="/assets/js/websites.min.js"></script>
<?php $this->endSection()?>

<?php $this->section('content') ?>

<h1 class="websites-title">Registra tus sitios favoritos</h1>

<form class="websites-form" action="<?= url_to('website-create') ?>" method="post">
    <input class="websites-form__input" type="text" name="websiteUrl" placeholder="Ingresa el enlace del sitio, ej:  https://www.yucatan.com.mx/ ">
    <input class="websites-form__submit" type="submit" value="Registrar">
</form>

<main class="websites">
    <h2 class="websites-title websites-title--h2">Feeds registrados</h2>

    <?php for ($i = 0; $i < 10; $i++) : ?>
        <div class="website">
            <div class="website__info">
                <img class="website__icon" src="https://newspack-yucatan.s3.amazonaws.com/uploads/2023/06/cropped-favicon-background-32x32.png" alt="Icono de diario de yucatán">
                <p class="website__name">Diario de yucatán</p>
            </div>

            <form>
                <input type="text" value="<?= $i ?>" hidden name="id">
                <button type="submit" class="website__btn">
                    <img src="/assets/images/delete-icon.svg" alt="icono de eliminar">
                </button>
            </form>
        </div>

    <?php endfor ?>

</main>
<?php
$response = session()->get('response');
if (isset($response)) :
?>
    <div id="alert-response" data-response="<?= htmlspecialchars(json_encode($response)) ?>"></div>
<?php endif; ?>
<?php $this->endSection() ?>