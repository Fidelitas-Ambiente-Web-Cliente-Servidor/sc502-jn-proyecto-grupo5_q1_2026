<!DOCTYPE html>
<html lang="es">

<head>
    <?php include BASE_PATH . '/views/includes/head.php' ?>
    <script type="module" src="<?php echo BASE_URL; ?>/public/js/modules/cart.js"></script>
    <title>Only Way - Productos</title>
</head>

<body>
    <?php include BASE_PATH . '/views/includes/components/header_clients.php' ?>

    <main>
        <section class="banner banner--products">
            <h2 class="banner__titulo">NUESTRA COLECCIÓN</h2>
            <p class="banner__subtitulo">Encuentra el estilo que mejor se adapta a tu rendimiento</p>
        </section>

        <section class="productos-destacados">
            <div class="productos-destacados__contenedor">
                <h2 class="productos-destacados__titulo">Todos los Productos</h2>

                <div class="productos-destacados__grid">
                    <?php
                    require_once BASE_PATH . '/repository/ProductoRepository.php';
                    $productRepo = new ProductRepository();
                    $productos = $productRepo->obtenerProductosDestacados();

                    if (empty($productos)): ?>
                        <p>No se encontraron productos.</p>
                    <?php else: ?>
                        <?php foreach ($productos as $prod): ?>
                            <article class="product-card">
                                <div class="product-card__imagen-wrapper">
                                    <img class="product-card__imagen"
                                        src="<?php echo BASE_URL . $prod['imagen']; ?>"
                                        alt="<?php echo $prod['nombre_producto']; ?>">
                                </div>

                                <div class="product-card__info">
                                    <h3 class="product-card__nombre"><?php echo $prod['nombre_producto']; ?></h3>
                                    <div class="product-card__precios">
                                        <span class="product-card__precio-actual">₡<?php echo number_format($prod['precio'], 0, ',', '.'); ?></span>
                                    </div>

                                    <button class="product-card__btn" id="btn-agregar-p<?php echo $prod['id_producto']; ?>">
                                        <i class="bi bi-cart product-card__btn-icon"></i> AGREGAR AL CARRITO
                                    </button>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

    <?php include BASE_PATH . '/views/includes/components/footer.php' ?>
</body>

</html>