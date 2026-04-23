<!DOCTYPE html>
<html lang="en">
<head> 
    <?php include BASE_PATH . '/app/views/includes/head.php' ?>
    <script type="module" src="public/js/admin/dashboard.js"></script>
    <title>Dashboard</title>
</head> 
<body class="grid--dos-columnas">
<?php include BASE_PATH . '/app/views/includes/components/header_vertical.php'; ?>
    <main class="main-content">
        <header class="section-header">
            <div class="section-header__info">
                <h2 class="section-header__title">Dashboard</h2>
                <p class="section-header__text">Bienvenido, Administrador</p>
            </div>
        </header>

        <section class="cards">
            <article class="card">
                <header class="card__header">
                    <h3 class="card__title">Total de Ventas</h3>
                    <i class="bi bi-currency-dollar card__header-icon card__header-icon--activo"></i>
                </header>
                <div class="card__content">
                    <p class="card__text" id="ventas-total">...</p>
                </div>
            </article>
            <article class="card">
                <header class="card__header">
                    <h3 class="card__title">Total de Pedidos</h3>
                    <i class="bi bi-box-seam card__header-icon card__header-icon--enproceso"></i>
                </header>
                <div class="card__content">
                    <p class="card__text" id="pedidos-total">...</p>
                </div>
            </article>
            <article class="card">
                <header class="card__header">
                    <h3 class="card__title">Usuarios Registrados</h3>
                    <i class="bi bi-people card__header-icon card__header-icon--morado"></i>
                </header>
                <div class="card__content">
                    <p class="card__text" id="usuarios-total">...</p>
                </div>
            </article>
            <article class="card">
                <header class="card__header">
                    <h3 class="card__title">Productos en Stock</h3>
                    <i class="bi bi-box-seam card__header-icon card__header-icon--anaranjado"></i>
                </header>
                <div class="card__content">
                    <p class="card__text" id="productos-total">...</p>
                </div>
            </article>
        </section>
        <table class="table">
            <thead class="table__header">
                <tr class="table__titles">
                    <th class="table__title" colspan="2"><span class="table__title-text">Pedidos Recientes</span></th>
                </tr>

                <tr class="header__row">
                    <th class="table-header__title">ID</th>
                    <th class="table-header__title">CLIENTE</th>
                    <th class="table-header__title">FECHA</th>
                    <th class="table-header__title">TOTAL</th>
                    <th class="table-header__title">ESTADO</th>
                </tr>
            </thead>
            <tbody class="table__content" id="tabla-pedidos-recientes">
                <!-- Se llena dinámicamente desde dashboard.js -->
            </tbody>
        </table>
    </main>

</body>

</html>
