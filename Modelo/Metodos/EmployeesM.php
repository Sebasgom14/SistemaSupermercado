<?php

namespace Modelo\Metodos;
use Modelo\Conexion;
use Modelo\Entidades\CivilRegister;
use Modelo\Entidades\Employees;
use Modelo\Entidades\Product_Categories;

class EmployeesM
{
    function BuscarUsuario($user)
    {
        $e= new Employees();
        $conexion = new Conexion();

        $sql="SELECT * FROM `EMPLOYEES` WHERE `IDENTIFICATION` = $user;";
        $resultado=$conexion->Ejecutar($sql);

        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $e->setID_EMPLOYEE($fila["ID_EMPLOYEE"]);
                $e->setIDENTIFICATION($fila["IDENTIFICATION"]);
                $e->setFIRSTNAME($fila["FIRSTNAME"]);
                $e->setLASTNAME($fila["LASTNAME"]);
                $e->setPOSITION($fila["POSITION"]);
                $e->setSALARY($fila["SALARY"]);
                $e->setHIRINGDATE($fila["HIRINGDATE"]);
                $e->setESTADE($fila["ESTADE"]);
                $e->setPASSWORD($fila["PASSWORD"]);
                $e->setEMAIL_EMPLOYEES($fila["EMAIL_EMPLOYEES"]);
            }
        }
        else
            $e=null;
        $conexion->Cerrar();

        return $e;
    }

    function BuscarId($id)
    {
        $e= new Employees();
        $conexion = new Conexion();

        $sql="SELECT * FROM `EMPLOYEES` WHERE `ID_EMPLOYEE` = $id;";

        $resultado=$conexion->Ejecutar($sql);

        if(mysqli_num_rows($resultado)>0)
        {
            while($fila=$resultado->fetch_assoc())
            {
                $e->setID_EMPLOYEE($fila["ID_EMPLOYEE"]);
                $e->setIDENTIFICATION($fila["IDENTIFICATION"]);
                $e->setFIRSTNAME($fila["FIRSTNAME"]);
                $e->setLASTNAME($fila["LASTNAME"]);
                $e->setPOSITION($fila["POSITION"]);
                $e->setEMAIL_EMPLOYEES($fila["EMAIL_EMPLOYEES"]);
            }
        }
        else
            $e=null;
        $conexion->Cerrar();

        return $e;
    }

    function ViewAll(){
        $retVal = array();
        $conexion = new Conexion();

        $sql = "CALL GET_EMPLOYEES();";
        $resultado = $conexion->Ejecutar($sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Employees();
                $e->setID_EMPLOYEE($fila["ID_EMPLOYEE"]);
                $e->setIDENTIFICATION($fila["IDENTIFICATION"]);
                $e->setFIRSTNAME($fila["FIRSTNAME"]);
                $e->setLASTNAME($fila["LASTNAME"]);
                $e->setPOSITION($fila["POSITION"]);
                $e->setSALARY($fila["SALARY"]);
                $e->setHIRINGDATE($fila["HIRINGDATE"]);
                $e->setESTADE($fila["ESTADE"]);
                $e->setEMAIL_EMPLOYEES($fila["EMAIL_EMPLOYEES"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }


    function insert(Employees $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "INSERT INTO EMPLOYEES (IDENTIFICATION, FIRSTNAME, LASTNAME, POSITION, SALARY, HIRINGDATE, ESTADE, PASSWORD, EMAIL_EMPLOYEES) VALUES (
                '" . $es->getIDENTIFICATION() . "',
                '" . $es->getFIRSTNAME() . "',
                '" . $es->getLASTNAME() . "',
                '" . $es->getPOSITION() . "',
                '" . $es->getSALARY() . "',
                '" . $es->getHIRINGDATE() . "',
                '" . $es->getESTADE() . "',
                '" . $es->getPASSWORD() . "',
                '" . $es->getEMAIL_EMPLOYEES() . "'
                )";

        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }

    function getInformation($id){
        $retVal = array();
        $conexion = new Conexion();
        $sql = "SELECT * FROM EMPLOYEES WHERE ID_EMPLOYEE=$id";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Employees();
                $e->setID_EMPLOYEE($fila["ID_EMPLOYEE"]);
                $e->setIDENTIFICATION($fila["IDENTIFICATION"]);
                $e->setFIRSTNAME($fila["FIRSTNAME"]);
                $e->setLASTNAME($fila["LASTNAME"]);
                $e->setPOSITION($fila["POSITION"]);
                $e->setSALARY($fila["SALARY"]);
                $e->setHIRINGDATE($fila["HIRINGDATE"]);
                $e->setESTADE($fila["ESTADE"]);
                $e->setEMAIL_EMPLOYEES($fila["EMAIL_EMPLOYEES"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }

    function getInformationProfile($id){
        $retVal = array();
        $conexion = new Conexion();
        $sql = "SELECT * FROM EMPLOYEES 
                INNER JOIN EMPLOYEE_POSITIONS AS EP ON EMPLOYEES.POSITION= EP.ID_POSITION
                WHERE ID_EMPLOYEE=$id;";
        $resultado = $conexion->Ejecutar($sql);
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $e = new Employees();
                $e->setID_EMPLOYEE($fila["ID_EMPLOYEE"]);
                $e->setIDENTIFICATION($fila["IDENTIFICATION"]);
                $e->setFIRSTNAME($fila["FIRSTNAME"]);
                $e->setLASTNAME($fila["LASTNAME"]);
                $e->setNamePosition($fila["POSITION_NAME"]);
                $e->setPOSITION($fila["POSITION"]);
                $e->setSALARY($fila["SALARY"]);
                $e->setHIRINGDATE($fila["HIRINGDATE"]);
                $e->setESTADE($fila["ESTADE"]);
                $e->setEMAIL_EMPLOYEES($fila["EMAIL_EMPLOYEES"]);
                $retVal[] = $e;
            }
        } else
            $retVal = null;
        $conexion->Cerrar();
        return $retVal;
    }



    function update(Employees $es){
        $retVal = false;
        $conexion = new Conexion();

        $sql = "UPDATE EMPLOYEES SET
            IDENTIFICATION = '" . $es->getIDENTIFICATION() . "',
            FIRSTNAME = '" . $es->getFIRSTNAME() . "',
            LASTNAME = '" . $es->getLASTNAME() . "',
            POSITION = '" . $es->getPOSITION() . "',
            SALARY = '" . $es->getSALARY() . "',
            HIRINGDATE = '" . $es->getHIRINGDATE() . "',
            EMAIL_EMPLOYEES = '" . $es->getEMAIL_EMPLOYEES() . "'
            WHERE ID_EMPLOYEE = " . $es->getID_EMPLOYEE();


        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;
    }

    function ChangeStatus($id,$estade){
        $retVal = false;
        $conexion = new Conexion();
        $sql="UPDATE EMPLOYEES SET ESTADE = $estade WHERE ID_EMPLOYEE=$id;";
        if ($conexion->Ejecutar($sql))
            $retVal = true;
        $conexion->Cerrar();
        return $retVal;

    }

    function ChangePass(Employees $e)
    {
        $retVal=false;
        $conexion=new Conexion();
        $sql="UPDATE `EMPLOYEES` SET `PASSWORD`='".$e->getPASSWORD()."' WHERE ID_EMPLOYEE = ".$e->getID_EMPLOYEE();
        if($conexion->Ejecutar($sql))
            $retVal=true;
        $conexion->Cerrar();
        return $retVal;
    }




}