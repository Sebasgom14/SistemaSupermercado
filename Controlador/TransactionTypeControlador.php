<?php
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/TransactionType.php';
require_once './Modelo/Metodos/TransactionTypeM.php';
class TransactionTypeControlador
{
    function Todos()
    {
        $eM = new \Modelo\Metodos\TransactionTypeM();
        $todos = $eM->ViewAll();

        $retVal = [];

        foreach ($todos as $t) {
            $id = $t->getIdTransactionType();
            $transactionname = $t->getTransactionTypeName();
            $estade = $t->getEstade();

            $retVal[] = [
                'id' => $id,
                'nombre' => $transactionname,
                'estado' => $estade
            ];
        }
        echo json_encode($retVal);
    }
}