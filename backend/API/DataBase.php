<?php

namespace MiNamespace;

abstract class DataBase
{
    protected $conexion;

    public function __construct(string $nombreBD)
    {
        $this->conexion = new \mysqli('localhost', 'root', '123456789', $nombreBD);

        if ($this->conexion->connect_error) {
            die("Conexión a la base de datos fallida: " . $this->conexion->connect_error);
        }
    }
}

?>