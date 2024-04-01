<?php

use App\Utils\UrlGenerator;
?>
<?php $this->extend('components/layout'); ?>

<?php $this->section('css') ?>
<link rel="preload" href="<?= UrlGenerator::generateAssetUrl("/assets/css/websites.min.css") ?>" as="style">
<link rel="stylesheet" href="<?= UrlGenerator::generateAssetUrl("/assets/css/websites.min.css") ?>">
<?php $this->endSection() ?>

<?php $this->section('js') ?>
<script src="<?= UrlGenerator::generateAssetUrl("/assets/js/websites.min.js") ?>"></script>
<?php $this->endSection() ?>

<?php $this->section('content') ?>

<h1 class="websites-title">¡Registra tus sitios favoritos!</h1>

<form class="websites-form" id="websites-form" action="<?= url_to('website-create') ?>" method="post">
    <input class="websites-form__input" type="text" name="websiteUrl" placeholder="Ingresa el enlace del sitio, ej:  https://www.yucatan.com.mx/" value="<?= old('websiteUrl') ?? '' ?>">
    <input class="websites-form__submit" type="submit" value="Registrar">
</form>

<main class="websites">

    <?php if (empty($websites)) { ?>
        <h2 class="not-results mt-4">No se han encontrado sitios registrados</h2>
        <img class="image-not-result" src="/assets/images/not-results.svg">
    <?php } else { ?>
        <h2 class="websites-title websites-title--h2">Feeds registrados</h2>
    <?php } ?>
    <?php foreach ($websites as $website) { ?>
        <div class="website">
            <div class="website__info">
                <img class="website__icon" src="<?= $website['icon'] ?>" alt="Icono de <?= $website['name'] ?>" width="40" height="40">
                <p class="website__name"><?= $website['name'] ?></p>
            </div>

            <form class="website-delete" action="<?= url_to('websites-delete') ?>" method="post">
                <input type="hidden" value="<?= $website['id'] ?>" hidden name="id">
                <button title="Eliminar" type="submit" class="website__btn">
                    <img src="/assets/images/delete-icon.svg" alt="icono de eliminar" width="38" height="38"> 
                </button>
            </form>
        </div>

    <?php } ?>

</main>
<?php $this->endSection() ?>