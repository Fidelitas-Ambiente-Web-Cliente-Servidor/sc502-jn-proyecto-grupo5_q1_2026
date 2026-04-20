<!DOCTYPE html>
<html lang="es">

<head>
    <?php include BASE_PATH . '/views/includes/head.php' ?>
    <title>Registro</title>
</head>

<body class="auth-page">
    <main class="page-register">
        <h1>Crear una cuenta</h1>
        <form id="form-register" action="" method="post" autocomplete="off">
            <div class="form-group">
                <label for="input-name" class="form-group__label">Nombre</label>
                <input type="text" id="input-name" name="name" class="form-group__input" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="input-apellidos" class="form-group__label">Apellidos</label>
                <input type="text" id="input-last_name" name="lastname" class="form-group__input" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="input-email" class="form-group__label">Correo electrónico</label>
                <input type="email" id="input-email" name="email" class="form-group__input" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="input-password" class="form-group__label">Contraseña</label>
                <input type="password" id="input-password" name="password" class="form-group__input" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="input-confirm-password" class="form-group__label">Confirmar contraseña</label>
                <input type="password" id="input-confirm-password" name="confirm_password" class="form-group__input" required autocomplete="new-password">
            </div>
            <span id="login-message-error" class="login-message-error"></span>
            <button type="submit" id="btn-register" class="btn btn--primary">Registrarse</button>
        </form>
        <p>¿Ya tienes cuenta? <a href="?page=login">Ingresar</a></p>
        <p><a href="<?php echo BASE_URL ?>/?page=home">Regresar a tienda</a></p>
    </main>
</body>

</html>