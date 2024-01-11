<?php

namespace Modelo\Metodos;
use Modelo\Conexion;
use Modelo\Entidades\Inventory_Transactions;
class Inventory_TransactionsM
{

    function ViewAll(){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "CALL sp_get_inventory_transaction_info();";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $retVal[] = array(
                    'ID_TRANSACTION' => $fila["ID_TRANSACTION"],
                    'TRANSACTIONTYPE' => $fila["TRANSACTIONTYPE"],
                    'ID_PRODUCT' => $fila["ID_PRODUCT"],
                    'QUANTITY' => $fila["QUANTITY"],
                    'TRANSACTIONDATE' => $fila["TRANSACTIONDATE"],
                    'ESTADE' => $fila["ESTADE"],
                    'ProductName' => $fila["ProductName"],
                    'TransactionType' => $fila["TransactionType"],
                );
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }


    function insert(Inventory_Transactions $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "CALL SP_INSERT_UPDATE_INVENTORY_TRANSACTION( '" . $es->getTransactionType() . "',  '" . $es->getIdProduct() . "',   '" . $es->getQuantity() . "');";
        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }
}