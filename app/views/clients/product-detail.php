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
        <!-- Se llena dinámicamente desde product-detail.js -->
    </section>
    <?php include BASE_PATH . '/app/views/includes/components/footer.php'?>

</body>

</html>