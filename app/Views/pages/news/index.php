<?php

use App\Utils\UrlGenerator;
?>
<?php $this->extend('components/layout') ?>

<?php $this->section('css') ?>
<link rel="preload" href="<?= UrlGenerator::generateAssetUrl("/assets/css/home.min.css") ?>" as="style">
<link rel="stylesheet" href="<?= UrlGenerator::generateAssetUrl("/assets/css/home.min.css") ?>">
<?php $this->endSection('css') ?>

<?php $this->section('js') ?>
<script src="<?= UrlGenerator::generateAssetUrl("/assets/js/home.min.js") ?>"></script>
<?php $this->endSection('js') ?>


<?php $this->section('content') ?>

<h1 class="home-title">Busca entre tus sitios favoritos</h1>

<?= view('components/searchbar') ?>


<div class="news-action">
    <div class="news-filter">
        <select name="order" id="news-filter__select" class="news-filter__select">
            <option id="news-filter__label" selected disabled>Ordenar por: </option>
            <option value="date">Fecha</option>
            <option value="title">Título</option>
            <option value="category">Categoría</option>
        </select>
        <img src="/assets/images/down-arrow-icon.svg" alt="icon" class="news-filter__arrow">
    </div>
</div>


<main>
    <?php if (empty($news)) : ?>
        <h2 class="not-results">No se han encontrado resultados</h2>
        <img class="image-not-result" src="/assets/images/not-results.svg">
    <?php endif ?>

    <div class="cards-container">

        <?php foreach ($news as $new) { ?>

            <article class="news-card">
                <div class="news-card__image">
                    <img src="<?= $new['image'] ?? '/assets/images/bg-none.svg' ?>" loading="lazy" width="300" height="200" alt="Imagen de la noticia<?= $new['title'] ?>">
                </div>
                <div class="news-card__info-container">
                    <h1 class="news-card__title"><?= $new['title'] ?></h1>
                    <div class="news-card__categories-container">
                        <?php foreach ($categories as $categorie) {
                            if ($categorie['newId'] == $new['id']) { ?>
                                <p class="news-card__category">#<?= $categorie['name'] ?></p>
                        <?php }
                        } ?>
                    </div>
                    <div class="news-card__detail">
                        <p class="news-card__detail--date"><?= (new DateTime($new['date']))->format('d/m/Y'); ?></p>
                        <p class="news-card__detail--description"><?= $new['description'] ?></p>
                        <a class="news-card__detail--link" href="<?= $new['url'] ?>" target="_blank">-> Leer Más</a>
                    </div>
                </div>
            </article>

        <?php } ?>
    </div>
</main>

<?php $this->endSection() ?>