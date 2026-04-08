<header class=" header header__horizontal">
    <h1 class="header__title">ONLY WAY</h1>
    <input type="text" id="input-buscar" class="input-buscar" placeholder="¿Qué buscás?">
    <nav class="navbar__vertical">
        <a href="<?php echo BASE_URL ?>/?page=carrito" class="navbar__link"><span class="navbar__text"><i class="bi bi-heart"></i>Favoritos</span> </a>
        <a href="<?php echo BASE_URL ?>/?page=favoritos" class="navbar__link"><span class="navbar__text"><i class="bi bi-cart"></i> Carrito</span></a>
        <?php include BASE_PATH . '/views/includes/sessions.php'; ?>
    </nav>
</header>