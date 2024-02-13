<header class="header">

    <a class="header__logo" href="/">
        <img class="header__logo-image" src="/assets/images/img2.svg" alt="logo">
    </a>

    <button class="header__nav-btn" id="header_nav-btn">
        <img class="header__nav-btn-img" id="btn-open" src="/assets/images/list.svg" alt="Botón del menú">
        <img class="header__nav-btn-img header__nav-btn-img--close header__nav-btn-img--hidden" id="btn-close" src="/assets/images/close-md-svgrepo-com.svg" alt="Botón del menú">
    </button>

    <nav class="nav">
        <a class="nav__link nav__link--active" href="<?=url_to('news')?>">Inicio</a>
        <a class="nav__link" href="<?= url_to('websites') ?>">Registra Feeds</a>
    </nav>

</header>