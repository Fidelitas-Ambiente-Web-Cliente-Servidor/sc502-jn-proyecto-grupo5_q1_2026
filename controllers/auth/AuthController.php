<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../config/config.php';
require_once  BASE_PATH . '/repository/AuthRepository.php';
require_once BASE_PATH . '/controllers/api.php';
require_once BASE_PATH . '/utils/funciones.php';

class AuthController {
    private $authRepository;
    private $api;
    private $datosEnviados;
    private $response;

    public function __construct() {
        $this->authRepository = new AuthRepository();
        $this->api = new Api();
        $this->datosEnviados = obtenerJsonDeJs();
        $this->response = [
            "status" => "error",
            "code" => 400,
            "message" => "solicitud incompleta",
            "data" => []
        ];
    }

    public function llamarMetodosControlador() {
        $accion = $_GET['action'] ?? $this->datosEnviados['action'] ?? null;
        switch($accion) {
            case 'login':
                $this->login();
                break;
            case 'logout':
                $this->logout();
                break;
            default:
            $this->datosEnviados['message'] = 'Accion no encontrada';
            break;
        }
    }

    public function login() {
        $usuarioEnviado = $this->datosEnviados['user'] ?? '';
        $passwordEnviada = $this->datosEnviados['password'] ?? '';
        $userBD = $this->authRepository->shareUserForEmail($usuarioEnviado);
        if($userBD && password_verify($passwordEnviada,$userBD['password'])) {
            $_SESSION['id_usuario'] = $userBD['id_usuario'];
            $_SESSION['nombre'] = $userBD['nombre'];
            $_SESSION['email'] = $userBD['email'];
            $_SESSION['rol'] = $userBD['rol'];
            $this->response = [
                "status" => "success",
                "code" => 200,
                "message" => "Bienvenido al sistema " . $_SESSION['nombre'],
                "data" => [
                    "id_usuario" => $userBD['id_usuario'],
                    "nombre" => $userBD['nombre'],
                    "apellido" => $userBD['apellido'],
                    "email" => $userBD['email'],
                    "rol" => $userBD['rol']
                ]
            ];
        }  else {
            $this->response = [
                "status" => "error",
                "code" => 401,
                "message" => "Correo o contraseña incorrecta",
                "data" => []
            ];
            
        }
        enviarRespuestJson($this->response);
    }

    public function logout() {
        session_destroy();
        $this->response = [
            "status" => "success",
            "code" => 200,
            "message" => "Sesión Cerrada con exito",
            "data" => []
        ];

        enviarRespuestJson($this->response);
    }


}

$authController = new AuthController();
$authController->llamarMetodosControlador();

