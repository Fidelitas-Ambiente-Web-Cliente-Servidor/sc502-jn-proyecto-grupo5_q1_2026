<?php

class BaseDatos {
    private $host = "db";
    private $baseDatos = "appdb";
    private $usuarioDB = "appuser";
    private $contrasenaDB = "apppass";
    private $mysqli;


    function __construct()
    {
        $this->mysqli = new mysqli($this->host, $this->usuarioDB, $this->contrasenaDB, $this->baseDatos);
        if ($this->mysqli->connect_error) {
            $this->mysqli = null;
        }
    }

    public function getConexion()
    {
        return $this->mysqli;
    }

};

