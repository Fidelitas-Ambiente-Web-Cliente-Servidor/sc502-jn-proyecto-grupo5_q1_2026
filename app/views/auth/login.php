<!DOCTYPE html>
<html lang="es">
 
<head>
    <?php include BASE_PATH . '/views/includes/head.php' ?>
    <title>Login</title>
</head>

<body class="auth-page">
    <main class="page-login">
        <h1>Iniciar sesión</h1>
        <form id="form-login" action="index.php" method="post">
            <div class="form-group">
                <label for="input-email" class="form-group__label">Correo electrónico</label>
                <input type="email" id="input-email" name="email" class="form-group__input" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="input-password" class="form-group__label">Contraseña</label>
                <input type="password" id="input-password" name="password" class="form-group__input" required autocomplete="new-password">
            </div>
            <span id="login-message-error" class="login-message-error"></span>
            <button type="submit" id="btn-login" class="btn btn--primary">Ingresar</button>
        </form>
        <p>¿No tienes cuenta? <a href="<?php echo BASE_URL ?>/?page=register">Regístrate</a></p>
        <p><a href="<?php echo BASE_URL ?>/?page=home">Regresar a tienda</a></p>
    </main>

</body>

</html>