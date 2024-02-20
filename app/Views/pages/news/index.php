<?php $this->extend('components/layout') ?>
<?php $this->section('css') ?>
<link rel="stylesheet" href="/assets/css/home.min.css">

<?php $this->endSection('css') ?>


<?php $this->section('content') ?>

<h1 class="home-title">Busca entre tus sitios favoritos</h1>

<?= view('components/searchbar') ?>

<main class="cards-container">
    <?php foreach ($news as $new) { ?>
        
    <article class="news-card">
        <div class="news-card__image">
            <img src="<?=$new['image'] ?>" alt ="Imagen de la noticia<?=$new['title'] ?>">
        </div>
        <div class="news-card__info-container">
            <h1 class="news-card__title"><?=$new['title'] ?></h1>
            <div class="news-card__categories-container">
                <?php foreach ($categories as $categorie) {
                    if ($categorie['newId'] == $new['id'] ) { ?>
                        <p class="news-card__category">#<?=$categorie['name'] ?></p>
                    <?php }
                 } ?>
            </div>
            <div class="news-card__detail">
                <p class="news-card__detail--date"><?= strftime("%d/%m/%Y", strtotime($new['date'])); ?></p>
                <p class="news-card__detail--description"><?=$new['description'] ?></p>
                <a class="news-card__detail--link" href="<?=$new['url'] ?>" target="_blank">-> Leer Más</a>
            </div>
        </div>
    </article>
        
    <?php } ?>
</main>

<?php $this->endSection() ?>

<?php $this->section('js') ?>
<script src="/assets/js/home.min.js"></script>
<?php $this->endSection('js') ?>