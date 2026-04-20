<!DOCTYPE html>
<html lang="es">

<head>
  <?php include BASE_PATH . '/views/includes/head.php' ?>
  <title>Inventario</title>
</head>


<body class="grid--dos-columnas">
  <?php include BASE_PATH . '/views/includes/header_vertical.php'; ?>
  <main class="main-content">
    <header class="section-header ">
      <h1 class="section-header__title">Inventario</h1>
      <p class="section-header__text">Consulta el estado del inventario</p>
    </header>

    <div class="table__search">
      <div class="table__search-wrapper">
        <i class="bi bi-search table__search-icon"></i>
        <input class="table__search-input" id="input-search-inventory" type="text" placeholder="Buscar producto..." />
      </div>
      <select class="table__search-dropdown" id="input-filter-category">
        <option value="all">Todas las categorías</option>
        <option value="HOMBRE">Hombre</option>
        <option value="MUJER">Mujer</option>
        <option value="INFANTIL">Infantil</option>
        <option value="ACCESORIOS">Accesorios</option>
      </select>
    </div>

    <hgroup class="table__titles">
      <h3 class="table__title">Inventario de Productos</h3>
    </hgroup>

    <table class="table">
      <thead class="table__header">
        <tr class="header__row">
          <th class="table-header__title">ID</th>
          <th class="table-header__title">Nombre</th>
          <th class="table-header__title">Categoría</th>
          <th class="table-header__title">Cantidad</th>
          <th class="table-header__title">Estado</th>
        </tr>
      </thead>
      <tbody class="table__content">
        <tr class="content__row">
          <td class="content__cell">P001</td>
          <td class="content__cell">Zapatillas Running Pro Max</td>
          <td class="content__cell">HOMBRE</td>
          <td class="content__cell">45</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P002</td>
          <td class="content__cell">Camiseta Deportiva Premium</td>
          <td class="content__cell">MUJER</td>
          <td class="content__cell">78</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P003</td>
          <td class="content__cell">Leggings Yoga Fit</td>
          <td class="content__cell">MUJER</td>
          <td class="content__cell">34</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P004</td>
          <td class="content__cell">Conjunto Infantil Deportivo</td>
          <td class="content__cell">INFANTIL</td>
          <td class="content__cell">56</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P005</td>
          <td class="content__cell">Mochila Deportiva Pro</td>
          <td class="content__cell">ACCESORIOS</td>
          <td class="content__cell">23</td>
          <td class="content__cell">
            <span class="table__estado table__estado--pendiente">Bajo Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P006</td>
          <td class="content__cell">Short Running Performance</td>
          <td class="content__cell">HOMBRE</td>
          <td class="content__cell">67</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P007</td>
          <td class="content__cell">Top Deportivo Mujer</td>
          <td class="content__cell">MUJER</td>
          <td class="content__cell">89</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P008</td>
          <td class="content__cell">Gorra Deportiva UV</td>
          <td class="content__cell">ACCESORIOS</td>
          <td class="content__cell">120</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P009</td>
          <td class="content__cell">Pantalón Jogger Kids</td>
          <td class="content__cell">INFANTIL</td>
          <td class="content__cell">45</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P010</td>
          <td class="content__cell">Chaqueta Deportiva Hombre</td>
          <td class="content__cell">HOMBRE</td>
          <td class="content__cell">28</td>
          <td class="content__cell">
            <span class="table__estado table__estado--pendiente">Bajo Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P011</td>
          <td class="content__cell">Camisa Infantil Deportiva</td>
          <td class="content__cell">INFANTIL</td>
          <td class="content__cell">0</td>
          <td class="content__cell">
            <span class="table__estado table__estado--inactivo">Sin Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P012</td>
          <td class="content__cell">Camisa Deportiva Premium Hombre</td>
          <td class="content__cell">HOMBRE</td>
          <td class="content__cell">71</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P013</td>
          <td class="content__cell">Leggings Fit</td>
          <td class="content__cell">MUJER</td>
          <td class="content__cell">33</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P014</td>
          <td class="content__cell">Blusa Deportiva</td>
          <td class="content__cell">MUJER</td>
          <td class="content__cell">66</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P015</td>
          <td class="content__cell">Brasier Deportivo</td>
          <td class="content__cell">MUJER</td>
          <td class="content__cell">7</td>
          <td class="content__cell">
            <span class="table__estado table__estado--pendiente">Bajo Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">P016</td>
          <td class="content__cell">Leggings Pro Fit</td>
          <td class="content__cell">MUJER</td>
          <td class="content__cell">2</td>
          <td class="content__cell">
            <span class="table__estado table__estado--pendiente">Bajo Stock</span>
          </td>
        </tr>
      </tbody>
    </table>

  </main>
</body>

</html>