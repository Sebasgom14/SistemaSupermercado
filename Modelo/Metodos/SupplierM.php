<?php

namespace Modelo\Metodos;

use Modelo\Conexion;
use Modelo\Entidades\Products;
use Modelo\Entidades\Supliers;

class SupplierM
{
    function ViewAll(){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "SELECT * FROM SUPPLIERS WHERE ESTADE=1;";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Supliers();
                $e->setIdSupplier($fila["ID_SUPPLIER"]);
                $e->setCompanyName($fila["COMPANYNAME"]);
                $e->setContactPerson($fila["CONTACTPERSON"]);
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

    function insert(Supliers $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "INSERT INTO SUPPLIERS (COMPANYNAME, CONTACTPERSON, PHONENUMBER, EMAIL, ESTADE) VALUES (
                '" . $es->getCompanyName() . "',
                '" . $es->getContactPerson() . "',
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
        $sql = "SELECT * FROM SUPPLIERS WHERE ID_SUPPLIER=$id;";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Supliers();
                $e->setIdSupplier($fila["ID_SUPPLIER"]);
                $e->setCompanyName($fila["COMPANYNAME"]);
                $e->setPhoneNumber($fila["PHONENUMBER"]);
                $e->setEmail($fila["EMAIL"]);
                $e->setContactPerson($fila["CONTACTPERSON"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function update(Supliers $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "UPDATE SUPPLIERS SET 
            COMPANYNAME = '" . $es->getCompanyName() . "',
            CONTACTPERSON = '" . $es->getContactPerson() . "',
            PHONENUMBER = '" . $es->getPhoneNumber() . "',
            EMAIL = '" . $es->getEmail() . "'
            WHERE ID_SUPPLIER = " . $es->getIdSupplier();

        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }

    function ChangeStatus($id){
        $retVal = false;
        $conexion = new Conexion();
        $sql="UPDATE SUPPLIERS SET ESTADE = 0 WHERE ID_SUPPLIER=$id;";
        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;

    }





}