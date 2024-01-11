<?php

namespace Modelo;

class Conexion
{
    private $mysqli;

    function Ejecutar($query)
    {
        $name = "SUPERMARKET";
        $user = "root";
        $pass = "RiberaRepipi";

        if (!$this->mysqli = new \mysqli('riberarepipi.c6v1tpnmgqiu.us-east-2.rds.amazonaws.com', $user, $pass, $name)) {
            die('Error en conexion('.mysqli_connect_errno().')'.mysqli_connect_error());
        }

        $this->mysqli->autocommit(TRUE);
        $resultado = $this->mysqli->query($query);
        return $resultado;
    }

    function lastInsertId()
    {
        return $this->mysqli->insert_id;
    }



    function Cerrar()
    {
        $this->mysqli->close();
    }
}