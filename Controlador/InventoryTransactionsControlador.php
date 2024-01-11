<?php
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Inventory_Transactions.php';
require_once './Modelo/Metodos/Inventory_TransactionsM.php';
class InventoryTransactionsControlador
{
    private function viewAll(){
        $estM = new \Modelo\Metodos\Inventory_TransactionsM();
        $tinventory = $estM->ViewAll();

        return $tinventory;
    }


    function Principal(){
        $tinventory = $this->viewAll();
        require_once './Vista/View/InventoryTransactions/Index.php';
    }

    function Insert()
    {
        $e = new \Modelo\Entidades\Inventory_Transactions();
        $eM = new \Modelo\Metodos\Inventory_TransactionsM();

        $e->setIdProduct($_POST["product"]);
        $e->setTransactionType($_POST["transaction"]);
        $e->setQuantity($_POST["quantity"]);

        if ($eM->insert($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }


}