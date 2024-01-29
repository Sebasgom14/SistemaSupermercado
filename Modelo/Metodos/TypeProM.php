<?php

namespace Modelo\Metodos;
use Modelo\Conexion;
use Modelo\Entidades\TypePromotions;

class TypeProM
{
    function ViewAll(){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "SELECT * FROM PROMOTION_TYPES WHERE ESTADE=1;";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new TypePromotions();
                $e->setId($fila["ID"]);
                $e->setName($fila["NAME"]);
                $e->setEstade($fila["ESTADE"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function insert(TypePromotions $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "INSERT INTO PROMOTION_TYPES (NAME,  ESTADE) VALUES (
                '" . $es->getName() . "',
                " . $es->getEstade() . "
                )";
        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }

    function getInformation($id){
        $retVal = array();
        $conexion = new Conexion();
        $sql = "SELECT * FROM PROMOTION_TYPES WHERE ID=$id;";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new TypePromotions();
                $e->setId($fila["ID"]);
                $e->setName($fila["NAME"]);

                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function update(TypePromotions $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "UPDATE PROMOTION_TYPES SET 
            NAME = '" . $es->getName() . "'
            WHERE ID = " . $es->getId();

        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }

    function ChangeStatus($id){
        $retVal = false;
        $conexion = new Conexion();
        $sql="UPDATE PROMOTION_TYPES SET ESTADE = 0 WHERE ID=$id;";
        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;

    }
}