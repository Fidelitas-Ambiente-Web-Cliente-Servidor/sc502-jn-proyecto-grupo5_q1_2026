<!DOCTYPE html>
<html lang="en">

<head>
  <?php include BASE_PATH . '/app/views/includes/head.php' ?>
  <title>Gestión de Inventarios</title>
</head>

<body class="grid--dos-columnas">
  <?php include BASE_PATH . '/app/views/includes/header_vertical.php'; ?>
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
        <tr class="content__row">
          <td class="content__cell">P001</td>
          <td class="content__cell">Zapatillas Running Pro Max</td>
          <td class="content__cell content__cell--fecha">HOMBRE</td>
          <td class="content__cell">45</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P002</td>
          <td class="content__cell">Camiseta Deportiva Premium</td>
          <td class="content__cell content__cell--fecha">MUJER</td>
          <td class="content__cell">78</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P003</td>
          <td class="content__cell">Leggings Yoga Fit</td>
          <td class="content__cell content__cell--fecha">MUJER</td>
          <td class="content__cell">34</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P004</td>
          <td class="content__cell">Conjunto Infantil Deportivo</td>
          <td class="content__cell content__cell--fecha">INFANTIL</td>
          <td class="content__cell">56</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P005</td>
          <td class="content__cell">Mochila Deportiva Pro</td>
          <td class="content__cell content__cell--fecha">ACCESORIOS</td>
          <td class="content__cell">23</td>
          <td class="content__cell">
            <span class="table__estado table__estado--pendiente">Bajo Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P006</td>
          <td class="content__cell">Short Running Performance</td>
          <td class="content__cell content__cell--fecha">HOMBRE</td>
          <td class="content__cell">67</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P007</td>
          <td class="content__cell">Top Deportivo Mujer</td>
          <td class="content__cell content__cell--fecha">MUJER</td>
          <td class="content__cell">89</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P008</td>
          <td class="content__cell">Gorra Deportiva UV</td>
          <td class="content__cell content__cell--fecha">ACCESORIOS</td>
          <td class="content__cell">120</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P009</td>
          <td class="content__cell">Pantalón Jogger Kids</td>
          <td class="content__cell content__cell--fecha">INFANTIL</td>
          <td class="content__cell">45</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P010</td>
          <td class="content__cell">Chaqueta Deportiva Hombre</td>
          <td class="content__cell content__cell--fecha">HOMBRE</td>
          <td class="content__cell">28</td>
          <td class="content__cell">
            <span class="table__estado table__estado--pendiente">Bajo Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P011</td>
          <td class="content__cell">Camisa Infantil Deportiva</td>
          <td class="content__cell content__cell--fecha">INFANTIL</td>
          <td class="content__cell">0</td>
          <td class="content__cell">
            <span class="table__estado table__estado--inactivo">Sin Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P012</td>
          <td class="content__cell">Camisa Deportiva Premium Hombre</td>
          <td class="content__cell content__cell--fecha">HOMBRE</td>
          <td class="content__cell">71</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P013</td>
          <td class="content__cell">Leggings Fit</td>
          <td class="content__cell content__cell--fecha">MUJER</td>
          <td class="content__cell">33</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P014</td>
          <td class="content__cell">Blusa Deportiva</td>
          <td class="content__cell content__cell--fecha">MUJER</td>
          <td class="content__cell">66</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P015</td>
          <td class="content__cell">Brasier Deportivo</td>
          <td class="content__cell content__cell--fecha">MUJER</td>
          <td class="content__cell">7</td>
          <td class="content__cell">
            <span class="table__estado table__estado--pendiente">Bajo Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P016</td>
          <td class="content__cell">Leggings Pro Fit</td>
          <td class="content__cell content__cell--fecha">MUJER</td>
          <td class="content__cell">2</td>
          <td class="content__cell">
            <span class="table__estado table__estado--pendiente">Bajo Stock</span>
          </td>
          <td class="content__cell">
            <div class="table__actions">
              <button class="table__action-btn table__action-btn--editar"><i class="bi bi-pencil-square"></i></button>
              <button class="table__action-btn table__action-btn--eliminar"><i class="bi bi-trash"></i></button>
            </div>
          </td>
        </tr>
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
              <option value="">Seleccione...</option>
              <option value="1">Hombre</option>
              <option value="2">Mujer</option>
              <option value="3">Infantil</option>
              <option value="4">Accesorios</option>
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
          <label for="var_id_producto">ID del Producto:</label>
          <input type="number" id="var_id_producto" name="id_producto" required style="width: 100%; padding: 8px; margin-top: 5px;" placeholder="Ej. 1">
        </div>

        <div style="display: flex; gap: 10px;">
          <div style="flex: 1;">
            <label for="var_id_color">Color:</label>
            <select id="var_id_color" name="id_color" required style="width: 100%; padding: 8px; margin-top: 5px;">
              <option value="">Seleccione...</option>
              <option value="1">Blanco</option>
              <option value="2">Negro</option>
              <option value="3">Rojo</option>
              <option value="4">Azul</option>
            </select>
          </div>
          <div style="flex: 1;">
            <label for="var_id_talla">Talla:</label>
            <select id="var_id_talla" name="id_talla" required style="width: 100%; padding: 8px; margin-top: 5px;">
              <option value="">Seleccione...</option>
              <option value="1">S</option>
              <option value="2">M</option>
              <option value="3">L</option>
              <option value="4">XL</option>
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

  <script type="module" src="public/js/admin/inventory.js"></script>
</body>

</html>
