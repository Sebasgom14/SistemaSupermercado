<?php

namespace Modelo\Metodos;

use Modelo\Conexion;
use Modelo\Entidades\Sales;
use Modelo\Entidades\Sales_Detail;
class SalesM
{
    function ViewAll(){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "SELECT * FROM SUPERMARKET.SALES 
                INNER JOIN CUSTOMERS AS C  ON SALES.ID_CUSTOMER = C.ID_CUSTOMER 
                ORDER BY SALES.SALEDATE ASC;";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $inventory = array(
                    'ID_SALE' => $fila['ID_SALE'],
                    'ID_CUSTOMER' => $fila['ID_CUSTOMER'],
                    'SALEDATE' => $fila['SALEDATE'],
                    'TOTALSALE' => $fila['TOTALSALE'],
                    'FIRSTNAME' => $fila['FIRSTNAME'],
                    'LASTNAME' => $fila['LASTNAME'],
                    'EMAIL' => $fila['EMAIL'],
                );
                $retVal[] = $inventory; // Cambio aquí
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }




    function insert(Sales $es) {
        $retVal = false;
        $conexion = new Conexion();

        try {

            $sqlSales = "INSERT INTO SALES (ID_CUSTOMER, SALEDATE, TOTALSALE, ESTADE, SUBTOTAL, IVA) VALUES (
                '" . $es->getIdCustomer() . "',
                CURRENT_TIMESTAMP,
                " . $es->getTotalSale() . ",
                " . $es->getStatus() . ",
                " . $es->getSubtotal() . ",
                " . $es->getIva() . "
            )";


            $conexion->Ejecutar($sqlSales);

            // Obtener el ID de la venta insertada
            $idSale = $conexion->lastInsertId();
            foreach ($es->getSalesDetails() as $detalle) {
                $sqlSalesDetail = "INSERT INTO SALES_DETAIL (ID_SALE, ID_PRODUCT, QUANTITYSOLD, UNITPRICE, SUBTOTALPRODUCT, ESTADE) VALUES (
                                    '$idSale',
                                    '" . $detalle->getIdProduct() . "',
                                    '" . $detalle->getQuantitySold() . "',
                                    '" . $detalle->getUnitPrice() . "',
                                    '" . $detalle->getSubtotal() . "',
                                    '1'
                                    )";
                $conexion->Ejecutar($sqlSalesDetail);
            }

            foreach ($es->getSalesDetails() as $detalle) {
                $sqlTransaction = "INSERT INTO INVENTORY_TRANSACTIONS (TRANSACTIONTYPE, ID_PRODUCT, QUANTITY, TRANSACTIONDATE, ESTADE) VALUES (
                                    '" . 2 . "',
                                    '" . $detalle->getIdProduct() . "',
                                    '" . $detalle->getQuantitySold() . "',
                                    CURRENT_TIMESTAMP,
                                    " . 1 . "
                                    )";

                $conexion->Ejecutar($sqlTransaction);
            }


            foreach ($es->getSalesDetails() as $detalle) {
                $idProduct = $detalle->getIdProduct();
                $quantitySold = $detalle->getQuantitySold();

                $sqlInventory = "UPDATE INVENTORY SET QUANTITYINSTOCK = QUANTITYINSTOCK - $quantitySold WHERE ID_PRODUCT = '$idProduct'";
                $conexion->Ejecutar($sqlInventory);
            }

            $retVal = true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            // Cerrar la conexión
            $conexion->Cerrar();
        }

        return $retVal;
    }

    function getInformation($id)
    {
        $retVal = array();
        $conexion = new Conexion();
        $sql = "CALL sp_get_sales_info($id);";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $sales = array(
                    'ID_SALE' => $fila['ID_SALE'],
                    'ID_CUSTOMER' => $fila['ID_CUSTOMER'],
                    'SALEDATE' => $fila['SALEDATE'],
                    'TOTALSALE' => $fila['TOTALSALE'],
                    'SUBTOTAL' => $fila['SUBTOTAL'],
                    'IVA' => $fila['IVA'],
                    'CustomerFirstName' => $fila['CustomerFirstName'],
                    'CustomerLastName' => $fila['CustomerLastName'],
                    'ID_PRODUCT' => $fila['ID_PRODUCT'],
                    'SUBTOTALPRODUCT' => $fila['SUBTOTALPRODUCT'],
                    'QUANTITYSOLD' => $fila['QUANTITYSOLD'],
                    'UNITPRICE' => $fila['UNITPRICE'],
                    'ProductName' => $fila['ProductName'],
                    'ProductPrice' => $fila['ProductPrice'],
                    'ProductImagePath' => $fila['ProductImagePath']
                );
                $retVal[] = $sales;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function getCountSales(){
        $retVal = array();
        $conexion = new Conexion();
        $sql = "SELECT COUNT(*) as Ventas FROM SALES;";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $sales = array(
                    'VentasRealizadas' => $fila['Ventas'],
                );
                $retVal[] = $sales;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function getTotalSales(){
        $retVal = array();
        $conexion = new Conexion();
        $sql = "SELECT SUM(TOTALSALE) AS total
                FROM SALES;";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $sales = array(
                    'TotalVentas' => $fila['total'],
                );
                $retVal[] = $sales;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function getDataforGrafics()
    {
        $retVal = array();
        $conexion = new Conexion();
        $sql = "SELECT SALEDATE, TOTALSALE
                FROM SALES
                WHERE ESTADE = 1; ";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $sales = array(
                    'Fecha' => $fila['SALEDATE'],
                    'TotalVentas' => $fila['TOTALSALE'],
                );
                $retVal[] = $sales;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function getSalesByDay()
    {
        $retVal = array();
        $conexion = new Conexion();
        $sql = "SELECT SALEDATE, COUNT(*) as TotalVentasPorDia
                FROM SALES
                GROUP BY SALEDATE
                ORDER BY SALEDATE; ";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $sales = array(
                    'Fecha' => $fila['SALEDATE'],
                    'TotalVentasPorDia' => $fila['TotalVentasPorDia'],
                );
                $retVal[] = $sales;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

}