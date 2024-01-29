<?php
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Inventory.php';
require_once './Modelo/Metodos/InventoryM.php';
class InventoryControlador
{

    private function viewAll(){
        $estM = new \Modelo\Metodos\InventoryM();
        $list = array();
        return $this->list = $estM->ViewAll();
    }


    function Principal(){
        $inventory= $this->viewAll();
        require_once './Vista/View/Inventory/Index.php';
    }

    function Todos()
    {
        $eM = new \Modelo\Metodos\InventoryM();

        $inventoryInformation = $eM->ViewAll();
        $retVal = array();
        if ($inventoryInformation != null) {
            foreach ($inventoryInformation as $inventory) {
                $retVal[] = [
                    'id' => $inventory['idProducto'],
                    'cantidadProduct' => $inventory['cantidadProduct'],
                    'nombreProducto' => $inventory['nombreProducto'],
                    'precio' => $inventory['precio'],
                    'imagen' => $inventory['imagen'],
                    'descuento' => $inventory['descuento'],
                    'cantidadMinima' => $inventory['Cminima'],
                    'cantidadMaxima' => $inventory['Cmaxima'],
                    'estadoPromocion' => $inventory['estadePromotion'],
                ];
            }
        }
        echo json_encode($retVal);
    }






    function searchbyId(){
        $eM = new \Modelo\Metodos\InventoryM();
        $id = $_POST["idCategory"];

        $inventoryInformation = $eM->searchByCategory($id);
        $retVal = array();
        if ($inventoryInformation != null) {
            foreach ($inventoryInformation as $inventory) {
                $retVal[] = [
                    'idInventory' => $inventory['ID_INVENTORY'],
                    'idProduct' => $inventory['ID_PRODUCT'],
                    'cantidadProduct' => $inventory['QUANTITYINSTOCK'],
                    'date' => $inventory['LASTREPLENISHMENTDATE'],
                    'nombreProducto' => $inventory['NAME'],
                    'precio' => $inventory['PRICE'],
                    'categoria' => $inventory['CATEGORYNAME'],
                    'imagen' => $inventory['IMAGE_PATH'],
                    'proveedor' => $inventory['COMPANYNAME']
                ];
            }
        }
        echo json_encode($retVal);
    }

    function searchbyIdProveedor(){
        $eM = new \Modelo\Metodos\InventoryM();
        $id = $_POST["idCategory"];

        $inventoryInformation = $eM->searchByProveedor($id);
        $retVal = array();
        if ($inventoryInformation != null) {
            foreach ($inventoryInformation as $inventory) {
                $retVal[] = [
                    'idInventory' => $inventory['ID_INVENTORY'],
                    'idProduct' => $inventory['ID_PRODUCT'],
                    'cantidadProduct' => $inventory['QUANTITYINSTOCK'],
                    'date' => $inventory['LASTREPLENISHMENTDATE'],
                    'nombreProducto' => $inventory['NAME'],
                    'precio' => $inventory['PRICE'],
                    'categoria' => $inventory['CATEGORYNAME'],
                    'imagen' => $inventory['IMAGE_PATH'],
                    'proveedor' => $inventory['COMPANYNAME']
                ];
            }
        }
        echo json_encode($retVal);
    }


}