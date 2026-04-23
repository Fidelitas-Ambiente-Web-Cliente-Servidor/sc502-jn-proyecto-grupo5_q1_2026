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
        <section class="productos-destacados">
            <div class="productos-destacados__contenedor">
                <h2 class="productos-destacados__titulo">Todos los Productos</h2>
                <div class="productos-destacados__grid">
                    <!-- Se llena dinámicamente desde products.js -->
                </div>
            </div>
        </section>
    </main>

    <?php include BASE_PATH . '/app/views/includes/components/footer.php' ?>
</body>

</html>