<!DOCTYPE html>
<html lang="en">
<head> 
    <?php include BASE_PATH . '/views/includes/head.php' ?>
    <title>Gestión de Categorías</title>
</head> 

<body class="grid--dos-columnas">
<?php include BASE_PATH . '/views/includes/header_vertical.php'; ?>
    <main class="main-content">
        <header class="section-header">
            <div class="section-header__info">
                <h2 class="section-header__title">Gestión de Categorias</h2>
                <p class="section-header__text">Administra las categorias de productos</p>
            </div>
            <div class="section-header__actions">
                <button class="btn-submit btn-submit--admin-add" 
                id="btn-agregar-categoria">
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