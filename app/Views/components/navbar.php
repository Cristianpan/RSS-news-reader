<header class="header">

    <a class="header__logo" href="/">
        <img class="header__logo-image" src="/assets/images/img2.svg" alt="logo" width="195" height="45">
    </a>

    <button type="button" class="header__nav-btn" id="header_nav-btn">
        <img class="header__nav-btn-img" title="Abrir menú" id="btn-open" src="/assets/images/list.svg" alt="Botón del menú" width="56" height="35">
        <img class="header__nav-btn-img header__nav-btn-img--close header__nav-btn-img--hidden" title="Cerrar menú" id="btn-close" src="/assets/images/close-md-svgrepo-com.svg" alt="Botón del menú" width="56" height="35">
    </button>

    <nav class="nav" id="nav">
        <a class="nav__link <?= url_is('') ? 'nav__link--active ' : '' ?>" href="<?= url_to('news') ?>">Inicio</a>
        <a class="nav__link <?= url_is('websites') ? 'nav__link--active ' : '' ?>" href="<?= url_to('websites') ?>">Registrar feeds</a>
        <a class="nav__link--update-news" href="<?= url_to('news-update') ?>">Actualizar noticias</a>
    </nav>
</header>