<?php

namespace Modelo\Metodos;
use Modelo\Conexion;
use Modelo\Entidades\Costumers;

class CostumersM
{
    function ViewAll(){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "SELECT * FROM CUSTOMERS WHERE ESTADE=1;";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Costumers();
                $e->setIdCustomer($fila["ID_CUSTOMER"]);
                $e->setIdentification($fila["IDENTIFICATION"]);
                $e->setFirstName($fila["FIRSTNAME"]);
                $e->setLastName($fila["LASTNAME"]);
                $e->setAddress($fila["ADDRESS"]);
                $e->setPhoneNumber($fila["PHONENUMBER"]);
                $e->setEmail($fila["EMAIL"]);
                $e->setStatus($fila["ESTADE"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function insert(Costumers $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "INSERT INTO CUSTOMERS (IDENTIFICATION, FIRSTNAME, LASTNAME, ADDRESS, PHONENUMBER, EMAIL, ESTADE) VALUES (
                '" . $es->getIdentification() . "',
                '" . $es->getFirstName() . "',
                '" . $es->getLastName() . "',
                '" . $es->getAddress() . "',
                '" . $es->getPhoneNumber() . "',
                '" . $es->getEmail() . "',
                " . $es->getStatus() . "
                )";
        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }

    function getInformation($id){
        $retVal = array();
        $conexion = new Conexion();
        $sql = "SELECT * FROM CUSTOMERS WHERE ID_CUSTOMER=$id;";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Costumers();
                $e->setIdCustomer($fila["ID_CUSTOMER"]);
                $e->setIdentification($fila["IDENTIFICATION"]);
                $e->setFirstName($fila["FIRSTNAME"]);
                $e->setLastName($fila["LASTNAME"]);
                $e->setAddress($fila["ADDRESS"]);
                $e->setPhoneNumber($fila["PHONENUMBER"]);
                $e->setEmail($fila["EMAIL"]);
                $e->setStatus($fila["ESTADE"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function getMail($id){
        $retVal = array();
        $conexion = new Conexion();
        $sql = "SELECT * FROM CUSTOMERS WHERE ID_CUSTOMER=$id;";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $information = array(
                    'EMAIL' => $fila["EMAIL"],
                    'NOMBRE' => $fila["FIRSTNAME"] . " ".$fila["LASTNAME"],
                );
                $retVal[] = $information; // Cambio aquí
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }




    function update(Costumers $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "UPDATE CUSTOMERS SET
            IDENTIFICATION = '" . $es->getIdentification() . "',
            FIRSTNAME = '" . $es->getFirstName() . "',
            LASTNAME = '" . $es->getLastName() . "',
            ADDRESS = '" . $es->getAddress() . "',
            PHONENUMBER = '" . $es->getPhoneNumber() . "',
            EMAIL = '" . $es->getEmail() . "'
            WHERE ID_CUSTOMER = '" . $es->getIdCustomer() . "'";


        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }

    function ChangeStatus($id){
        $retVal = false;
        $conexion = new Conexion();
        $sql="UPDATE CUSTOMERS SET ESTADE = 0 WHERE ID_CUSTOMER=$id;";
        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;

    }

    function getCountCostumers(){
        $retVal = array();
        $conexion = new Conexion();
        $sql = "SELECT COUNT(*) as Clientes FROM CUSTOMERS;";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $sales = array(
                    'Clientes' => $fila['Clientes'],
                );
                $retVal[] = $sales;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }
}