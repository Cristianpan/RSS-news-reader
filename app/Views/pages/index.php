<?php $this->extend('components/layout') ?>
<?php $this->section('css') ?>
<link rel="stylesheet" href="/assets/css/home.min.css">

<?php $this->endSection('css') ?>


<?php $this->section('content') ?>

<h1>Busca entre tus sitios favoritos</h1>

<?= view('components/searchbar')?>

<?php $this->endSection() ?>

<?php $this->section('js') ?>
<script src="/assets/js/searchbar.min.js"></script>
<?php $this->endSection('js') ?>
