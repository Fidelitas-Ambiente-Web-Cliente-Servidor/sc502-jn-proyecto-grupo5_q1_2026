<!DOCTYPE html>
<html lang="es">

<head>
    <?php include BASE_PATH . '/app/views/includes/head.php' ?>
    <script type="module" src="<?php echo BASE_URL;?>/public/js/app.js"></script>
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

                <div class="productos-destacados__grid"></div>
            </div>
        </section>
    </main>

    <?php include BASE_PATH . '/app/views/includes/components/footer.php' ?>
</body>

</html>