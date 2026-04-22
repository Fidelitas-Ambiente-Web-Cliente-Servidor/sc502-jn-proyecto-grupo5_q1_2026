<!DOCTYPE html>
<html lang="en">

<head>
  <?php include BASE_PATH . '/app/views/includes/head.php' ?>
  <title>Gestión de Usuarios</title>
</head>

<body class="grid--dos-columnas">
  <?php include BASE_PATH . '/app/views/includes/header_vertical.php'; ?>
  <main class="main-content">
    <header class="section-header">
      <div class="section-header__info">
        <h2 class="section-header__title">Gestión de Usuarios</h2>
        <p class="section-header__text">Administración de usuarios del sistema</p>
      </div>
    </header>
    <div class="table__search">
      <div class="table__search-wrapper">
        <i class="bi bi-search table__search-icon"></i>
        <input class="table__search-input" type="text" placeholder="Buscar usuarios..." />
      </div>
    </div>
    <table class="table">
      <thead class="table__header">
        <tr class="header__row">
          <th class="table-header__title">NOMBRE</th>
          <th class="table-header__title">EMAIL</th>
          <th class="table-header__title">ROL</th>
          <th class="table-header__title">ESTADO</th>
          <th class="table-header__title">ACCIONES</th>
        </tr>
      </thead>
      <tbody class="table__content" id="tabla-usuarios">
      </tbody>
    </table>
  </main>
  <script type="module" src="public/js/admin/users.js"></script>
</body>

</html>
