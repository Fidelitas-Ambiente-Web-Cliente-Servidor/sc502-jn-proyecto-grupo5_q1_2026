<!DOCTYPE html>
<html lang="es">

<head>
  <!--  <?php include BASE_PATH . '/views/includes/head.php' ?>-->
  <title>Inventario</title>
</head>


<body class="grid--dos-columnas">
  <!--<?php include BASE_PATH . '/views/includes/header_vertical.php'; ?>-->
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
          <td class="content__cell">I001</td>
          <td class="content__cell">Conjunto Infantil Deportivo</td>
          <td class="content__cell">INFANTIL</td>
          <td class="content__cell">3</td>
          <td class="content__cell">
            <span class="table__estado table__estado--pendiente">Bajo Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">I002</td>
          <td class="content__cell">Camisa Infantil Deportiva</td>
          <td class="content__cell">INFANTIL</td>
          <td class="content__cell">0</td>
          <td class="content__cell">
            <span class="table__estado table__estado--inactivo">Sin Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">H001</td>
          <td class="content__cell">Zapatillas Running Pro Max</td>
          <td class="content__cell">HOMBRE</td>
          <td class="content__cell">0</td>
          <td class="content__cell">
            <span class="table__estado table__estado--inactivo">Sin Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">H002</td>
          <td class="content__cell">Camisa Deportiva Premium Hombre</td>
          <td class="content__cell">HOMBRE</td>
          <td class="content__cell">71</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">H003</td>
          <td class="content__cell">Chaqueta Deportiva Hombre</td>
          <td class="content__cell">HOMBRE</td>
          <td class="content__cell">53</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">M001</td>
          <td class="content__cell">Leggings Fit</td>
          <td class="content__cell">MUJER</td>
          <td class="content__cell">33</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">M003</td>
          <td class="content__cell">Blusa Deportiva</td>
          <td class="content__cell">MUJER</td>
          <td class="content__cell">66</td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">En Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">M029</td>
          <td class="content__cell">Brasier Deportivo</td>
          <td class="content__cell">MUJER</td>
          <td class="content__cell">7</td>
          <td class="content__cell">
            <span class="table__estado table__estado--pendiente">Bajo Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">A065</td>
          <td class="content__cell">Gorra Deportiva</td>
          <td class="content__cell">ACCESORIOS</td>
          <td class="content__cell">12</td>
          <td class="content__cell">
            <span class="table__estado table__estado--pendiente">Bajo Stock</span>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">M063</td>
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