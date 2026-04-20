<!DOCTYPE html>
<html lang="en">

<head>
    <?php include BASE_PATH . '/views/includes/head.php' ?>
    <title>Gestión de Pedidos</title>
</head>

<body class="grid--dos-columnas">
    <?php include BASE_PATH . '/views/includes/header_vertical.php'; ?>
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
            <tbody class="table__content">
                <tr class="content__row">
                    <td class="content__cell">#1234</td>
                    <td class="content__cell">Juan Pérez González</td>
                    <td class="content__cell">2026-02-20</td>
                    <td class="content__cell">₡45 000</td>
                    <td class="content__cell">
                        <span class="table__estado table__estado--completado">Completado</span>
                    </td>
                    <td class="content__cell">
                        <div class="table__actions">
                            <button class="table__action-btn table__action-btn--editar">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="table__action-btn table__action-btn--eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>

                </tr>
                <tr class="content__row">
                    <td class="content__cell">#1235</td>
                    <td class="content__cell">Ana Martínez López</td>
                    <td class="content__cell">2026-02-21</td>
                    <td class="content__cell">₡32 500</td>
                    <td class="content__cell">
                        <span class="table__estado table__estado--pendiente">Pendiente</span>
                    </td>
                    <td class="content__cell">
                        <div class="table__actions">
                            <button class="table__action-btn table__action-btn--editar">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="table__action-btn table__action-btn--eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="content__row">
                    <td class="content__cell">#1236</td>
                    <td class="content__cell">Maria Rodriguez Castro</td>
                    <td class="content__cell">2026-02-22</td>
                    <td class="content__cell">₡67 800</td>
                    <td class="content__cell">
                        <span class="table__estado table__estado--completado">Completado</span>
                    </td>
                    <td class="content__cell">
                        <div class="table__actions">
                            <button class="table__action-btn table__action-btn--editar">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="table__action-btn table__action-btn--eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="content__row">
                    <td class="content__cell">#1237</td>
                    <td class="content__cell">Carlos Gómez Vargas</td>
                    <td class="content__cell">2026-02-23</td>
                    <td class="content__cell">₡24 000</td>
                    <td class="content__cell">
                        <span class="table__estado table__estado--completado">Completado</span>
                    </td>
                    <td class="content__cell">
                        <div class="table__actions">
                            <button class="table__action-btn table__action-btn--editar">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="table__action-btn table__action-btn--eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="content__row">
                    <td class="content__cell">#1238</td>
                    <td class="content__cell">Luis Hernández Mora</td>
                    <td class="content__cell">2026-02-27</td>
                    <td class="content__cell">₡29 800</td>
                    <td class="content__cell">
                        <span class="table__estado table__estado--completado">Completado</span>
                    </td>
                    <td class="content__cell">
                        <div class="table__actions">
                            <button class="table__action-btn table__action-btn--editar">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="table__action-btn table__action-btn--eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="content__row">
                    <td class="content__cell">#1239</td>
                    <td class="content__cell">Luis Hernández Mora</td>
                    <td class="content__cell">2026-02-27</td>
                    <td class="content__cell">₡10 250</td>
                    <td class="content__cell">
                        <span class="table__estado table__estado--pendiente">Pendiente</span>
                    </td>
                    <td class="content__cell">
                        <div class="table__actions">
                            <button class="table__action-btn table__action-btn--editar">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="table__action-btn table__action-btn--eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>