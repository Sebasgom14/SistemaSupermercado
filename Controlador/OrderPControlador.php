<?php
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/OrderPurchase.php';
require_once './Modelo/Entidades/Supliers.php';
require_once './Modelo/Metodos/SupplierM.php';
require_once './Modelo/Entidades/Detail_OderPurchase.php';
require_once './Modelo/Metodos/OrderPurchaseM.php';
require_once './Controlador/MailControlador.php';
class OrderPControlador
{
    function Principal()
    {
        require_once './Vista/View/OrderPurchase/index.php';
    }



    function getInformation()
    {
        $eM = new \Modelo\Metodos\OrderPurchaseM();

        $orderInformation = $eM->ViewAll();
        $retVal = array();
        if ($orderInformation != null) {
            foreach ($orderInformation as $order) {
                $retVal[] = [
                    'ID_OrdersPurchase' => $order['ID_OrdersPurchase'],
                    'ID_Suppliers' => $order['ID_Suppliers'],
                    'OrderDate' => $order['OrderDate'],
                    'ID_Estade' => $order['ID_Estade'],
                    'PDF_PATH' => $order['PDF_PATH'],
                    'COMPANYNAME' => $order['COMPANYNAME'],
                    'IMAGE_PATH' => $order['IMAGE_PATH'],
                ];
            }
        }
        echo json_encode($retVal);
    }

    function Insert()
    {
        $s = new \Modelo\Entidades\OrderPurchase();
        $eM = new \Modelo\Metodos\OrderPurchaseM();
        $cM = new \Modelo\Metodos\SupplierM();
        $send = new MailControlador();

        // Verificar si los detalles de la orden se enviaron como JSON
        if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
            $decoded_data = json_decode(file_get_contents('php://input'), true);
            $s->setIdSuppliers(isset($decoded_data["proveedor"]) ? $decoded_data["proveedor"] : null);
            $detallesOrden = isset($decoded_data["detallesOrden"]) ? $decoded_data["detallesOrden"] : null;
        } else {
            $s->setIdSuppliers(isset($_POST["provedor"]) ? $_POST["provedor"] : null);
            $detallesOrden = isset($_POST["detallesOrden"]) ? $_POST["detallesOrden"] : null;
        }

        $supplierInformation = $cM->getMail($s->getIdSuppliers());
        $correoProveedor = '';
        $nombreProveedor = '';

        if ($supplierInformation != null) {
            foreach ($supplierInformation as $costumer) {
                $correoProveedor = $costumer['EMAIL'];
                $nombreProveedor = $costumer['NOMBRE'];
            }
        }

        if (is_array($detallesOrden)) {
            // Crear un array para almacenar los detalles de la venta
            $orderDetails = [];

            foreach ($detallesOrden as $detalle) {
                $sd = new \Modelo\Entidades\Detail_OderPurchase();
                $sd->setIdProducts(isset($detalle["idProducto"]) ? $detalle["idProducto"] : null);
                $sd->setAmount(isset($detalle["cantidad"]) ? $detalle["cantidad"] : null);
                $sd->setProductName(isset($detalle["nombreProducto"]) ? $detalle["nombreProducto"] : null);
                $orderDetails[] = $sd;
            }

            $s->setOrderDetails($orderDetails);

            $contenidoPDF = $send->generarPDFOrden($detallesOrden, $nombreProveedor);
            $ruta_guardado = './Vista/filesRepository/OrderPurchase/';
            $nombre_archivo = 'Orden_' . uniqid() . '.pdf';

            file_put_contents($ruta_guardado . $nombre_archivo, $contenidoPDF);

            $ruta_completa = $ruta_guardado . $nombre_archivo;
            $s->setPdfPath($ruta_completa);
            $correo = $send->sendEmail($correoProveedor, 'Orden realizada', 'Adjunto encontrarás la solicitud de productos.', $ruta_completa);

            if ($eM->insert($s)) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
        } else {
            echo json_encode(false);
        }
    }

    function getInformationbydate()
    {
        $eM = new \Modelo\Metodos\OrderPurchaseM();
        $date = $_POST["date"];
        $orderInformation = $eM->filterDate($date);
        $retVal = array();
        if ($orderInformation != null) {
            foreach ($orderInformation as $order) {
                $retVal[] = [
                    'ID_OrdersPurchase' => $order['ID_OrdersPurchase'],
                    'ID_Suppliers' => $order['ID_Suppliers'],
                    'OrderDate' => $order['OrderDate'],
                    'ID_Estade' => $order['ID_Estade'],
                    'PDF_PATH' => $order['PDF_PATH'],
                    'COMPANYNAME' => $order['COMPANYNAME'],
                    'IMAGE_PATH' => $order['IMAGE_PATH'],
                ];
            }
        }
        echo json_encode($retVal);
    }

    function getallinformation()
    {
        $eM = new \Modelo\Metodos\OrderPurchaseM();

        $idOrder = $_POST["orderId"];
        $orderInformation = $eM->getAllData($idOrder);
        $retVal = array();
        if ($orderInformation != null) {
            foreach ($orderInformation as $order) {
                $retVal[] = [
                    'ID_OrdersPurchase' => $order['ID_OrdersPurchase'],
                    'ID_Suppliers' => $order['ID_Suppliers'],
                    'OrderDate' => $order['OrderDate'],
                    'ID_Estade' => $order['ID_Estade'],
                    'PDF_PATH' => $order['PDF_PATH'],
                    'SupplierCompanyName' => $order['SupplierCompanyName'],
                    'IMAGE_PATH' => $order['IMAGE_PATH'],
                    'ProductName' => $order['ProductName'],
                    'Amount' => $order['Amount'],
                    'ProductImagePath' => $order['ProductImagePath']
                ];
            }
        }
        echo json_encode($retVal);
    }


}

