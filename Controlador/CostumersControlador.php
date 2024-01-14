<?php
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Costumers.php';
require_once './Modelo/Metodos/CostumersM.php';
class CostumersControlador
{
    private function viewAll(){
        $estM = new \Modelo\Metodos\CostumersM();
        $costumer = $estM->ViewAll();

        return $costumer;
    }

    function Principal(){
        $costumer = $this->viewAll();
        require_once './Vista/View/Customers/Index.php';
    }

    function Todos()
    {
        $eM = new \Modelo\Metodos\CostumersM();
        $todos = $eM->ViewAll();

        $retVal = [];

        foreach ($todos as $t) {
            $id = $t->getIdCustomer();
            $clientename = $t->getFirstName(). " " .$t->getLastName();
            $estade = $t->getStatus();

            $retVal[] = [
                'id' => $id,
                'nombre' => $clientename,
                'estado' => $estade
            ];
        }
        echo json_encode($retVal);
    }

    function Insert()
    {
        $e = new \Modelo\Entidades\Costumers();
        $eM = new \Modelo\Metodos\CostumersM();

        $e->setIdentification($_POST["identification"]);
        $e->setFirstName($_POST["firstName"]);
        $e->setLastName($_POST["lastName"]);
        $e->setAddress($_POST["address"]);
        $e->setPhoneNumber($_POST["phone"]);
        $e->setEmail($_POST["email"]);
        $e->setStatus(1);

        if ($eM->insert($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function getInformation()
    {
        $eM = new \Modelo\Metodos\CostumersM();

        $idEmpleado = $_POST["idEmpleado"];
        $empleadoInformation = $eM->getInformation($idEmpleado);
        $retVal = array();
        if ($empleadoInformation != null) {
            foreach ($empleadoInformation as $empleado) {
                $retVal[] = [
                    'id' => $empleado->getIdCustomer(),
                    'firstEmpleado' => $empleado->getFirstName(),
                    'lastEmpleado' => $empleado->getLastName(),
                    'identification' => $empleado->getIdentification(),
                    'address' => $empleado->getAddress(),
                    'phone' => $empleado->getPhoneNumber(),
                    'email' => $empleado->getEmail(),
                    'estade' => $empleado->getStatus(),
                ];
            }
        }
        echo json_encode($retVal);
    }

    function update()
    {
        $e = new \Modelo\Entidades\Costumers();
        $eM = new \Modelo\Metodos\CostumersM();

        $e->setIdCustomer($_POST["id"]);
        $e->setIdentification($_POST["identification"]);
        $e->setFirstName($_POST["firstName"]);
        $e->setLastName($_POST["lastName"]);
        $e->setAddress($_POST["address"]);
        $e->setPhoneNumber($_POST["phone"]);
        $e->setEmail($_POST["email"]);

        if ($eM->update($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function delete(){
        $e = new \Modelo\Entidades\Costumers();
        $eM = new \Modelo\Metodos\CostumersM();

        $idCliente = $_POST["id"];

        if ($eM->ChangeStatus($idCliente)){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }

    function getCountCostumers()
    {
        $eM = new \Modelo\Metodos\CostumersM();

        $costumersInformation = $eM->getCountCostumers();
        $retVal = array();
        if ($costumersInformation != null) {
            foreach ($costumersInformation as $costumers) {
                $retVal[] = [
                    'Clientes' => $costumers['Clientes'],
                ];
            }
        }
        echo json_encode($retVal);
    }



}