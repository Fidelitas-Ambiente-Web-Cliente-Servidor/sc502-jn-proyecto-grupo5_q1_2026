<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include BASE_PATH . '/app/views/includes/head.php' ?>
    <title>Only Way - Detalle Producto</title>
</head>

<body>
    <?php include BASE_PATH . '/app/views/includes/components/header_clients.php' ?>
    
    <div style="max-width: 1200px; margin: 20px auto 0; padding: 0 20px;">
        <a href="?page=products" style="text-decoration: none; color: var(--color-terciario); font-weight: 600; display: flex; align-items: center; gap: 8px; font-family: var(--fuente-titulos-botones);">
            <i class="bi bi-arrow-left"></i> Volver a la tienda
        </a>
    </div>

    <section class="product-detail">
        <div class="product-detail__imagen-wrapper">
            <img class="product-detail__imagen">
        </div>

        <div class="product-detail__info">

            <span class="product-detail__categoria"></span>

            <h1 class="product-detail__nombre"></h1>
            <p class="product-detail__precio"></p>

            <p class="product-detail__descripcion"></p>

            <div class="product-detail__opciones">
                <p class="product-detail__opciones-label">Talla:</p>
                <div class="product-detail__tallas">
                    <span class="product-detail__talla-btn"></span>
                </div>
            </div>

            <div class="product-detail__opciones">
                <p class="product-detail__opciones-label">Color:</p>
                <div class="product-detail__colores">
                    <span class="product-detail__color-btn"></span>
                </div>
            </div>

            <div class="product-detail__opciones">
                <p class="product-detail__opciones-label">Cantidad:</p>
                <div class="product-detail__cantidad">
                    <button type="button" class="product-detail__cantidad-btn" id="btn-restar">-</button>
                    <span class="product-detail__cantidad-valor" id="cantidad-valor">1</span>
                    <button type="button" class="product-detail__cantidad-btn" id="btn-sumar">+</button>
                </div>
            </div>

            <p class="product-detail__stock"></p>

            <div class="product-detail__acciones">
                <button type="button" class="btn-submit product-detail__btn-carrito">
                    <i class="bi bi-cart2"></i> AGREGAR AL CARRITO
                </button>
                <button type="button" class="product-detail__btn-favoritos">
                    <i class="bi bi-heart"></i> AGREGAR A FAVORITOS
                </button>
            </div>

        </div>

    </section>
    <?php include BASE_PATH . '/app/views/includes/components/footer.php'?>

</body>

</html>