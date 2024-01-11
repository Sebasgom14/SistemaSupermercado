<?php

require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Supliers.php';
require_once './Modelo/Metodos/SupplierM.php';
class SupplierControlador
{
    private function viewAll(){
        $estM = new \Modelo\Metodos\SupplierM();
        $suppliers = $estM->ViewAll();

        return $suppliers;
    }


    function Principal()
    {
        $suppliers = $this->viewAll();
        require_once './Vista/View/Suppliers/Index.php';
    }

    function Todos()
    {
        $eM = new \Modelo\Metodos\SupplierM();
        $todos = $eM->ViewAll();

        foreach ($todos as $t) {
            $id = $t->getIdSupplier();
            $companyname = $t->getCompanyName();
            $contactPerson = $t->getContactPerson();
            $phonenumber = $t->getPhoneNumber();
            $email = $t->getEmail();
            $estade = $t->getStatus();

            $retVal[] = [
                'id' => $id,
                'nombre' => $companyname,
                'contacto' => $contactPerson,
                'telefono' => $phonenumber,
                'email' => $email,
                'estado' => $estade
            ];
        }
        echo json_encode($retVal);
    }

    function Insert()
    {
        $e = new \Modelo\Entidades\Supliers();
        $eM = new \Modelo\Metodos\SupplierM();

        $e->setCompanyName($_POST["nameProveedor"]);
        $e->setContactPerson($_POST["contactoProveedor"]);
        $e->setEmail($_POST["emailProveedor"]);
        $e->setPhoneNumber($_POST["phoneProveedor"]);
        $e->setStatus(1);

        if ($eM->insert($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function getInformation()
    {
        $eM = new \Modelo\Metodos\SupplierM();

        $idProveedor = $_POST["idProveedor"];
        $supplierInformation = $eM->getInformation($idProveedor);
        $retVal = array();
        if ($supplierInformation != null) {
            foreach ($supplierInformation as $supplier) {
                $retVal[] = [
                    'id' => $supplier->getIdSupplier(),
                    'nombreProveedor' => $supplier->getCompanyName(),
                    'contactProveedor' => $supplier->getContactPerson(),
                    'phoneProveedor' => $supplier->getPhoneNumber(),
                    'emailProveedor' => $supplier->getEmail(),
                ];
            }
        }
        echo json_encode($retVal);
    }

    function update()
    {
        $e = new \Modelo\Entidades\Supliers();
        $eM = new \Modelo\Metodos\SupplierM();

        $e->setIdSupplier($_POST["idProveedor"]);
        $e->setCompanyName($_POST["nameProveedor"]);
        $e->setContactPerson($_POST["contactoProveedor"]);
        $e->setEmail($_POST["emailProveedor"]);
        $e->setPhoneNumber($_POST["phoneProveedor"]);

        if ($eM->update($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function delete(){
        $e = new \Modelo\Entidades\Supliers();
        $eM = new \Modelo\Metodos\SupplierM();

        $idProveedor = $_POST["idProveedor"];

        if ($eM->ChangeStatus($idProveedor)){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }







}