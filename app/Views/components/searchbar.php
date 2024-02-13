<div class="container">
    <form action="<?= url_to('news') ?>" class="search-bar">
        <input type="search" name="search" placeholder="Ingresa el título, nombre de la página o categoría" class="search-bar__input">
        <button type="submit" class="search-bar__button">
            <img src="/assets/images/search-icon.svg" alt="">
        </button>
    </form>
    <div class="news-filter">
        <select name="news-filter__select" id="news-filter__select" class="news-filter__select">
            <option value="fecha" selected>Fecha</option>
            <option value="titulo">Título</option>
            <option value="categoria">Categoría</option>
        </select>
        <img src="/assets/images/down-arrow-icon.svg" alt="" class="news-filter__arrow">
    </div>

</div>