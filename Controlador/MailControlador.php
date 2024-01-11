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


    function generarPDF($detallesVenta, $total, $subtotal, $iva, $nombreCliente)
    {

        $fechaActual = $this->obtenerFechaActual();

        $eM = new \Modelo\Metodos\ProductsM();
        // Configura las opciones de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        // Crea una instancia de Dompdf
        $dompdf = new Dompdf($options);

        // HTML para el PDF con Bootstrap CSS directamente y la tabla de detalles de la venta
        $html = '
    <html>
        <head>
            <style>
                ' . file_get_contents('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css') . '

                .container {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: space-between;
                    margin-bottom: 20px; /* Ajusta según sea necesario */
                }

                .container > div {
                    box-sizing: border-box;
                    margin-bottom: 10px; /* Ajusta según sea necesario */
                }

                .container > div:nth-child(odd) {
                    flex: 0 0 48%;
                }

                .container > div:nth-child(even) {
                    flex: 0 0 30%;
                }
            </style>
        </head>
        <body>
            <h1 class="text-center">Detalles de la Venta</h1>

            <div class="container">
                <div>
                    <p>Cliente: ' . $nombreCliente . '</p>
                </div>
                <div>
                    <p>Fecha de la compra: ' . $fechaActual . '</p>
                </div>
            </div>

            <div class="container">
                <div>
                    <p>Total de la compra $: ' . $total . '</p>
                </div>
                <div>
                    <p>Subtotal de la compra: $ ' . $subtotal . '</p>
                </div>
                <div>
                    <p>Iva de la compra: $ ' . $iva . '</p>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Cantidad Vendida</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>';

        // Agregar filas a la tabla con los detalles de la venta
        foreach ($detallesVenta as $detalle) {
            $html .= '
            <tr>
                <td>' . $detalle['nombreProducto'] . '</td>
                <td>' . $detalle['cantidadVendida'] . '</td>
                <td>' . $detalle['precioUnitario'] . '</td>
                <td>' . $detalle['subtotalDetalle'] . '</td>
            </tr>';
        }

        // Cerrar las etiquetas del HTML
        $html .= '
                </tbody>
            </table>
        </body>
    </html>';

        // Carga el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Establece el tamaño y la orientación del papel
        $dompdf->setPaper('A4', 'portrait');

        // Renderiza el documento PDF
        $dompdf->render();

        // Devuelve el contenido del PDF como una cadena
        return $dompdf->output();
    }

    function obtenerFechaActual() {
        // Crea un objeto DateTime con la fecha y hora actuales
        $fechaActual = new DateTime();

        // Formatea la fecha según tus necesidades
        $formato = 'Y-m-d H:i:s'; // Puedes ajustar el formato según lo que necesites
        $fechaFormateada = $fechaActual->format($formato);

        // Devuelve la fecha formateada
        return $fechaFormateada;
    }

}