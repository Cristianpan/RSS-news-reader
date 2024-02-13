<?php $this->extend('components/layout') ?>
<?php $this->section('css') ?>
<link rel="stylesheet" href="/assets/css/home.min.css">

<?php $this->endSection('css') ?>


<?php $this->section('content') ?>

<h1 class="home-title">Busca entre tus sitios favoritos</h1>

<?= view('components/searchbar') ?>

<main class="cards-container">
    <?php
    for ($i = 1; $i <= 5; $i++) {
    ?>
        <article class="news-card">
            <div class="news-card__image">
                <img src="/assets/images/flores.jpg">
            </div>
            <div class="news-card__info-container">
                <h1 class="news-card__title">Este es el título de la noticia</h1>
                <div class="news-card__categories-container">
                    <?php
                    for ($j = 1; $j <= 2; $j++) {
                    ?>
                        <p class="news-card__category">Categoría</p>
                    <?php
                    }
                    ?>
                </div>
                <div class="news-card__detail">
                    <p class="news-card__detail--date">12/06/24</p>
                    <p class="news-card__detail--description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore minim veniam, minim veniam, quis...
                    </p>
                    <a class="news-card__detail--link" href="#">-> Leer Más</a>
                </div>
            </div>
        </article>
    <?php
    }
    ?>
</main>

<?php $this->endSection() ?>

<?php $this->section('js') ?>
<script src="/assets/js/home.min.js"></script>
<?php $this->endSection('js') ?>