<?php
require_once __DIR__ . '/../../config/config.php';

$sesionActiva = isset($_SESSION['id_usuario']); 

if ($sesionActiva): ?>
    <details class="navbar__session">
        <summary class="navbar__session-trigger">
            <span class="navbar__text">
                <i class="bi bi-person"></i>
                Mi cuenta
            </span>
        </summary>
        <div class="navbar__session-dropdown">
            <button  id="btn-logout" class="navbar__session-link navbar__session-link--login">Cerrar Sesión</button>
            <a href="<?php echo BASE_URL?>/?page=miCuenta" class="navbar__session-link navbar__session-register">Mi cuenta</a>
        </div>
    </details>
<?php else: ?>
    <details class="navbar__session">
        <summary class="navbar__session-trigger">
            <span class="navbar__text">
                <i class="bi bi-person"></i>
                Mi cuenta
            </span>
        </summary>
        <div class="navbar__session-dropdown">
            <a href="<?php echo BASE_URL ?>/?page=login" class="navbar__session-link navbar__session-link--login">Iniciar Sesión</a>
            <a href="<?php echo BASE_URL ?>/?page=register" class="navbar__session-link navbar__session-register">Registrarse</a>
        </div>
    </details>
<?php endif; ?>