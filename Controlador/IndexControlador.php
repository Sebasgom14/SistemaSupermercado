<?php

session_start();
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Employees.php';
require_once './Modelo/Metodos/EmployeesM.php';
require_once './Controlador/MailControlador.php';
class IndexControlador
{
    function Index()
    {
        require_once './Vista/View/Login/Login.php';
    }

    function Principal()
    {
        require_once './Vista/View/Index.php';
    }
    function test()
    {
        require_once './Vista/View/test/index.php';
    }

    function PasswordRestore(){
        require_once './Vista/View/Login/PasswordResture.php';
    }

    function CodigoPassword()
    {
        require_once './Vista/View/Login/CodigoPassword.php';
    }

    function Password()
    {
        date_default_timezone_set('America/Costa_Rica');
        $est = new \Modelo\Entidades\Employees();
        $estM = new \Modelo\Metodos\EmployeesM();
        $send = new MailControlador();

        $cedula = $_POST["cedulaRestore"];
        $codigoUnico = uniqid();
        $codigoExpiracion = date('Y-m-d H:i:s');

        if (($est = $estM->BuscarUsuario($cedula)) != null) {
            if ($estM->GenerateCodePass($est->getID_EMPLOYEE(), $codigoUnico, $codigoExpiracion)) {
                $correo = $send->sendEmail(
                    $est->getEMAIL_EMPLOYEES(),
                    'Restaurar contraseña',
                    '<p>¡Hola ' . $est->getFIRSTNAME() . ' ' . $est->getLASTNAME() . '!</p>' .
                    '<p>Te informamos que tu código de seguridad es: ' . $codigoUnico . '</p>' .
                    '<p>Para restablecer tu contraseña, haz clic en el siguiente enlace:</p>' .
                    '<p><a href="http://127.0.0.1/SUPERMARKET/index.php?controlador=index&accion=CodigoPassword&codigo=' . $est->getID_EMPLOYEE() . '">Restablecer contraseña</a></p>'

                );
                echo json_encode(true);
                exit(); // Agregado para evitar que el script siga ejecutándose
            } else {
                echo json_encode(false);
                exit(); // Agregado para evitar que el script siga ejecutándose
            }
        } else {
            echo json_encode(false);
        }
    }

    function VeriPass(){
        $id = $_POST["id"];
        $codigo= $_POST["codigo"];

        $est = new \Modelo\Entidades\Employees();
        $estM = new \Modelo\Metodos\EmployeesM();

        if (($est = $estM->BuscarId($id)) != null) {
            $fechaActual = new DateTime();
            $fechaExpiracion = new DateTime($est->getCodeExpiration());
            $intervalo = $fechaActual->diff($fechaExpiracion);

            if ($intervalo->i < 15) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
        } else {
            echo json_encode(false);
        }
    }

    function changePass()
    {
        $e = new \Modelo\Entidades\Employees();
        $eM = new \Modelo\Metodos\EmployeesM();

        $e->setID_EMPLOYEE($_POST["id"]);
        $e->setPASSWORD(password_hash($_POST["pass"],PASSWORD_DEFAULT));

        if ($eM->ChangePass($e)) {
            echo json_encode(true);
            $eM->DesactivarCodePass($e->getID_EMPLOYEE());
        } else {
            echo json_encode(false);
        }
    }






    function ingresar()
    {
        $user = $_POST["user"];
        $contra = $_POST["pass"];

        $est = new \Modelo\Entidades\Employees();
        $estM = new \Modelo\Metodos\EmployeesM();

        if (($est = $estM->BuscarUsuario($user))!= null) {

            if($est->getESTADE()==0){
                header("Location: ./index.php");
            }else{
                if (password_verify($contra, $est->getPASSWORD())) {
                    $_SESSION['idUsuario'] = $est->getID_EMPLOYEE();
                    header("Location: ./index.php?controlador=index&accion=Principal");
                } else {
                    header("Location: ./index.php");
                }
            }
        } else {

            header("Location: ./index.php");
        }
    }
    function Cerrar()
    {
        session_destroy();
        header("Location:./index.php");
    }
}

