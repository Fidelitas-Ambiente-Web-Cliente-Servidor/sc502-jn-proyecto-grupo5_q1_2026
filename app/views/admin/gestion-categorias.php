<!DOCTYPE html>
<html lang="en">
<head> 
    <?php include BASE_PATH . '/app/views/includes/head.php' ?>
    <title>Gestión de Categorías</title>
</head> 

<body class="grid--dos-columnas">
  <?php include BASE_PATH . '/app/views/includes/components/header_vertical.php'; ?>
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

            <tbody class="table__content" id="tabla-categorias">
                <!-- Se llena dinámicamente desde categories.js -->
            </tbody>
        </table>
    </main>

    <div class="modal" id="modal-categoria" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
        <div class="modal-content" style="background-color: #fefefe; margin: 10% auto; padding: 20px; border: 1px solid #888; width: 40%; border-radius: 8px;">
            <span class="close-modal" id="close-modal" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
            <h2>Agregar Categoría</h2>
            <form id="form-categoria" style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
                <div>
                    <label for="nombre">Nombre de la Categoría:</label>
                    <input type="text" id="nombre" name="nombre" required style="width: 100%; padding: 8px; margin-top: 5px;">
                </div>
                <div>
                    <label for="descripcion">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" rows="3" style="width: 100%; padding: 8px; margin-top: 5px;"></textarea>
                </div>
                <div id="mensaje-modal" style="display: none; color: red; font-weight: bold;"></div>
                <button type="submit" class="btn-submit" id="btn-guardar-categoria">Guardar Categoría</button>
            </form>
        </div>
    </div>

    <script type="module" src="public/js/admin/categories.js"></script>
</body>

</html>
