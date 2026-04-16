<!DOCTYPE html>
<html lang="en">

<head>
    <?php include BASE_PATH . '/views/includes/head.php' ?>
    <script type="module" src="public/js/auth/auth.js"></script>
    <title>Gestión de Inventarios</title>
</head>

<body class="grid--dos-columnas">
  <?php include BASE_PATH . '/views/includes/header_vertical.php'; ?>
  <main class="main-content">
    <header class="section-header">
      <div class="section-header__info">
        <h2 class="section-header__title">Gestión de Inventarios</h2>
        <p class="section-header__text">Administra el inventario de productos</p>
      </div>
      <div class="section-header__actions">
        <button class="btn-submit btn-submit--admin-add" 
        id="btn-agregar-producto">
          + AGREGAR PRODUCTO
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
          <td class="content__cell">P002</td>
          <td class="content__cell">Camiseta Deportiva Premium</td>
          <td class="content__cell content__cell--fecha">MUJER</td>
          <td class="content__cell">78</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
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
          <td class="content__cell">P003</td>
          <td class="content__cell">Leggings Yoga Fit</td>
          <td class="content__cell content__cell--fecha">MUJER</td>
          <td class="content__cell">34</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
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
          <td class="content__cell">P004</td>
          <td class="content__cell">Conjunto Infantil Deportivo</td>
          <td class="content__cell content__cell--fecha">INFANTIL</td>
          <td class="content__cell">56</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
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
          <td class="content__cell">P005</td>
          <td class="content__cell">Mochila Deportiva Pro</td>
          <td class="content__cell content__cell--fecha">ACCESORIOS</td>
          <td class="content__cell">23</td>
          <td class="content__cell">
            <span class="table__estado table__estado--pendiente">Bajo Stock</span>
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
          <td class="content__cell">P006</td>
          <td class="content__cell">Short Running Performance</td>
          <td class="content__cell content__cell--fecha">HOMBRE</td>
          <td class="content__cell">67</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
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
          <td class="content__cell">P007</td>
          <td class="content__cell">Top Deportivo Mujer</td>
          <td class="content__cell content__cell--fecha">MUJER</td>
          <td class="content__cell">89</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
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
          <td class="content__cell">P008</td>
          <td class="content__cell">Gorra Deportiva UV</td>
          <td class="content__cell content__cell--fecha">ACCESORIOS</td>
          <td class="content__cell">120</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
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
          <td class="content__cell">P009</td>
          <td class="content__cell">Pantalón Jogger Kids</td>
          <td class="content__cell content__cell--fecha">INFANTIL</td>
          <td class="content__cell">45</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
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
          <td class="content__cell">P010</td>
          <td class="content__cell">Chaqueta Deportiva Hombre</td>
          <td class="content__cell content__cell--fecha">HOMBRE</td>
          <td class="content__cell">28</td>
          <td class="content__cell">
            <span class="table__estado table__estado--pendiente">Bajo Stock</span>
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