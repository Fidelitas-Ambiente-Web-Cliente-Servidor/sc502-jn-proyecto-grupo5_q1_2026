<!DOCTYPE html>
<html lang="es">

<head>
    <script>
        const PHP_URL = "<?php echo BASE_URL; ?>";
    </script>
    <?php include BASE_PATH . '/app/views/includes/head.php' ?>
    <title>Only Way - Productos</title>
</head>

<body>
    <?php include BASE_PATH . '/app/views/includes/components/header_clients.php' ?>

    <main>
        <section class="banner banner--products">
            <h2 class="banner__titulo">NUESTRA COLECCIÓN</h2>
            <p class="banner__subtitulo">Encuentra el estilo que mejor se adapta a tu rendimiento</p>
        </section>

        <section class="productos-destacados">
            <div class="productos-destacados__contenedor">
                <h2 class="productos-destacados__titulo">Todos los Productos</h2>
                <div class="productos-destacados__grid">
                    <article class="product-card">
                        <div class="product-card__imagen-wrapper">
                            <img class="product-card__imagen" />
                        </div>
                        <div class="product-card__info">
                            <h3 class="product-card__nombre"></h3>
                            <div class="product-card__precios">
                                <span class="product-card__precio-actual"></span>
                            </div>

                            <a href="/?page=product-detail&id=" class="product-card__btn" id="btn-ver-detalle">
                                <i class="bi bi-cart product-card__btn-icon"></i> Ver Detalle
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <?php include BASE_PATH . '/app/views/includes/components/footer.php' ?>
</body>

</html>