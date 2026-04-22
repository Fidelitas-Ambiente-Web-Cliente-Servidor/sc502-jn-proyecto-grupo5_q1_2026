<!DOCTYPE html>
<html lang="en">
<head> 
    <?php include BASE_PATH . '/app/views/includes/head.php' ?>
    <script type="module" src="public/js/auth/auth.js"></script>
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
                    <p class="card__text">¢2,450.000</p>
                    <span class="card__variation card__variation--activo"><i class="bi bi-graph-up-arrow"></i>
                        +12%</span>
                </div>
            </article>
            <article class="card">
                <header class="card__header">
                    <h3 class="card__title">Total de Pedidos</h3>
                    <i class="bi bi-box-seam card__header-icon card__header-icon--enproceso"></i>
                </header>
                <div class="card__content">
                    <p class="card__text">156</p>
                    <span class="card__variation card__variation--enproceso"><i class="bi bi-graph-up-arrow"></i>
                        +8%</span>
                </div>
            </article>
            <article class="card">
                <header class="card__header">
                    <h3 class="card__title">Usuarios Registrados</h3>
                    <i class="bi bi-people card__header-icon card__header-icon--morado"></i>
                </header>
                <div class="card__content">
                    <p class="card__text">342</p>
                    <span class="card__variation card__variation--morado"><i class="bi bi-graph-up-arrow"></i>
                        +15%</span>
                </div>
            </article>
            <article class="card">
                <header class="card__header">
                    <h3 class="card__title">Productos en Stock</h3>
                    <i class="bi bi-box-seam card__header-icon card__header-icon--anaranjado"></i>
                </header>
                <div class="card__content">
                    <p class="card__text">89</p>
                    <span class="card__variation card__variation--anaranjado"><i class="bi bi-graph-up-arrow"></i>
                        +5%</span>
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
            <tbody class="table__content">
                <tr class="content__row">
                    <td class="content__cell">#1234</td>
                    <td class="content__cell">Juan Perez</td>
                    <td class="content__cell content__cell--fecha">2026-02-20</td>
                    <td class="content__cell">¢45.000</td>
                    <td class="content__cell"><span class="table__estado table__estado--completado">Completado</span></td>
                </tr>
                <tr class="content__row">
                    <td class="content__cell">#1235</td>
                    <td class="content__cell">Ana Martinez</td>
                    <td class="content__cell content__cell--fecha">2026-02-21</td>
                    <td class="content__cell">¢32.500</td>
                    <td class="content__cell"> <span class="table__estado table__estado--enproceso">En Progreso</span></td>
                </tr>
                <tr class="content__row">
                    <td class="content__cell">#1236</td>
                    <td class="content__cell">Maria Rodriguez</td>
                    <td class="content__cell content__cell--fecha">2026-02-22</td>
                    <td class="content__cell">¢67.8000</td>
                    <td class="content__cell"><span class="table__estado table__estado--pendiente">Pendiente</span></td>
                </tr>
                <tr class="content__row">
                    <td class="content__cell">#1237</td>
                    <td class="content__cell">Luis Hernandez</td>
                    <td class="content__cell content__cell--fecha">2026-02-23</td>
                    <td class="content__cell">¢24.0000</td>
                    <td class="content__cell"><span class="table__estado table__estado--completado">Completado</span></td>
                </tr>
            </tbody>
        </table>
    </main>

</body>

</html>
