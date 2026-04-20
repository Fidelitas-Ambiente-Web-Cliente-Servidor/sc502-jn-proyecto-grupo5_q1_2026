<?php

require_once __DIR__ . '/../config/conexion.php';

class AuthRepository  {
    private $conexionBD;
    
    public function __construct() {
        $this->conexionBD = new BaseDatos();
    }

    public function shareUserForEmail($email) {
        $sql = 'SELECT * FROM USUARIOS WHERE EMAIL = ?';
        $statement = $this->conexionBD->getConexion()->prepare($sql);
        $statement->bind_param('s', $email);
        $statement->execute();
        $result = $statement->get_result();

        return $result->fetch_assoc();
    }

    public function saveUser($nombre, $apellidos, $email, $password,$rol) {
        try {
            $isNull = ($rol !== null) ? false : true;
            $sql = $isNull ? 'INSERT INTO USUARIOS (nombre,apellidos,email,password) VALUES(?,?,?,?)' : 'INSERT INTO USUARIOS (nombre,apellidos,email,password,rol) VALUES(?,?,?,?,?)';
            $typeBindParam = $isNull ? ['ssss', $nombre, $apellidos, $email, $password] : ['sssss', $nombre, $apellidos, $email, $password, $rol];
            $statement = $this->conexionBD->getConexion()->prepare($sql);
            $statement->bind_param(...$typeBindParam);
            $statement->execute();
            $result = $statement->affected_rows;
            return $result;

            //Para que lo tomen en cuenta
            // return 1 -> exito
            // return -2 -> correo duplicado
            // return -1 -> otro error no tratado
        }   catch(mysqli_sql_exception $e){
            if($e->getCode() === 1062) return -2;
            return -1;
        }     
    }
    
}   