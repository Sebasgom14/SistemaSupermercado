<?php

namespace Modelo\Metodos;
use Modelo\Conexion;
use Modelo\Entidades\OrderPurchase;
use Modelo\Entidades\Detail_OderPurchase;

class OrderPurchaseM
{

    function ViewAll()
    {
        $retVal = array();
        $conexion = new Conexion();

        $sql = "SELECT * FROM ORDERSPURCHASE
                INNER JOIN SUPPLIERS AS C  ON ORDERSPURCHASE.ID_Suppliers = C.ID_SUPPLIER
                ORDER BY ORDERSPURCHASE.ID_OrdersPurchase DESC ;";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $inventory = array(
                    'ID_OrdersPurchase' => $fila['ID_OrdersPurchase'],
                    'ID_Suppliers' => $fila['ID_Suppliers'],
                    'OrderDate' => $fila['OrderDate'],
                    'ID_Estade' => $fila['ID_Estade'],
                    'PDF_PATH' => $fila['PDF_PATH'],
                    'COMPANYNAME' => $fila['COMPANYNAME'],
                    'IMAGE_PATH' => $fila['IMAGE_PATH'],
                );
                $retVal[] = $inventory; // Cambio aquí
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;

    }
    function insert(OrderPurchase $es) {
        $retVal = false;
        $conexion = new Conexion();

        try {

            $sqlOrder = "INSERT INTO ORDERSPURCHASE (ID_Suppliers, OrderDate, ID_Estade, PDF_PATH) VALUES (
                '" . $es->getIdSuppliers() . "',
                CURRENT_TIMESTAMP,
                " . 1 . ",
                '" . $es->getPdfPath() . "'
            )";
           // print_r($sqlOrder);


            $conexion->Ejecutar($sqlOrder);

            // Obtener el ID de la venta insertada
            $idOrder = $conexion->lastInsertId();
            foreach ($es->getOrderDetails() as $detalle) {
                $sqlSalesDetail = "INSERT INTO DETAILSORDERPURCHASE (ID_OrdersPurchase, ID_Product, Amount) VALUES (
                                    '$idOrder',
                                    '" . $detalle->getIdProducts() . "',
                                    '" . $detalle->getAmount() . "'
                                    )";
                $conexion->Ejecutar($sqlSalesDetail);
            }
            //print_r($sqlSalesDetail);
            $retVal = true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            // Cerrar la conexión
            $conexion->Cerrar();
        }

        return $retVal;
    }

    function filterDate($date){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "SELECT * FROM ORDERSPURCHASE
                INNER JOIN SUPPLIERS AS C  ON ORDERSPURCHASE.ID_Suppliers = C.ID_SUPPLIER
                WHERE OrderDate='$date';";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $inventory = array(
                    'ID_OrdersPurchase' => $fila['ID_OrdersPurchase'],
                    'ID_Suppliers' => $fila['ID_Suppliers'],
                    'OrderDate' => $fila['OrderDate'],
                    'ID_Estade' => $fila['ID_Estade'],
                    'PDF_PATH' => $fila['PDF_PATH'],
                    'COMPANYNAME' => $fila['COMPANYNAME'],
                    'IMAGE_PATH' => $fila['IMAGE_PATH'],
                );
                $retVal[] = $inventory; // Cambio aquí
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function getAllData($id){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "CALL sp_get_purchase_info($id);";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $orden = array(
                    'ID_OrdersPurchase' => $fila['ID_OrdersPurchase'],
                    'ID_Suppliers' => $fila['ID_Suppliers'],
                    'OrderDate' => $fila['OrderDate'],
                    'ID_Estade' => $fila['ID_Estade'],
                    'PDF_PATH' => $fila['PDF_PATH'],
                    'SupplierCompanyName' => $fila['SupplierCompanyName'],
                    'IMAGE_PATH' => $fila['ProductImagePath'],
                    'ProductName' => $fila['ProductName'],
                    'Amount' => $fila['Amount'],
                    'ProductImagePath' => $fila['ProductImagePath']
                );
                $retVal[] = $orden; // Cambio aquí
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }
}