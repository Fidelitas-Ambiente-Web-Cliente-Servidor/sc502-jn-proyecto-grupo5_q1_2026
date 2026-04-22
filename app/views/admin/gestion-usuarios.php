<!DOCTYPE html>
<html lang="en">

<head>
  <?php include BASE_PATH . '/app/views/includes/head.php' ?>
  <title>Gestión de Usuarios</title>
</head>

<body class="grid--dos-columnas">
  <?php include BASE_PATH . '/app/views/includes/components/header_vertical.php'; ?>
  <main class="main-content">
    <header class="section-header">
      <div class="section-header__info">
        <h2 class="section-header__title">Gestión de Usuarios</h2>
        <p class="section-header__text">Administración de usuarios del sistema</p>
      </div>
    </header>

    <div class="table__search" style="margin-bottom: 20px; padding: 0 10px;">
      <div class="table__search-wrapper" style="position: relative; display: flex; align-items: center;">
        <i class="bi bi-search" style="position: absolute; left: 10px; color: #666;"></i>
        <input id="input-buscar-usuario" class="table__search-input" type="text" placeholder="Buscar usuarios por nombre o email..." style="width: 100%; padding: 10px 10px 10px 35px; border-radius: 8px; border: 1px solid #ddd;" />
      </div>
    </div>

    <table class="table">
      <thead class="table__header">
        <tr class="header__row">
          <th class="table-header__title">ID</th>
          <th class="table-header__title">NOMBRE</th>
          <th class="table-header__title">EMAIL</th>
          <th class="table-header__title">ROL</th>
          <th class="table-header__title">ESTADO</th>
          <th class="table-header__title">ACCIONES</th>
        </tr>
      </thead>
      <tbody class="table__content">
      </tbody>
    </table>
  </main>
  <script type="module" src="public/js/admin/users.js"></script>
</body>

</html>
