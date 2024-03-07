<?php
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Estade.php';
require_once './Modelo/Metodos/EstadeM.php';
class EstadeControlador
{

    function Todos()
    {
        $eM = new \Modelo\Metodos\EstadeM();
        $todos = $eM->ViewAll();

        $retVal = [];

        foreach ($todos as $t) {
            $id = $t->getIdEstade();
            $nameEstade = $t->getNameEstade();
            $estade = $t->getEstade();

            $retVal[] = [
                'id' => $id,
                'nombre' => $nameEstade,
                'estado' => $estade
            ];
        }
        echo json_encode($retVal);
    }


}