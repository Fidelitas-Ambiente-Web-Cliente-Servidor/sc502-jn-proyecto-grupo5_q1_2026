<!DOCTYPE html>
<html lang="es">

<head>
    <?php include BASE_PATH . '/views/includes/head.php' ?>
    <script type="module" src="public/js/auth/auth.js"></script>
    <title>ONLY WAY - Home</title>
</head>

<body>
    <header class=" header header__horizontal">
        <h1 class="header__title">ONLY WAY</h1>
        <input type="text" id="input-buscar" class="input-buscar" placeholder="¿Qué buscás?">
        <nav class="navbar__vertical">
            <a href="<?php echo BASE_URL ?>/?page=carrito" class="navbar__link"><span class="navbar__text"><i class="bi bi-heart"></i>Favoritos</span> </a>
            <a href="<?php echo BASE_URL ?>/?page=favoritos" class="navbar__link"><span class="navbar__text"><i class="bi bi-cart"></i> Carrito</span></a>
            <?php include BASE_PATH . '/views/includes/sessions.php'; ?>
        </nav>
    </header>

    <div class="user-bar">
        <div class="user-bar__contenedor">
            <div class="user-bar__categorias">
                <a href="#" class="user-bar__categoria-link">TODOS</a>
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

    <main>
        <section class="banner">
            <h2 class="banner__titulo">TU TIENDA DE ROPA DEPORTIVA FAVORITA</h2>
            <a href="<?php echo BASE_URL ?>/?page=products" class="banner__boton">VER PRODUCTOS</a>
        </section>

        <section class="productos-destacados">
            <h2 class="productos-destacados__titulo">Productos Destacados</h2>

            <div class="productos-destacados__grid">
                <article class="product-card">
                    <div class="product-card__imagen-wrapper">
                        <img class="product-card__imagen" src="<?php echo BASE_URL; ?>/public/static/img/productos/zapatillas-running.jpg" alt="Zapatillas Running Pro Max">
                        <span class="product-card__descuento">-15%</span>
                    </div>
                    <div class="product-card__info">
                        <h3 class="product-card__nombre">Zapatillas Running Pro Max</h3>
                        <div class="product-card__precios">
                            <span class="product-card__precio-actual">₡38 250</span>
                            <span class="product-card__precio-original">₡45 000</span>
                        </div>
                        <button class="product-card__btn" id="btn-agregar-p001">
                            <i class="bi bi-cart product-card__btn-icon"></i> AGREGAR AL CARRITO
                        </button>
                    </div>
                </article>
                <article class="product-card">
                    <div class="product-card__imagen-wrapper">
                        <img class="product-card__imagen" src="<?php echo BASE_URL; ?>/public/static/img/productos/camiseta-deportiva.jpg" alt="Camiseta Deportiva Premium">
                    </div>
                    <div class="product-card__info">
                        <h3 class="product-card__nombre">Camiseta Deportiva Premium</h3>
                        <div class="product-card__precios">
                            <span class="product-card__precio-actual">₡12 000</span>
                        </div>
                        <button class="product-card__btn" id="btn-agregar-p002">
                            <i class="bi bi-cart product-card__btn-icon"></i> AGREGAR AL CARRITO
                        </button>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-card__imagen-wrapper">
                        <img class="product-card__imagen" src="<?php echo BASE_URL; ?>/public/static/img/productos/leggings-yoga.jpg" alt="Leggings Yoga Fit">
                        <span class="product-card__descuento">-20%</span>
                    </div>
                    <div class="product-card__info">
                        <h3 class="product-card__nombre">Leggings Yoga Fit</h3>
                        <div class="product-card__precios">
                            <span class="product-card__precio-actual">₡14 400</span>
                            <span class="product-card__precio-original">₡18 000</span>
                        </div>
                        <button class="product-card__btn" id="btn-agregar-p003">
                            <i class="bi bi-cart product-card__btn-icon"></i> AGREGAR AL CARRITO
                        </button>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-card__imagen-wrapper">
                        <img class="product-card__imagen" src="<?php echo BASE_URL; ?>/public/static/img/productos/conjunto-infantil.jpg" alt="Conjunto Infantil Deportivo">
                        <span class="product-card__descuento">-25%</span>
                    </div>
                    <div class="product-card__info">
                        <h3 class="product-card__nombre">Conjunto Infantil Deportivo</h3>
                        <div class="product-card__precios">
                            <span class="product-card__precio-actual">₡12 000</span>
                            <span class="product-card__precio-original">₡16 000</span>
                        </div>
                        <button class="product-card__btn" id="btn-agregar-p004">
                            <i class="bi bi-cart product-card__btn-icon"></i> AGREGAR AL CARRITO
                        </button>
                    </div>
                </article>

            </div>
        </section>
    </main>
    <?php include BASE_PATH . '/views/includes/footer.php' ?>
</body>

</html>