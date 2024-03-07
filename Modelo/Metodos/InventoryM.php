<?php

namespace Modelo\Metodos;

use Modelo\Conexion;
use Modelo\Entidades\Inventory;
class InventoryM
{
    function ViewAll()
    {

        $retVal = array();
        $conexion = new Conexion();

        $sql = "CALL sp_get_inventory_info();";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $retVal[] = array(
                    'imagen' => $fila["IMAGE_PATH"],
                    'nombreProducto' => $fila["PRODUCTNAME"],
                    'cantidadProduct' => $fila["QUANTITYINSTOCK"],
                    'categoria' => $fila["CATEGORYNAME"],
                    'proveedor' => $fila["COMPANYNAME"],
                    'precio' => $fila["PRICE"],
                    'idProducto' => $fila["ID_PRODUCT"],
                );
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function searchByCategory($id){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "CALL sp_get_inventory_info_by_Id($id);";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $retVal[] = array(
                    'ID_INVENTORY' => $fila['ID_INVENTORY'],
                    'ID_PRODUCT' => $fila['ID_PRODUCT'],
                    'QUANTITYINSTOCK' => $fila['QUANTITYINSTOCK'],
                    'LASTREPLENISHMENTDATE' => $fila['LASTREPLENISHMENTDATE'],
                    'NAME' => $fila['NAME'],
                    'PRICE' => $fila['PRICE'],
                    'CATEGORYNAME' => $fila['CATEGORYNAME'],
                    'IMAGE_PATH' => $fila['IMAGE_PATH'],
                    'COMPANYNAME' => $fila['COMPANYNAME']
                );
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function searchByProveedor($id){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "CALL sp_get_inventory_info_by_Id_Supplier($id);";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $retVal[] = array(
                    'ID_INVENTORY' => $fila['ID_INVENTORY'],
                    'ID_PRODUCT' => $fila['ID_PRODUCT'],
                    'QUANTITYINSTOCK' => $fila['QUANTITYINSTOCK'],
                    'LASTREPLENISHMENTDATE' => $fila['LASTREPLENISHMENTDATE'],
                    'NAME' => $fila['NAME'],
                    'PRICE' => $fila['PRICE'],
                    'CATEGORYNAME' => $fila['CATEGORYNAME'],
                    'IMAGE_PATH' => $fila['IMAGE_PATH'],
                    'COMPANYNAME' => $fila['COMPANYNAME']
                );
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }
}