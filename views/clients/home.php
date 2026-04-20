<!DOCTYPE html>
<html lang="es">

<?php
require_once BASE_PATH . '/repository/ProductoRepository.php';
$productRepo = new ProductRepository();
$productos = $productRepo->obtenerProductosDestacados();
?>

<head>
    <?php include BASE_PATH . '/views/includes/head.php' ?>
    <script type="module" src="public/js/modules/cart.js"></script>
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

            <?php
            require_once BASE_PATH . '/repository/ProductoRepository.php';
            $productRepo = new ProductRepository();
            $productos = $productRepo->obtenerProductosDestacados();
            ?>
            <div class="productos-destacados__grid">
                <?php if (empty($productos)): ?>
                    <p>No hay productos disponibles en este momento.</p>
                <?php else: ?>
                    <?php foreach ($productos as $prod): ?>
                        <article class="product-card">
                            <div class="product-card__imagen-wrapper">
                                <img class="product-card__imagen"
                                    src="<?php echo BASE_URL . $prod['imagen']; ?>"
                                    alt="<?php echo $prod['nombre_producto']; ?>">

                                <?php if ($prod['precio'] < 15000): // Ejemplo de lógica para etiquetas 
                                ?>
                                    <span class="product-card__descuento">OFERTA</span>
                                <?php endif; ?>
                            </div>

                            <div class="product-card__info">
                                <h3 class="product-card__nombre"><?php echo $prod['nombre_producto']; ?></h3>
                                <div class="product-card__precios">
                                    <span class="product-card__precio-actual">₡<?php echo number_format($prod['precio'], 0, ',', ' '); ?></span>
                                </div>

                                <button class="product-card__btn" id="btn-agregar-p<?php echo $prod['id_producto']; ?>">
                                    <i class="bi bi-cart product-card__btn-icon"></i> AGREGAR AL CARRITO
                                </button>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>
</body>
    <?php include BASE_PATH . '/views/includes/components/footer.php' ?>
</html>