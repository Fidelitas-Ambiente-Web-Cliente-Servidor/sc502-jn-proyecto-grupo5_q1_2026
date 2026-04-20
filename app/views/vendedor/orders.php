<!DOCTYPE html>
<html lang="es">
  
<head>
  <?php include BASE_PATH . '/views/includes/head.php' ?>
  <title>Pedidos</title>
</head>


<body class="grid--dos-columnas">
  <?php include BASE_PATH . '/views/includes/header_vertical.php'; ?>
  <main class="main-content">
    <header class="section-header">
      <div class="section-header__info">
        <h2 class="section-header__title">Gestión de Pedidos</h2>
        <p class="section-header__text">Consulta y gestiona los pedidos</p>
      </div>
    </header>

    <div class="table__search">
      <div class="table__search-wrapper">
        <i class="bi bi-search table__search-icon"></i>
        <input class="table__search-input" id="input-search-orders" type="text" placeholder="Buscar pedido..." />
      </div>
      <select class="table__search-dropdown" id="input-filter-status">
        <option value="all">Todos los estados</option>
        <option value="Completado">Completado</option>
        <option value="Pendiente">Pendiente</option>
        <option value="Cancelado">Cancelado</option>
      </select>
    </div>

    <table class="table">
      <thead class="table__header">
        <tr class="header__row">
          <th class="table-header__title">ID Pedido</th>
          <th class="table-header__title">Cliente</th>
          <th class="table-header__title">Fecha</th>
          <th class="table-header__title">Total</th>
          <th class="table-header__title">Estado</th>
          <th class="table-header__title">Acciones</th>
        </tr>
      </thead>
      <tbody class="table__content">
        <tr class="content__row">
          <td class="content__cell">#101</td>
          <td class="content__cell">Manuel Quiroz</td>
          <td class="content__cell content__cell--fecha">05-02-2025</td>
          <td class="content__cell">₡45.000</td>
          <td class="content__cell"><span class="table__estado table__estado--completado">Completado</span></td>
          <td class="content__cell">
            <select class="orders-table__action-dropdown">
              <option>Cambiar estado</option>
              <option value="Completado">Completado</option>
              <option value="Pendiente">Pendiente</option>
              <option value="Cancelado">Cancelado</option>
            </select>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">#102</td>
          <td class="content__cell">Lucia Cabrera</td>
          <td class="content__cell content__cell--fecha">07-02-2025</td>
          <td class="content__cell">₡72.000</td>
          <td class="content__cell"><span class="table__estado table__estado--enproceso">Pendiente</span></td>
          <td class="content__cell">
            <select class="orders-table__action-dropdown">
              <option>Cambiar estado</option>
              <option value="Completado">Completado</option>
              <option value="Pendiente">Pendiente</option>
              <option value="Cancelado">Cancelado</option>
            </select>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">#256</td>
          <td class="content__cell">Miguel Herrera</td>
          <td class="content__cell content__cell--fecha">12-02-2025</td>
          <td class="content__cell">₡25.000</td>
          <td class="content__cell"><span class="table__estado table__estado--completado">Completado</span></td>
          <td class="content__cell">
            <select class="orders-table__action-dropdown">
              <option>Cambiar estado</option>
              <option value="Completado">Completado</option>
              <option value="Pendiente">Pendiente</option>
              <option value="Cancelado">Cancelado</option>
            </select>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">#232</td>
          <td class="content__cell">Hector Gomez</td>
          <td class="content__cell content__cell--fecha">15-02-2025</td>
          <td class="content__cell">₡10.000</td>
          <td class="content__cell"><span class="table__estado table__estado--enproceso">Pendiente</span></td>
          <td class="content__cell">
            <select class="orders-table__action-dropdown">
              <option>Cambiar estado</option>
              <option value="Completado">Completado</option>
              <option value="Pendiente">Pendiente</option>
              <option value="Cancelado">Cancelado</option>
            </select>
          </td>
        </tr>
        <tr class="content__row">
          <td class="content__cell">#365</td>
          <td class="content__cell">Fabian Cubero</td>
          <td class="content__cell content__cell--fecha">21-02-2025</td>
          <td class="content__cell">₡23.700</td>
          <td class="content__cell"><span class="table__estado table__estado--inactivo">Cancelado</span></td>
          <td class="content__cell">
            <select class="orders-table__action-dropdown">
              <option>Cambiar estado</option>
              <option value="Completado">Completado</option>
              <option value="Pendiente">Pendiente</option>
              <option value="Cancelado">Cancelado</option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>
  </main>

</body>
</html>