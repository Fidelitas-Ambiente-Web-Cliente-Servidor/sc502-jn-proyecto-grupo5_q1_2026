<?php

class BaseDatos {
    private $host = "db";
    private $baseDatos = "appdb";
    private $usuarioDB = "appuser";
    private $contrasenaDB = "apppass";
    private $conexionBD;
    private $mensajeConexion;

    function __construct() {
        $this->conexionBD = new mysqli($this->host, $this->usuarioDB, $this->contrasenaDB, $this->baseDatos);
        if ($this->conexionBD->connect_error) {
            $this->mensajeConexion = "Error de conexión: " . $this->conexionBD->connect_error;
        } else {
            $this->mensajeConexion = "Conexión exitosa a la base de datos";
        }
    }

    function getConexion() {
        return $this->conexionBD;
    }

    function getMensajeConexion() {
        return $this->mensajeConexion;
    }
};

