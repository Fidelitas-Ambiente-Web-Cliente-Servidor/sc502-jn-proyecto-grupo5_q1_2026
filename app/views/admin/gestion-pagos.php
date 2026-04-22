<!DOCTYPE html>
<html lang="en">

<head>
    <?php include BASE_PATH . '/app/views/includes/head.php' ?>
    <script type="module" src="public/js/auth/auth.js"></script>
    <title>Gestión de Pagos</title>
</head>

<body class="grid--dos-columnas">
    <?php include BASE_PATH . '/app/views/includes/components/header_vertical.php'; ?>

    <main class="main-content">
        <header class="section-header">
            <div class="section-header__info">
                <h2 class="section-header__title">Gestión de Pagos</h2>
                <p class="section-header__text">Administra los métodos de pago y transacciones</p>
            </div>
        </header>

        <table class="table">
            <thead class="table__header">
                <tr class="table__titles">
                    <th class="table__title" colspan="2"><span class="table__title-text">Resumen de Pagos</span></th>
                </tr>

                <tr class="header__row">
                    <th class="table-header__title">ID</th>
                    <th class="table-header__title">CLIENTE</th>
                    <th class="table-header__title">FECHA</th>
                    <th class="table-header__title">MONTO</th>
                    <th class="table-header__title">METODO</th>
                    <th class="table-header__title">ESTADO</th>
                </tr>
            </thead>
            <tbody class="table__content" id="tabla-resumen-pagos">
    
            </tbody>
        </table>
    </main>

    <script type="module" src="public/js/admin/payments.js"></script>
</body>

</html>
