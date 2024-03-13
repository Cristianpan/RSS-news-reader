<div class="container">
    <form action="<?= url_to('news') ?>" class="search-bar">
        <input type="search" name="search" value="<?= $_GET['search'] ?? '' ?>" placeholder="Ingresa el título, nombre del sitio o categoría" class="search-bar__input">
        <button type="submit" class="search-bar__button">
            <img src="/assets/images/search-icon.svg" alt="">
        </button>
    </form>
</div>