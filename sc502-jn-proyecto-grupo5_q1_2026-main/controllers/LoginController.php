<?php
session_start();

// controlador simple para procesar el formulario de login
require_once __DIR__ . '/../models/User.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // en un proyecto real User::authenticate haría una consulta a la base de datos
    $user = User::authenticate($email, $password);

    if ($user) {
        $_SESSION['user'] = ['email' => $user->email, 'name' => $user->name];
        header('Location: ../views/admin/admin-dashboard.html');
        exit;
    } else {
        $error = 'Correo o contraseña incorrectos';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/normalize.css">
    <link rel="stylesheet" href="../public/css/variables.css">
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body class="auth-page">
    <main class="page-login">
        <h1>Iniciar sesión</h1>
        <?php if (!empty($error)): ?>
            <p class="error-message"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form id="form-login" action="" method="post" autocomplete="off">
            <div class="form-group">
                <label for="input-email" class="form-group__label">Correo electrónico</label>
                <input type="email" id="input-email" name="email" class="form-group__input" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="input-password" class="form-group__label">Contraseña</label>
                <input type="password" id="input-password" name="password" class="form-group__input" required autocomplete="new-password">
            </div>
            <button type="submit" id="btn-login" class="btn btn--primary">Ingresar</button>
        </form>
        <p>¿No tienes cuenta? <a href="../controllers/RegisterController.php">Regístrate</a></p>
    </main>
</body>
</html>