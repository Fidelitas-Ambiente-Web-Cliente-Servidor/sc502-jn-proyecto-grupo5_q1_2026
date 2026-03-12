<?php
// controlador mínimo para procesar registro
require_once __DIR__ . '/../models/User.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm = trim($_POST['confirm_password'] ?? '');
    $error = '';

    if ($password !== $confirm) {
        $error = 'Las contraseñas no coinciden';
    } elseif (empty($name) || empty($email) || empty($password)) {
        $error = 'Todos los campos son obligatorios';
    }

    if (empty($error)) {
        // llamar al modelo para simular registro
        User::register($name, $email, $password);
        header('Location: ../controllers/LoginController.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../public/css/normalize.css">
    <link rel="stylesheet" href="../public/css/variables.css">
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body class="auth-page">
    <main class="page-register">
        <h1>Crear una cuenta</h1>
        <?php if (!empty($error)): ?>
            <p class="error-message"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form id="form-register" action="" method="post" autocomplete="off">
            <div class="form-group">
                <label for="input-name" class="form-group__label">Nombre completo</label>
                <input type="text" id="input-name" name="name" class="form-group__input" required autocomplete="off">
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
            <button type="submit" id="btn-register" class="btn btn--primary">Registrarse</button>
        </form>
        <p>¿Ya tienes cuenta? <a href="../controllers/LoginController.php">Ingresar</a></p>
    </main>
</body>
</html>