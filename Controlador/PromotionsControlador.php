<?php
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Promotions.php';
require_once './Modelo/Metodos/PromotionsM.php';
require_once './Modelo/Entidades/PromotionsProducts.php';
class PromotionsControlador
{
    private function viewAll(){
        $estM = new \Modelo\Metodos\PromotionsM();
        $promotions = $estM->ViewAll();

        return $promotions;
    }
    function Principal(){
        $promotions = $this->viewAll();
        require_once './Vista/View/Promotions/Index.php';
    }

    function Todos()
    {
        $eM = new \Modelo\Metodos\PromotionsM();
        $todos = $eM->ViewAll();

        $retVal = [];

        foreach ($todos as $t) {
            $id = $t->getId();
            $name = $t->getName();
            $discount = $t->getDiscount();
            $minimum = $t->getMinimumQuantity();
            $max = $t->getMaxQuabtity();
            $starDate = $t->getStartDate();
            $endDate = $t->getEndDate();
            $type = $t->getTypePromotions();
            $estade = $t->getEstade();

            $retVal[] = [
                'id' => $id,
                'nombre' => $name,
                'tipo' => $type,
                'descuento' => $discount,
                'cantidadMinima' => $minimum,
                'cantidDmAXIMA' => $max,
                'inicio' => $starDate,
                'fin' => $endDate,
                'estado' => $estade
            ];
        }
        echo json_encode($retVal);
    }

    function Insert()
    {
        $e = new \Modelo\Entidades\Promotions();
        $eM = new \Modelo\Metodos\PromotionsM();

        $e->setName($_POST["namePromotions"]);
        $e->setTypePromotions($_POST["TypePromotions"]);
        $e->setDiscount($_POST["Discount"]);
        $e->setMinimumQuantity($_POST["minimum"]);
        $e->setStartDate($_POST["starDate"]);
        $e->setMaxQuabtity($_POST["max"]);
        $e->setEndDate($_POST["endDate"]);
        $e->setEstade(1);

        if ($eM->insert($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function getInformation()
    {
        $eM = new \Modelo\Metodos\PromotionsM();

        $idPromotions = $_POST["idPromotions"];
        $promotionsInformation = $eM->getInformation($idPromotions);
        $retVal = array();
        if ($promotionsInformation != null) {
            foreach ($promotionsInformation as $promotions) {
                $retVal[] = [
                    'id' => $promotions->getId(),
                    'nombrePromotions' => $promotions->getName(),
                    'typePromotions' => $promotions->getTypePromotions(),
                    'discount' => $promotions->getDiscount(),
                    'minimumQuantity' => $promotions->getMinimumQuantity(),
                    'maxQuantity' => $promotions->getMaxQuabtity(),
                    'starDate' => $promotions->getStartDate(),
                    'endDate' => $promotions->getEndDate(),
                    'estade' => $promotions->getEstade(),
                ];
            }
        }
        echo json_encode($retVal);
    }

    function update()
    {
        $e = new \Modelo\Entidades\Promotions();
        $eM = new \Modelo\Metodos\PromotionsM();

        $e->setId($_POST["idPromotions"]);
        $e->setName($_POST["namePromotions"]);
        $e->setTypePromotions($_POST["TypePromotions"]);
        $e->setDiscount($_POST["Discount"]);
        $e->setMinimumQuantity($_POST["minimum"]);
        $e->setMaxQuabtity($_POST["max"]);
        $e->setStartDate($_POST["starDate"]);
        $e->setEndDate($_POST["endDate"]);

        if ($eM->update($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function delete(){
        $e = new \Modelo\Entidades\Promotions();
        $eM = new \Modelo\Metodos\PromotionsM();

        $idPromotions = $_POST["idPromotions"];

        if ($eM->ChangeStatus($idPromotions)){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }

    function InsertPromotionProduct()
    {
        $e = new \Modelo\Entidades\PromotionsProducts();
        $eM = new \Modelo\Metodos\PromotionsM();

        $e->setProductId($_POST["ProductId"]);
        $e->setPromotionId($_POST["PromotionId"]);
        $e->setEstade(1);
        if ($eM->insertPromtionsProduct($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }


}