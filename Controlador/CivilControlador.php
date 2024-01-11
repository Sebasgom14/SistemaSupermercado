<?php
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/CivilRegister.php';
require_once './Modelo/Metodos/CivilRegisterM.php';
class CivilControlador
{


    function index(){
        require_once "./Vista/View/Index.php";
    }

    function getInformation(){
        $eM = new \Modelo\Metodos\CivilRegisterM();

        $cedula = $_POST["cedula"];
        $personInformation = $eM->getInformation($cedula);
        $retVal = array();
        if ($personInformation != null) {
            foreach ($personInformation as $person) {
                $retVal[] = [
                    'nombre' => $person->getNOMBRE(),
                    'apellidoFirst' => $person->getAPELLIDO1(),
                    'apellidoSecond' => $person->getAPELLIDO2(),
                ];
            }
        }
        echo json_encode($retVal);
    }




}