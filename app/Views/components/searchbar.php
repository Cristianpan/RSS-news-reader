<div class="container">
    <form action="<?= url_to('news') ?>" class="search-bar" id="search-bar">
        <input type="search" name="search" value="<?= $_GET['search'] ?? '' ?>" placeholder="Ingresa el título, nombre del sitio o categoría" class="search-bar__input">
        <button title="Buscar" type="submit" class="search-bar__button">
            <img src="/assets/images/search-icon.svg" alt="search icon" width="24" height="24">
        </button>
    </form>
</div>