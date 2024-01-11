<?php

namespace Modelo\Metodos;

use Modelo\Conexion;
use Modelo\Entidades\Product_Categories;
class CategoryM
{
    function ViewAll(){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "SELECT * FROM PRODUCT_CATEGORIES WHERE ESTADE=1;";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Product_Categories();
                $e->setIdCategory($fila["ID_CATEGORY"]);
                $e->setCategoryName($fila["CATEGORYNAME"]);
                $e->setStatus($fila["ESTADE"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function insert(Product_Categories $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "INSERT INTO PRODUCT_CATEGORIES (CATEGORYNAME,  ESTADE) VALUES (
                '" . $es->getCategoryName() . "',
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
        $sql = "SELECT * FROM PRODUCT_CATEGORIES WHERE ID_CATEGORY=$id;";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Product_Categories();
                $e->setIdCategory($fila["ID_CATEGORY"]);
                $e->setCategoryName($fila["CATEGORYNAME"]);

                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function update(Product_Categories $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "UPDATE PRODUCT_CATEGORIES SET 
            CATEGORYNAME = '" . $es->getCategoryName() . "'
            WHERE ID_CATEGORY = " . $es->getIdCategory();

        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }

    function ChangeStatus($id){
        $retVal = false;
        $conexion = new Conexion();
        $sql="UPDATE PRODUCT_CATEGORIES SET ESTADE = 0 WHERE ID_CATEGORY=$id;";
        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;

    }
}