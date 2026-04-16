<!DOCTYPE html>
<html lang="es">

<head>
    <?php include BASE_PATH . '/views/includes/head.php' ?>
    <script type="module" src="public/js/auth/auth.js"></script>
    <title>ONLY WAY - Home</title>
</head>

<body>
    <?php include BASE_PATH . '/views/includes/components/header_clients.php' ?>
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
    <?php include BASE_PATH . '/views/includes/components/footer.php' ?>
</body>

</html>