<?php


require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Sales.php';
require_once './Modelo/Metodos/SalesM.php';
require_once './Modelo/Entidades/Sales_Detail.php';
require_once './Controlador/MailControlador.php';
require_once './Modelo/Metodos/CostumersM.php';

class SalesControlador
{
    private function viewAll()
    {
        $estM = new \Modelo\Metodos\SalesM();
        $list = array();
        return $this->list = $estM->ViewAll();
    }


    function Principal()
    {
        $sales = $this->viewAll();
        require_once './Vista/View/Sales/Index.php';
    }

    function Insert()
    {
        $s = new \Modelo\Entidades\Sales();
        $eM = new \Modelo\Metodos\SalesM();
        $cM = new \Modelo\Metodos\CostumersM();
        $send = new MailControlador();

        // Verificar si las claves existen antes de asignarlas a las propiedades
        $s->setIdCustomer(isset($_POST["cliente"]) ? $_POST["cliente"] : null);
        $s->setTotalSale(isset($_POST["total"]) ? $_POST["total"] : null);
        $s->setIva(isset($_POST["iva"]) ? $_POST["iva"] : null);
        $s->setSubtotal(isset($_POST["subTotal"]) ? $_POST["subTotal"] : null);
        $s->setStatus(1);
        $detallesVenta = isset($_POST["detallesVenta"]) ? $_POST["detallesVenta"] : null;

        $costumerInformation = $cM->getMail($s->getIdCustomer());
        $correoCliente = '';
        $nombreCliente = '';

        if ($costumerInformation != null) {
            foreach ($costumerInformation as $costumer) {
                $correoCliente = $costumer['EMAIL'];
                $nombreCliente = $costumer['NOMBRE'];
            }
        }

        if (!is_array($detallesVenta)) {
            // Si no es un array, intentar decodificar el cuerpo JSON
            $json_data = file_get_contents('php://input');
            $decoded_data = json_decode($json_data, true);

            if (is_array($decoded_data) && isset($decoded_data["detallesVenta"])) {
                $detallesVenta = $decoded_data["detallesVenta"];
            }
        }

        if (is_array($detallesVenta)) {
            // Crear un array para almacenar los detalles de la venta
            $salesDetails = [];

            foreach ($detallesVenta as $detalle) {
                $sd = new \Modelo\Entidades\Sales_Detail();
                $sd->setIdProduct(isset($detalle["idProducto"]) ? $detalle["idProducto"] : null);
                $sd->setQuantitySold(isset($detalle["cantidadVendida"]) ? $detalle["cantidadVendida"] : null);
                $sd->setUnitPrice(isset($detalle["precioUnitario"]) ? $detalle["precioUnitario"] : null);
                $sd->setSubtotal(isset($detalle["subtotalDetalle"]) ? $detalle["subtotalDetalle"] : null);
                $sd->setProductName(isset($detalle["nombreProducto"]) ? $detalle["nombreProducto"] : null);
                $sd->setStatus(1);
                $salesDetails[] = $sd;
            }

            $s->setSalesDetails($salesDetails);

            $contenidoPDF = $send->generarPDF($detallesVenta,$s->getTotalSale(),$s->getIva(),$s->getSubtotal(),$nombreCliente);
            $ruta_guardado = './Vista/filesRepository/Pdfs/';
            $nombre_archivo = 'Venta_' . uniqid() . '.pdf';

            file_put_contents($ruta_guardado . $nombre_archivo, $contenidoPDF);

            $ruta_completa = $ruta_guardado . $nombre_archivo;
            $correo = $send->sendEmail($correoCliente, 'Venta realizada', 'Adjunto encontrarás el detalle de tu compra.', $ruta_completa);

            if ($eM->insert($s)) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
        } else {
            echo json_encode(false);
        }
    }


    function getInformation()
    {
        $eM = new \Modelo\Metodos\SalesM();

        $idSales = $_POST["idSales"];
        $salesInformation = $eM->getInformation($idSales);
        $retVal = array();
        if ($salesInformation != null) {
            foreach ($salesInformation as $sales) {
                $retVal[] = [
                    'ID_SALE ' => $sales['ID_SALE'],
                    'ID_CUSTOMER' => $sales['ID_CUSTOMER'],
                    'SALEDATE' => $sales['SALEDATE'],
                    'TOTALSALE' => $sales['TOTALSALE'],
                    'SUBTOTAL' => $sales['SUBTOTAL'],
                    'IVA' => $sales['IVA'],
                    'CustomerFirstName' => $sales['CustomerFirstName'],
                    'CustomerLastName' => $sales['CustomerLastName'],
                    'ID_PRODUCT' => $sales['ID_PRODUCT'],
                    'SUBTOTALPRODUCT' => $sales['SUBTOTALPRODUCT'],
                    'QUANTITYSOLD' => $sales['QUANTITYSOLD'],
                    'UNITPRICE' => $sales['UNITPRICE'],
                    'ProductName' => $sales['ProductName'],
                    'ProductPrice' => $sales['ProductPrice'],
                    'ProductImagePath' => $sales['ProductImagePath']
                ];
            }
        }
        echo json_encode($retVal);
    }

    function getCountSales()
    {
        $eM = new \Modelo\Metodos\SalesM();

        $salesInformation = $eM->getCountSales();
        $retVal = array();
        if ($salesInformation != null) {
            foreach ($salesInformation as $sales) {
                $retVal[] = [
                    'VentasRealizadas' => $sales['VentasRealizadas'],
                ];
            }
        }
        echo json_encode($retVal);
    }

    function getTotalSales()
    {
        $eM = new \Modelo\Metodos\SalesM();

        $salesInformation = $eM->getTotalSales();
        $retVal = array();
        if ($salesInformation != null) {
            foreach ($salesInformation as $sales) {
                $retVal[] = [
                    'TotalVentas' => $sales['TotalVentas'],
                ];
            }
        }
        echo json_encode($retVal);
    }

    function getDataForGrafics()
    {
        $eM = new \Modelo\Metodos\SalesM();

        $salesInformation = $eM->getDataforGrafics();
        $retVal = array();
        if ($salesInformation != null) {
            foreach ($salesInformation as $sales) {
                $retVal[] = [
                    'TotalVentas' => $sales['TotalVentas'],
                    'FechaVentas' => $sales['Fecha'],
                ];
            }
        }
        echo json_encode($retVal);
    }

    function getSalesByDay()
    {
        $eM = new \Modelo\Metodos\SalesM();

        $salesInformation = $eM->getSalesByDay();
        $retVal = array();
        if ($salesInformation != null) {
            foreach ($salesInformation as $sales) {
                $retVal[] = [
                    'TotalVentasPorDia' => $sales['TotalVentasPorDia'],
                    'FechaVentas' => $sales['Fecha'],
                ];
            }
        }
        echo json_encode($retVal);
    }


}