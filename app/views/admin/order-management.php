<!DOCTYPE html>
<html lang="en">

<head>
    <?php include BASE_PATH . '/app/views/includes/head.php' ?>
    <title>Gestión de Pedidos</title>
</head>

<body class="grid--dos-columnas">
    <?php include BASE_PATH . '/app/views/includes/header_vertical.php'; ?>
    <main class="main-content">
        <header class="section-header">
            <div class="section-header__info">
                <h2 class="section-header__title">Gestión de Pedidos</h2>
                <p class="section-header__text">Administración de pedidos del Sistema</p>
            </div>
        </header>
        <div class="table__search">
            <div class="table__search-wrapper">
                <i class="bi bi-search table__search-icon"></i>
                <input class="table__search-input" type="text" id="input-buscar-pedido" placeholder="Buscar pedidos..." />
            </div>
            <select class="table__search-dropdown" id="input-filtro-estado">
                <option value="">Todos los estados</option>
                <option value="pendiente">Pendiente</option>
                <option value="enproceso">En proceso</option>
                <option value="completado">Completado</option>
            </select>
        </div>
        <table class="table">
            <thead class="table__header">
                <tr class="header__row">
                    <th class="table-header__title">ID PEDIDO</th>
                    <th class="table-header__title">CLIENTE</th>
                    <th class="table-header__title">FECHA</th>
                    <th class="table-header__title">TOTAL</th>
                    <th class="table-header__title">ESTADO</th>
                    <th class="table-header__title">ACCIONES</th>
                </tr>
            </thead>
            <tbody class="table__content" id="tabla-pedidos">
            </tbody>
        </table>
    </main>
    <script type="module" src="public/js/admin/orders.js"></script>
</body>

</html>
