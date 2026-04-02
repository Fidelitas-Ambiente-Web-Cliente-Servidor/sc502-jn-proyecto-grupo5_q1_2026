<?php

require_once __DIR__ . '/../../repository/AuthRepository.php';

class AuthController {
    private $AuthRepository;
    private $action;
    private $response = [
        'status' => null,
        'code' => null,
        'message' => null,
        'redirect' => null
    ];

    public function __construct() {
        $this->AuthRepository = new AuthRepository();
        $this->action = $_POST['action'] ?? null;
    }

    public function handleRequest() {
        switch ($this->action) {
            case 'login':
                $this->login($_POST['email'], $_POST['password']);
                break;
            case 'register':
                echo 'encontramos la acción register';
                break;
            default:
                echo 'acción no reconocida';
                break;
        }
    }

    public function login($emailRecibido,$passwordRecibido) {
        $user = $this->AuthRepository->shareUserForEmail($emailRecibido);
        if($user && password_verify($passwordRecibido, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id_usuario'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['role'] = $user['rol'];

            $this->response = [
                'status' => 'success',
                'code' => 200,
                'message' => 'Inicio de sesión exitoso',
                'redirect' => $this->redirection($user['rol'])
            ];
        } else {
            $this->response = [
                'status' => 'error',
                'code' => 401,
                'message' => 'Correo electrónico o contraseña incorrectos',
                'redirect' => null
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($this->response);
        exit;
    }

    public function redirection($rol) {
        $redirectUrl = null;
        switch($rol) {
            case 'ADMINISTRADOR':
                $redirectUrl =  'views/admin/dashboard.html';
                break;
            case 'CLIENTE':
                $redirectUrl = 'views/clients/home.html';
                break;
            case 'VENDEDOR':
                $redirectUrl = 'views/vendedor/inventory.html';
                break;
            default:
                $redirectUrl = 'views/auth/login.php';
                break;
        }
        return $redirectUrl;
    }
}

$authController = new AuthController();
$authController->handleRequest();