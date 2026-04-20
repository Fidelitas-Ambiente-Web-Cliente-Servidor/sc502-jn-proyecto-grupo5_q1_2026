<header class=" header header__horizontal">
    <a href="<?php  echo BASE_URL ?>/index.php">
        <h1 class="header__title">ONLY WAY</h1>
    </a>
    <input type="text" id="input-buscar" class="input-buscar" placeholder="¿Qué buscás?">
    <nav class="navbar__vertical">
        <a href="<?php echo BASE_URL ?>/?page=favoritos" class="navbar__link"><span class="navbar__text"><i class="bi bi-heart"></i>Favoritos</span> </a>
        <a href="<?php echo BASE_URL ?>/?page=carrito" class="navbar__link">
            <span class="navbar__text">
                <div class="cart-container">
                    <i class="bi bi-cart"></i>
                    <span id="cart-count" class="cart-badge"></span>
                </div>
                Carrito
            </span>
        </a>
        <?php include BASE_PATH . '/app/views/includes/sessions.php'; ?>
    </nav>
</header>
<div class="user-bar">
    <div class="user-bar__contenedor">
        <div class="user-bar__categorias">
            <a href="<?php echo BASE_URL ?>/?page=products" class="user-bar__categoria-link">TODOS</a>
            <span class="user-bar__categoria-separador">|</span>
            <a href="#" class="user-bar__categoria-link">HOMBRE</a>
            <span class="user-bar__categoria-separador">|</span>
            <a href="#" class="user-bar__categoria-link">MUJER</a>
            <span class="user-bar__categoria-separador">|</span>
            <a href="#" class="user-bar__categoria-link">INFANTIL</a>
            <span class="user-bar__categoria-separador">|</span>
            <a href="#" class="user-bar__categoria-link">ACCESORIOS</a>
        </div>
    </div>
</div>