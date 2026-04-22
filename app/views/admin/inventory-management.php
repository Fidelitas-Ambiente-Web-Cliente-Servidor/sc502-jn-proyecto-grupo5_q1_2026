<!DOCTYPE html>
<html lang="en">

<head>
  <?php include BASE_PATH . '/app/views/includes/head.php' ?>
  <title>Gestión de Inventarios</title>
</head>

<body class="grid--dos-columnas">
  <?php include BASE_PATH . '/app/views/includes/components/header_vertical.php'; ?>
  <main class="main-content">
    <header class="section-header">
      <div class="section-header__info">
        <h2 class="section-header__title">Gestión de Inventarios</h2>
        <p class="section-header__text">Administra el inventario de productos</p>
      </div>
      <div class="section-header__actions" style="display: flex; gap: 10px;">
        <button class="btn-submit btn-submit--admin-add" id="btn-agregar-producto">
          + AGREGAR PRODUCTO
        </button>
        <button class="btn-submit btn-submit--admin-add" id="btn-agregar-variante" style="background-color: #6f42c1;">
          + AGREGAR VARIANTE
        </button>
      </div>
    </header>
    <table class="table">
      <thead class="table__header">
        <tr class="header__row">
          <th class="table-header__title">ID</th>
          <th class="table-header__title">NOMBRE</th>
          <th class="table-header__title">CATEGORÍA</th>
          <th class="table-header__title">CANTIDAD</th>
          <th class="table-header__title">ESTADO</th>
          <th class="table-header__title">ACCIONES</th>
        </tr>
      </thead>
      <tbody class="table__content">
        <!-- Se llena dinámicamente desde inventory.js -->
      </tbody>
    </table>
  </main>

  <!-- Modal para Agregar/Editar Producto -->
  <div class="modal" id="modal-producto" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
    <div class="modal-content" style="background-color: #fefefe; margin: 5% auto; padding: 20px; border: 1px solid #888; width: 50%; border-radius: 8px;">
      <span class="close-modal" id="close-modal" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
      <h2 id="modal-titulo">Agregar Producto</h2>
      
      <form id="form-producto" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
        <div>
          <label for="nombre_producto">Nombre del Producto:</label>
          <input type="text" id="nombre_producto" name="nombre_producto" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>

        <div>
          <label for="descripcion">Descripción:</label>
          <textarea id="descripcion" name="descripcion" rows="3" required style="width: 100%; padding: 8px; margin-top: 5px;"></textarea>
        </div>

        <div style="display: flex; gap: 10px;">
          <div style="flex: 1;">
            <label for="precio_unitario">Precio Unitario (¢):</label>
            <input type="number" id="precio_unitario" name="precio_unitario" min="0" step="0.01" required style="width: 100%; padding: 8px; margin-top: 5px;">
          </div>
        <div style="flex: 1;">
            <label for="id_categoria">Categoría:</label>
            <select id="id_categoria" name="id_categoria" required style="width: 100%; padding: 8px; margin-top: 5px;">
              <option value="">Cargando...</option>
            </select>
          </div>
        </div>

        <div>
          <label for="imagen_producto">Imagen del Producto:</label>
          <input type="file" id="imagen_producto" name="imagen_producto" accept="image/*" required style="width: 100%; margin-top: 5px;">
        </div>

        <div id="mensaje-modal" style="display: none; color: red; font-weight: bold;"></div>

        <button type="submit" class="btn-submit" id="btn-guardar-producto" style="margin-top: 10px;">Guardar Producto</button>
      </form>
    </div>
  </div>

  <!-- Modal para Agregar Variante -->
  <div class="modal" id="modal-variante" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
    <div class="modal-content" style="background-color: #fefefe; margin: 5% auto; padding: 20px; border: 1px solid #888; width: 40%; border-radius: 8px;">
      <span class="close-modal" id="close-modal-variante" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
      <h2>Agregar Variante de Producto</h2>
      
      <form id="form-variante" style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
        
        <div>
          <label for="var_id_producto">Producto:</label>
          <select id="var_id_producto" name="id_producto" required style="width: 100%; padding: 8px; margin-top: 5px;">
            <option value="">Seleccione un producto...</option>
          </select>
        </div>

        <div style="display: flex; gap: 10px;">
          <div style="flex: 1;">
            <label for="var_id_color">Color:</label>
            <select id="var_id_color" name="id_color" required style="width: 100%; padding: 8px; margin-top: 5px;">
              <option value="">Cargando...</option>
            </select>
          </div>
          <div style="flex: 1;">
            <label for="var_id_talla">Talla:</label>
            <select id="var_id_talla" name="id_talla" required style="width: 100%; padding: 8px; margin-top: 5px;">
              <option value="">Cargando...</option>
            </select>
          </div>
        </div>

        <div>
          <label for="var_stock">Cantidad en Stock:</label>
          <input type="number" id="var_stock" name="stock" min="1" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>

        <div id="mensaje-modal-variante" style="display: none; color: red; font-weight: bold;"></div>

        <button type="submit" class="btn-submit" id="btn-guardar-variante" style="margin-top: 10px;">Guardar Variante</button>
      </form>
    </div>
  </div>

  <!-- Modal para Ver Variantes -->
  <div class="modal" id="modal-ver-variantes" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5);">
    <div class="modal-content" style="background-color: #fefefe; margin: 5% auto; padding: 20px; border: 1px solid #888; width: 50%; border-radius: 8px;">
      <span class="close-modal" id="close-modal-ver" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span>
      <h2 id="titulo-variantes-producto">Variantes del Producto</h2>
      
      <table class="table" style="margin-top: 20px;">
        <thead class="table__header">
          <tr class="header__row">
            <th class="table-header__title">Color</th>
            <th class="table-header__title">Talla</th>
            <th class="table-header__title">Stock</th>
            <th class="table-header__title">Acciones</th>
          </tr>
        </thead>
        <tbody id="lista-variantes-body">
        </tbody>
      </table>
    </div>
  </div>

  <script type="module" src="public/js/admin/inventory.js"></script>
</body>

</html>
