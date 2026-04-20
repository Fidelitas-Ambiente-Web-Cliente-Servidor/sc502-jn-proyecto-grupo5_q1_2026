<!DOCTYPE html>
<html lang="en">

<head> 
    <?php include BASE_PATH . '/views/includes/head.php' ?>
    <script type="module" src="public/js/auth/auth.js"></script>
    <title>Gestión de Usuarios</title>
</head> 

<body class="grid--dos-columnas">
  <?php include BASE_PATH . '/views/includes/header_vertical.php'; ?>
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
      <tbody class="table__content">
        <tr class="content__row">
          <td class="content__cell">Juan Pérez González</td>
          <td class="content__cell">carlos.gomez@email.com</td>
          <td class="content__cell">
            <span class="table__rol table__rol--cliente">Cliente</span>
          </td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">Activo</span>
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
          <td class="content__cell">María Rodríguez Castro</td>
          <td class="content__cell">maria.rodriguez@email.com</td>
          <td class="content__cell">
            <span class="table__rol table__rol--administrador">Administrador</span>
          </td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">Activo</span>
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
          <td class="content__cell">Carlos Gómez Vargas</td>
          <td class="content__cell">carlos.gomez@email.com</td>
          <td class="content__cell">
            <span class="table__rol table__rol--vendedor">Vendedor</span>
          </td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">Activo</span>
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
          <td class="content__cell">Ana Martínez López</td>
          <td class="content__cell">ana.martinez@email.com</td>
          <td class="content__cell">
            <span class="table__rol table__rol--cliente">Cliente</span>
          </td>
          <td class="content__cell">
            <span class="table__estado table__estado--completado">Activo</span>
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
          <td class="content__cell">Luis Hernández Mora</td>
          <td class="content__cell">luis.hernandez@email.com</td>
          <td class="content__cell">
            <span class="table__rol table__rol--cliente">Cliente</span>
          </td>
          <td class="content__cell">
            <span class="table__estado table__estado--inactivo">Inactivo</span>
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