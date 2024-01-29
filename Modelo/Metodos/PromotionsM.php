<?php

namespace Modelo\Metodos;
use Modelo\Conexion;
use Modelo\Entidades\Promotions;
use Modelo\Entidades\PromotionsProducts;

class PromotionsM
{
    function ViewAll(){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "SELECT 
                    P.*, 
                    PT.NAME AS PromotionTypeName
                FROM 
                    PROMOTIONS AS P
                INNER JOIN 
                    PROMOTION_TYPES AS PT ON P.TYPEPROMOTIONS = PT.ID
                WHERE P.ESTADE=1; ";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Promotions();
                $e->setId($fila["ID"]);
                $e->setName($fila["NAME"]);
                $e->setTypePromotions($fila["PromotionTypeName"]);
                $e->setDiscount($fila["DISCOUNT"]);
                $e->setMinimumQuantity($fila["MINIMUM_QUANTITY"]);
                $e->setMaxQuabtity($fila["MAX_QUANTITY"]);
                $e->setStartDate($fila["START_DATE"]);
                $e->setEndDate($fila["END_DATE"]);
                $e->setEstade($fila["ESTADE"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function insert(Promotions $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "INSERT INTO PROMOTIONS (NAME, TYPEPROMOTIONS,DISCOUNT,MINIMUM_QUANTITY,START_DATE,END_DATE ,ESTADE,MAX_QUANTITY) VALUES (
                '" . $es->getName() . "',
                '" . $es->getTypePromotions() . "',
                '" . $es->getDiscount() . "',
                '" . $es->getMinimumQuantity() . "',
                '" . $es->getStartDate() . "',
                '" . $es->getEndDate() . "',
                " . $es->getEstade() . ",
                " . $es->getMaxQuabtity() . "
                )";
        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }

    function getInformation($id){
        $retVal = array();
        $conexion = new Conexion();
        $sql = "SELECT * FROM PROMOTIONS WHERE ID=$id;";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Promotions();
                $e->setId($fila["ID"]);
                $e->setName($fila["NAME"]);
                $e->setTypePromotions($fila["TYPEPROMOTIONS"]);
                $e->setDiscount($fila["DISCOUNT"]);
                $e->setMinimumQuantity($fila["MINIMUM_QUANTITY"]);
                $e->setMaxQuabtity($fila["MAX_QUANTITY"]);
                $e->setStartDate($fila["START_DATE"]);
                $e->setEndDate($fila["END_DATE"]);
                $e->setEstade($fila["ESTADE"]);

                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function update(Promotions $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "UPDATE PROMOTIONS SET 
            NAME = '" . $es->getName() . "',
            TYPEPROMOTIONS = '" . $es->getTypePromotions() . "',
            DISCOUNT = '" . $es->getDiscount() . "',
            MINIMUM_QUANTITY = '" . $es->getMinimumQuantity() . "',
            START_DATE = '" . $es->getStartDate() . "',
            MAX_QUANTITY = '" . $es->getMaxQuabtity() . "',
            END_DATE = '" . $es->getEndDate() . "'
            WHERE ID = " . $es->getId();

        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }

    function ChangeStatus($id){
        $retVal = false;
        $conexion = new Conexion();
        $sql="UPDATE PROMOTIONS SET ESTADE = 0 WHERE ID=$id;";
        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;

    }



    function insertPromtionsProduct(PromotionsProducts $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "INSERT INTO PROMOTION_PRODUCTS (PROMOTION_ID, PRODUCT_ID,ESTADE) VALUES (
                '" . $es->getPromotionId() . "',
                '" . $es->getProductId()  . "',
                " . $es->getEstade() . "
                )";
        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }
}