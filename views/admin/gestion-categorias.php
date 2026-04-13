<!DOCTYPE html>
<html lang="en">
<head> 
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
<link rel="stylesheet" href="../../public/css/main.css">
    <script type="module" src="public/js/auth/auth.js"></script>
    <title>Gestión de Categorías</title>
</head> 

<body class="grid--dos-columnas">
    <header class="header header--vertical">
    <h1 class="header__title">ONLY WAY</h1>
    <nav class="navbar">
        <ul class="navbar__items">
            <li class="navbar__item navbar__item--active"><a class="navbar__link" href="#"><i class="bi bi-columns-gap"></i>Dashboard</a></li>
            <li class="navbar__item"><a class="navbar__link" href="/admin?page=gestion/usuarios"><i class="bi bi-people navbar__icon"></i>Gestión de Usuarios</a></li>
            <li class="navbar__item"><a class="navbar__link" href="/admin?page=gestion/inventario"><i class="bi bi-box-seam navbar__icon"></i>Gestión de Inventarios</a></li>
            <li class="navbar__item"><a class="navbar__link" href="/admin?page=gestion/pedidos"><i class="bi bi-cart navbar__icon"></i>Gestión de Pedidos</a></li>
            <li class="navbar__item"><a class="navbar__link" href="/admin?page=gestion/categorias"><i class="bi bi-diagram-2 navbar__icon"></i>Gestión de Categorías</a></li>
            <li class="navbar__item"><a class="navbar__link" href="/admin?page=gestion/pagos"><i class="bi bi-credit-card navbar__icon"></i>Gestión de Pagos</a></li>
            <li class="navbar__item"><a class="navbar__link" href="<?php echo BASE_URL; ?>/?page=logout"><i class="bi bi-box-arrow-right navbar__icon"></i>Salir</a></li>
        </ul>
    </nav>
</header>
    <main class="main-content">
        <header class="section-header">
            <div class="section-header__info">
                <h2 class="section-header__title">Gestión de Categorias</h2>
                <p class="section-header__text">Administra las categorias de productos</p>
            </div>
            <div class="section-header__actions">
                <button class="btn-submit btn-submit--admin-add" id="btn-agregar-categoria">
                    + AGREGAR CATEGORIA
                </button>
            </div>
        </header>
        <table class="table">
            <thead class="table__header">
                <tr class="header__row">
                    <th class="table-header__title">ID</th>
                    <th class="table-header__title">NOMBRE</th>
                    <th class="table-header__title">DESCRIPCION</th>
                    <th class="table-header__title">ESTADO</th>
                    <th class="table-header__title">ACCIONES</th>
                </tr>
            </thead>

            <tbody class="table__content">
                <tr class="content__row">
                    <td class="content__cell">C001</td>
                    <td class="content__cell">HOMBRE</td>
                    <td class="content__cell">Ropa y equipamiento deportivo para hombres</td>
                    <td class="content__cell">
                        <span class="table__estado table__estado--completado">Activo</span>
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
                    <td class="content__cell">C002</td>
                    <td class="content__cell">MUJER</td>
                    <td class="content__cell">Ropa y equipamiento deportivo para mujeres</td>
                    <td class="content__cell">
                        <span class="table__estado table__estado--completado">Activo</span>
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
                    <td class="content__cell">C003</td>
                    <td class="content__cell">INFANTIL</td>
                    <td class="content__cell">Ropa y equipamiento deportivo para niños</td>
                    <td class="content__cell">
                        <span class="table__estado table__estado--completado">Activo</span>
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
                    <td class="content__cell">C004</td>
                    <td class="content__cell">ACCESORIOS</td>
                    <td class="content__cell">Accesorios deportivos</td>
                    <td class="content__cell">
                        <span class="table__estado table__estado--completado">Activo</span>
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