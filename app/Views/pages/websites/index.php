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
    <input class="websites-form__input" type="text" name="websiteUrl" placeholder="Ingresa el enlace del sitio, ej:  https://www.yucatan.com.mx/" value="<?=old('websiteUrl') ?? ''?>">
    <input class="websites-form__submit" type="submit" value="Registrar">
</form>

<main class="websites">
    <h2 class="websites-title websites-title--h2">Feeds registrados</h2>

    <?php foreach ($websites as $website) { ?>
        <div class="website">
            <div class="website__info">
                <img class="website__icon" src="<?=$website['icon']?>" alt="Icono de diario de yucatán">
                <p class="website__name"><?=$website['name'] ?></p>
            </div>

            <form  action="<?= url_to('websites-delete') ?>" method="post">
                <input type="text" value="<?=$website['id'] ?>" hidden name="id">
                <button type="submit" class="website__btn">
                    <img src="/assets/images/delete-icon.svg" alt="icono de eliminar">
                </button>
            </form>
        </div>

    <?php } ?>

</main>
<?php
$response = session()->get('response');
if (isset($response)) :
?>
    <div id="alert-response" data-response="<?= htmlspecialchars(json_encode($response)) ?>"></div>
<?php endif; ?>
<?php $this->endSection() ?>