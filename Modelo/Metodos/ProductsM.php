<?php

namespace Modelo\Metodos;
use Modelo\Conexion;
use Modelo\Entidades\Products;
class ProductsM
{
    function ViewAll(){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "CALL sp_get_products_info();";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Products();
                $e->setIdProduct($fila["ID_PRODUCT"]);
                $e->setName($fila["NAME"]);
                $e->setDescription($fila["DESCRIPTION"]);
                $e->setPrice($fila["PRICE"]);
                $e->setCategory($fila["CATEGORYNAME"]);
                $e->setSupplier($fila["COMPANYNAME"]);
                $e->setStatus($fila["ESTADE"]);
                $e->setImagePath($fila["IMAGE_PATH"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();

        return $retVal;
    }

    function insert(Products $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "CALL sp_insert_inventory_product (
                '" . $es->getName() . "',
                '" . $es->getDescription() . "',
                " . $es->getPrice() . ",
                " . $es->getCategory() . ",
                " . $es->getSupplier() . ",
                " . $es->getStatus() . ",
                '" . $es->getImagePath() . "'
                )";


        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }

    function getInformation($id){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "CALL sp_get_products_info_by_Id($id);";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Products();
                $e->setIdProduct($fila["ID_PRODUCT"]);
                $e->setName($fila["NAME"]);
                $e->setDescription($fila["DESCRIPTION"]);
                $e->setPrice($fila["PRICE"]);
                $e->setCategory($fila["CATEGORY"]);
                $e->setSupplier($fila["SUPPLIER"]);
                $e->setStatus($fila["ESTADE"]);
                $e->setImagePath($fila["IMAGE_PATH"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();

        return $retVal;
    }

    function getImage($id){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "CALL sp_get_products_info_by_Id($id);";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $retVal[] = array(
                    'IMAGEN' => $fila["IMAGE_PATH"]
                );
            }
        } else
            $retVal = null;
        $conexion->Cerrar();

        return $retVal;
    }

    function update(Products $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "UPDATE PRODUCTS SET 
                NAME = '" . $es->getName() . "',
                DESCRIPTION = '" . $es->getDescription() . "',
                PRICE = " . $es->getPrice() . ",
                CATEGORY = " . $es->getCategory() . ",
                SUPPLIER = " . $es->getSupplier() . "
                WHERE ID_PRODUCT = " . $es->getIdProduct();
        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }

    function ChangeStatus($id){
        $retVal = false;
        $conexion = new Conexion();
        $sql="UPDATE PRODUCTS SET ESTADE = 0 WHERE ID_PRODUCT=$id;";

        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;

    }


}