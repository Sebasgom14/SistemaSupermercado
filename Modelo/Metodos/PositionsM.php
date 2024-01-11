<?php

namespace Modelo\Metodos;
use Modelo\Conexion;
use Modelo\Entidades\Employee_Positions;
use Modelo\Entidades\Product_Categories;

class PositionsM
{
    function ViewAll(){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "SELECT * FROM EMPLOYEE_POSITIONS WHERE ESTADE=1;";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Employee_Positions();
                $e->setIdPosition($fila["ID_POSITION"]);
                $e->setPositionName($fila["POSITION_NAME"]);
                $e->setDescription($fila["DESCRIPTION"]);
                $e->setStatus($fila["ESTADE"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function insert(Employee_Positions $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "INSERT INTO EMPLOYEE_POSITIONS (POSITION_NAME, DESCRIPTION ,ESTADE) VALUES (
                '" . $es->getPositionName() . "',
                 '" . $es->getDescription() . "',
                " . $es->getStatus() . "
                )";
        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }

    function getInformation($id){
        $retVal = array();
        $conexion = new Conexion();
        $sql = "SELECT * FROM EMPLOYEE_POSITIONS WHERE ID_POSITION=$id;";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Employee_Positions();
                $e->setIdPosition($fila["ID_POSITION"]);
                $e->setPositionName($fila["POSITION_NAME"]);
                $e->setDescription($fila["DESCRIPTION"]);
                $e->setStatus($fila["ESTADE"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function update(Employee_Positions $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "UPDATE EMPLOYEE_POSITIONS SET 
            POSITION_NAME = '" . $es->getPositionName() . "',
             DESCRIPTION = '" . $es->getDescription() . "'
            WHERE ID_POSITION = " . $es->getIdPosition();

        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }

    function ChangeStatus($id){
        $retVal = false;
        $conexion = new Conexion();
        $sql="UPDATE EMPLOYEE_POSITIONS SET ESTADE = 0 WHERE ID_POSITION=$id;";
        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;

    }








}