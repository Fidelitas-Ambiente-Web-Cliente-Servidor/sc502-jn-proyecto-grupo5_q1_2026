<?php

require_once __DIR__ . '/../config/conexion.php';

class AuthRepository  {
    private $conexionBD;
    
    public function __construct() {
        $this->conexionBD = new BaseDatos();
    }

    public function shareUserForEmail($email) {
        $sql = "SELECT * FROM USUARIOS WHERE EMAIL = ?";
        $statement = $this->conexionBD->getConexion()->prepare($sql);
        $statement->bind_param("s", $email);
        $statement->execute();
        $result = $statement->get_result();

        return $result->fetch_assoc();
    }
    
}