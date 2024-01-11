<?php
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Employee_Positions.php';
require_once './Modelo/Metodos/PositionsM.php';
class EmployeePositionControlador
{

    private function viewAll(){
        $estM = new \Modelo\Metodos\PositionsM();
        $positions = $estM->ViewAll();

        return $positions;
    }

    function Principal(){
        $positions = $this->viewAll();
        require_once './Vista/View/EmployeesPosition/Index.php';
    }


    function Todos()
    {
        $eM = new \Modelo\Metodos\PositionsM();
        $todos = $eM->ViewAll();

        $retVal = [];

        foreach ($todos as $t) {
            $id = $t->getIdPosition();
            $positionname = $t->getPositionName();
            $estade = $t->getStatus();

            $retVal[] = [
                'id' => $id,
                'nombre' => $positionname,
                'estado' => $estade
            ];
        }
        echo json_encode($retVal);
    }





    function Insert()
    {
        $e = new \Modelo\Entidades\Employee_Positions();
        $eM = new \Modelo\Metodos\PositionsM();

        $e->setPositionName($_POST["namePosition"]);
        $e->setDescription($_POST["descriptionPosition"]);
        $e->setStatus(1);

        if ($eM->insert($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function getInformation()
    {
        $eM = new \Modelo\Metodos\PositionsM();

        $idPosition = $_POST["idPosition"];
        $positionInformation = $eM->getInformation($idPosition);
        $retVal = array();
        if ($positionInformation != null) {
            foreach ($positionInformation as $position) {
                $retVal[] = [
                    'id' => $position->getIdPosition(),
                    'nombrePosition' => $position->getPositionName(),
                    'descriptionPosition' => $position->getDescription(),
                ];
            }
        }
        echo json_encode($retVal);
    }

    function update()
    {
        $e = new \Modelo\Entidades\Employee_Positions();
        $eM = new \Modelo\Metodos\PositionsM();

        $e->setIdPosition($_POST["idPosition"]);
        $e->setPositionName($_POST["namePosition"]);
        $e->setDescription($_POST["descriptionPosition"]);

        if ($eM->update($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function delete(){
        $e = new \Modelo\Entidades\Employee_Positions();
        $eM = new \Modelo\Metodos\PositionsM();

        $idPosition = $_POST["idPosition"];

        if ($eM->ChangeStatus($idPosition)){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }





}