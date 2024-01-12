<?php
session_start();
require_once './Modelo/Conexion.php';
require_once './Modelo/Entidades/Employees.php';
require_once './Modelo/Metodos/EmployeesM.php';
class EmployeesControlador
{

    private function viewAll(){
        $estM = new \Modelo\Metodos\EmployeesM();
        $employee = $estM->ViewAll();

        return $employee;
    }


    function Principal(){
        $employee = $this->viewAll();
        require_once './Vista/View/Employees/Index.php';
    }

    function userProfile(){
        $idUser =   $_SESSION['idUsuario'];
        require_once './Vista/View/Employees/userProfile.php';
    }

    function getDataProfile(){
        $eM = new \Modelo\Metodos\EmployeesM();

        $idUser = $_SESSION['idUsuario'];
        $employeeInformation = $eM->getInformationProfile($idUser);
        $retVal = array();
        if ($employeeInformation != null) {
            foreach ($employeeInformation as $employee) {
                $retVal[] = [
                    'id' => $employee->getID_EMPLOYEE(),
                    'firstEmpleado' => $employee->getFIRSTNAME(),
                    'lastEmpleado' => $employee->getLASTNAME(),
                    'identification' => $employee->getIDENTIFICATION(),
                    'positionName' => $employee->getNamePosition(),
                    'position' => $employee->getPOSITION(),
                    'salary' => $employee->getSALARY(),
                    'hiringdate' => $employee->getHIRINGDATE(),
                    'estado' => $employee->getESTADE(),
                    'email' => $employee->getEMAIL_EMPLOYEES(),
                ];
            }
        }

        // Hacer algo con $retVal, como enviarlo como respuesta JSON
        echo json_encode($retVal);
    }

    function Insert()
    {
        $e = new \Modelo\Entidades\Employees();
        $eM = new \Modelo\Metodos\EmployeesM();

        $e->setFIRSTNAME($_POST["firstName"]);
        $e->setLASTNAME($_POST["lastName"]);
        $e->setIDENTIFICATION($_POST["identification"]);
        $e->setHIRINGDATE($_POST["dateEmployee"]);
        $e->setPASSWORD(password_hash($_POST["passEmployee"],PASSWORD_DEFAULT));
        $e->setEMAIL_EMPLOYEES($_POST["emailEmployee"]);
        $e->setSALARY($_POST["salaryEmployee"]);
        $e->setPOSITION($_POST["positionEmployee"]);
        $e->setESTADE(1);


        if ($eM->insert($e)) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    function getInformation()
    {
        $eM = new \Modelo\Metodos\EmployeesM();

        $idEmpleado = $_POST["idEmployee"];
        $employeeInformation = $eM->getInformation($idEmpleado);
        $retVal = array();
        if ($employeeInformation != null) {
            foreach ($employeeInformation as $employee) {
                $retVal[] = [
                    'id' => $employee->getID_EMPLOYEE(),
                    'firstEmpleado' => $employee->getFIRSTNAME(),
                    'lastEmpleado' => $employee->getLASTNAME(),
                    'identification' => $employee->getIDENTIFICATION(),
                    'position' => $employee->getPOSITION(),
                    'salary' => $employee->getSALARY(),
                    'hiringdate' => $employee->getHIRINGDATE(),
                    'estado' => $employee->getESTADE(),
                    'email' => $employee->getEMAIL_EMPLOYEES(),
                ];
            }
        }

        // Hacer algo con $retVal, como enviarlo como respuesta JSON
        echo json_encode($retVal);
    }

    function update()
    {
        $e = new \Modelo\Entidades\Employees();
        $eM = new \Modelo\Metodos\EmployeesM();

        $e->setID_EMPLOYEE($_POST["id"]);
        $e->setFIRSTNAME($_POST["firstName"]);
        $e->setLASTNAME($_POST["lastName"]);
        $e->setIDENTIFICATION($_POST["identification"]);
        $e->setHIRINGDATE($_POST["dateEmployee"]);
        $e->setEMAIL_EMPLOYEES($_POST["emailEmployee"]);
        $e->setSALARY($_POST["salaryEmployee"]);
        $e->setPOSITION($_POST["positionEmployee"]);

        if ($eM->update($e)) {
            echo json_encode(true);
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
        } else {
            echo json_encode(false);
        }
    }

    function delete(){
        $e = new \Modelo\Entidades\Employees();
        $eM = new \Modelo\Metodos\EmployeesM();

        $idEmployee = $_POST["id"];
        $estade = $_POST["estade"];


        if ($eM->ChangeStatus($idEmployee,$estade)){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }

    function validatePass(){
        $est = new \Modelo\Entidades\Employees();
        $eM = new \Modelo\Metodos\EmployeesM();

        $id = $_SESSION['idUsuario'];
        $passOld= $_POST["oldPass"];
        if(($est= $eM->BuscarId($id))!=null) {
            if(password_verify($passOld,$est->getPASSWORD())){
               echo json_encode(true);
            }else {
                echo json_encode(false);
            }
        }else{
           echo  json_encode(false);
        }


    }


}