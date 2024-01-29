<?php
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/TypePromotions.php';
require_once './Modelo/Metodos/TypeProM.php';
class TypePromotionsControlador
{
    private function viewAll(){
        $estM = new \Modelo\Metodos\TypeProM();
        $type = $estM->ViewAll();

        return $type;
    }


    function Principal(){
        $type = $this->viewAll();
        require_once './Vista/View/Type_Promotions/Index.php';
    }

    function Todos()
    {
        $eM = new \Modelo\Metodos\TypeProM();
        $todos = $eM->ViewAll();

        $retVal = [];

        foreach ($todos as $t) {
            $id = $t->getId();
            $categoryname = $t->getName();
            $estade = $t->getEstade();

            $retVal[] = [
                'id' => $id,
                'nombre' => $categoryname,
                'estado' => $estade
            ];
        }
        echo json_encode($retVal);
    }

    function Insert()
    {
        $e = new \Modelo\Entidades\TypePromotions();
        $eM = new \Modelo\Metodos\TypeProM();

        $e->setName($_POST["nameType"]);
        $e->setEstade(1);

        if ($eM->insert($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function getInformation()
    {
        $eM = new \Modelo\Metodos\TypeProM();

        $idTypeP = $_POST["idTypeP"];
        $typeInformation = $eM->getInformation($idTypeP);
        $retVal = array();
        if ($typeInformation != null) {
            foreach ($typeInformation as $type) {
                $retVal[] = [
                    'id' => $type->getId(),
                    'nombreTipo' => $type->getName(),
                ];
            }
        }
        echo json_encode($retVal);
    }

    function update()
    {
        $e = new \Modelo\Entidades\TypePromotions();
        $eM = new \Modelo\Metodos\TypeProM();

        $e->setId($_POST["idType"]);
        $e->setName($_POST["nameType"]);

        if ($eM->update($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function delete(){
        $e = new \Modelo\Entidades\TypePromotions();
        $eM = new \Modelo\Metodos\TypeProM();

        $idTye = $_POST["idType"];

        if ($eM->ChangeStatus($idTye)){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }
}