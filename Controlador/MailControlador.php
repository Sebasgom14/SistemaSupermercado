<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Dompdf\Dompdf;
use Dompdf\Options;

require './vendor/autoload.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/setasign/fpdf/fpdf.php';
require_once './Modelo/Metodos/ProductsM.php';
class MailControlador
{
    public function sendEmail($to, $subject, $body, $pdfPath = null)
    {
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'noreplypruebas16@gmail.com';
            $mail->Password = 'lxbl npov cbfk zoev '; // Se recomienda utilizar una contraseña de aplicación en lugar de la contraseña de tu cuenta principal
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; // Puerto 587 para TLS, el puerto 465 es para SSL

            // Configuración del correo
            $mail->setFrom('noreplypruebas16@gmail.com', 'Pruebas');
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->isHTML(true);

            // Si se proporciona una ruta de PDF, lo adjuntamos al correo
            if (!is_null($pdfPath)) {
                $mail->addAttachment($pdfPath);
            }

            $mail->Body = $body;

            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'Error al enviar el correo: ', $mail->ErrorInfo;
            return false;
        }
    }


    function generarPDF($detallesVenta, $total, $iva, $subtotal, $nombreCliente)
    {
        $fechaActual = $this->obtenerFechaActual();
        $eM = new \Modelo\Metodos\ProductsM();

        // Configura las opciones de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true); // Permite la carga de recursos externos
        $dompdf = new Dompdf($options);

        // HTML para el PDF
        $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Invoice</title>
        <style type="text/css">
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table{
                font-size: x-small;
            }
            tfoot tr td{
                font-weight: bold;
                font-size: x-small;
            }

            .gray {
                background-color: lightgray
            }
        </style>
    </head>
    <body>
        <table width="100%">
            <tr>
                <td align="right">
                    <h3>Supermaket</h3>
                    <pre>
                        Supermarket
                        megasuper@gmail.com
                        Telefono: 62381914 
                    </pre>
                </td>
            </tr>
        </table>

        <table width="100%">
            <tr>
                <td><strong>Cliente:</strong> ' . $nombreCliente . '</td>
                <td><strong>Fecha de la factura:</strong> ' . $fechaActual . '</td>
            </tr>
        </table>

        <br/>

        <table width="100%">
            <thead style="background-color: lightgray;">
                <tr>
                    <th>Nombre Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario $</th>
                    <th>Total </th>
                </tr>
            </thead>
            <tbody>';

        // Agregar filas a la tabla con los detalles de la venta
        foreach ($detallesVenta as $detalle) {
            $html .= '
            <tr>
                <th align="center">' . $detalle['nombreProducto'] . '</th>
                <td align="center">' . $detalle['cantidadVendida'] . '</td>
                <td align="center">' . $detalle['precioUnitario'] . '</td>
                <td align="center">' . $detalle['subtotalDetalle'] . '</td>
            </tr>';
        }

        // Cerrar las etiquetas del HTML
        $html .= '
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td align="right">Subtotal</td>
                    <td align="right">' . $subtotal . '</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td align="right">Iva</td>
                    <td align="right">' . $iva . '</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td align="right">Total</td>
                    <td align="right" class="gray">$' . $total . '</td>
                </tr>
            </tfoot>
        </table>
    </body>
    </html>';


        // Después de cargar el HTML en Dompdf
        $dompdf->loadHtml($html);
        // Establece el tamaño y la orientación del papel
        $dompdf->setPaper('A4', 'portrait');

        // Renderiza el documento PDF
        $dompdf->render();

        // Devuelve el contenido del PDF como una cadena
        return $dompdf->output();


    }

    function generarPDFOrden($detallesVenta,  $nombreProveedor)
    {
        $fechaActual = $this->obtenerFechaActual();
        $eM = new \Modelo\Metodos\ProductsM();

        // Configura las opciones de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true); // Permite la carga de recursos externos
        $dompdf = new Dompdf($options);

        // HTML para el PDF
        $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Invoice</title>
        <style type="text/css">
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table{
                font-size: x-small;
            }
            tfoot tr td{
                font-weight: bold;
                font-size: x-small;
            }

            .gray {
                background-color: lightgray
            }
        </style>
    </head>
    <body>
        <table width="100%">
            <tr>
              <td align="left">
                    <h3>Ordenes de compra</h3>
                </td>
                <td align="right">
                    <h3>Supermaket</h3>
                    <pre>
                        Supermarket
                        megasuper@gmail.com
                        Telefono: 62381914 
                    </pre>
                </td>
            </tr>
        </table>

        <table width="100%">
            <tr>
                <td><strong>Proveedor:</strong> ' . $nombreProveedor . '</td>
                <td><strong>Fecha de solicitud:</strong> ' . $fechaActual . '</td>
            </tr>
        </table>

        <br/>

        <table width="100%">
            <thead style="background-color: lightgray;">
                <tr>
                    <th>Nombre Producto</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>';

        // Agregar filas a la tabla con los detalles de la venta
        foreach ($detallesVenta as $detalle) {
            $html .= '
            <tr>
                <th align="center">' . $detalle['nombreProducto'] . '</th>
                <td align="center">' . $detalle['cantidad'] . '</td>
            </tr>';
        }

        // Cerrar las etiquetas del HTML
        $html .= '
            </tbody>
        </table>
    </body>
    </html>';


        // Después de cargar el HTML en Dompdf
        $dompdf->loadHtml($html);
        // Establece el tamaño y la orientación del papel
        $dompdf->setPaper('A4', 'portrait');

        // Renderiza el documento PDF
        $dompdf->render();

        // Devuelve el contenido del PDF como una cadena
        return $dompdf->output();


    }





    function obtenerFechaActual()
    {

        date_default_timezone_set('America/Costa_Rica');
        $fechaActual = new DateTime();

        // Formatea la fecha según tus necesidades
        $formato = 'Y-m-d H:i:s'; // Puedes ajustar el formato según lo que necesites
        $fechaFormateada = $fechaActual->format($formato);

        // Devuelve la fecha formateada
        return $fechaFormateada;
    }

}