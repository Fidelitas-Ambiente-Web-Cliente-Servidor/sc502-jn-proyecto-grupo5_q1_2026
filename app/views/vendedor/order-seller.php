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
          <td class="content__cell">#1234</td>
          <td class="content__cell">Juan Pérez González</td>
          <td class="content__cell content__cell--fecha">2026-02-20</td>
          <td class="content__cell">₡45 000</td>
          <td class="content__cell"><span class="table__estado table__estado--completado">Activo</span></td>
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
          <td class="content__cell">#1235</td>
          <td class="content__cell">Ana Martínez López</td>
          <td class="content__cell content__cell--fecha">2026-02-21</td>
          <td class="content__cell">₡32 500</td>
          <td class="content__cell"><span class="table__estado table__estado--pendiente">Pendiente</span></td>
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
          <td class="content__cell">#1236</td>
          <td class="content__cell">Maria Rodriguez Castro</td>
          <td class="content__cell content__cell--fecha">2026-02-22</td>
          <td class="content__cell">₡67 800</td>
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
          <td class="content__cell">#1237</td>
          <td class="content__cell">Carlos Gómez Vargas</td>
          <td class="content__cell content__cell--fecha">2026-02-23</td>
          <td class="content__cell">₡24 000</td>
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
          <td class="content__cell">#1238</td>
          <td class="content__cell">Luis Hernández Mora</td>
          <td class="content__cell content__cell--fecha">2026-02-27</td>
          <td class="content__cell">₡29 800</td>
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
          <td class="content__cell">#1239</td>
          <td class="content__cell">Luis Hernández Mora</td>
          <td class="content__cell content__cell--fecha">2026-02-27</td>
          <td class="content__cell">₡10 250</td>
          <td class="content__cell"><span class="table__estado table__estado--pendiente">Pendiente</span></td>
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