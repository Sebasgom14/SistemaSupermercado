<?php

session_start();
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Employees.php';
require_once './Modelo/Metodos/EmployeesM.php';
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

