<?php

namespace Modelo\Metodos;
use Modelo\Conexion;
use Modelo\Entidades\CivilRegister;
class CivilRegisterM
{
    function getInformation($cedula){

        $userArray = array();
        $conexion = new Conexion();

        $sql = "SELECT * FROM `CIVILREGISTER` WHERE CEDULA = $cedula";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0)
        {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new CivilRegister();
                $e->setId($fila["ID"]);
                $e->setCEDULA($fila["CEDULA"]);
                $e->setNOMBRE($fila["NOMBRE"]);
                $e->setAPELLIDO1($fila["1_APELLIDO"]);
                $e->setAPELLIDO2($fila["2_APELLIDO"]);
                $userArray[] = $e;
            }
        } else
            $retVal = null;

        $conexion->Cerrar();
        return $userArray;
    }
}