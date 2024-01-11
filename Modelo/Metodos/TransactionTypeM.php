<?php

namespace Modelo\Metodos;
use Modelo\Conexion;
use Modelo\Entidades\TransactionType;
class TransactionTypeM
{
    function ViewAll(){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "SELECT * FROM TRANSACTIONTYPES WHERE ESTADE=1;";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new TransactionType();
                $e->setIdTransactionType($fila["ID_TransactionType"]);
                $e->setTransactionTypeName($fila["TRANSACTIONTYPENAME"]);
                $e->setEstade($fila["ESTADE"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }
}