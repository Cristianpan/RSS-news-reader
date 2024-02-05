<?php $this->extend('components/layout') ?>
<?php $this->section('css') ?>
<link rel="stylesheet" href="/assets/css/home.min.css">

<?php $this->endSection('css') ?>


<?php $this->section('content') ?>

<h1 class="title">Busca entre tus sitios favoritos</h1>

<?= view('components/searchbar')?>


<div class="cards--container">
    <?php
        for ($i = 1; $i <= 5; $i++) {
    ?>
        <div class="card">
            <div class="card__image">
                <img src="/assets/images/flores.jpg">
            </div>
            <div class="card__info">
                <h1 class="card__info__title">Este es el título de la noticia</h1>
                <div class="card__info__categorie">
                <?php
                    for ($j = 1; $j <= 2; $j++) {
                ?>
                     <p class="card__info__categorie__title">Categoría</p>   
                 <?php
                    }
                ?>
                </div>
                <p class="card__info__date content--size">12/06/24</p>
                <p class="card__info__description content--size">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
                tempor incididunt ut labore minim veniam, minim veniam, quis...
                </p>
                <a class="card__info__link content--size" href="#">-> Leer Más</a>
            </div>
        </div>
    <?php
        }
    ?>
</div>

<?php $this->endSection() ?>