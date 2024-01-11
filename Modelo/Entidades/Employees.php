<?php

namespace Modelo\Entidades;

class Employees
{
    private $ID_EMPLOYEE;
    private $IDENTIFICATION;
    private $FIRSTNAME;
    private $LASTNAME;
    private $POSITION;
    private $SALARY;
    private $HIRINGDATE;
    private $ESTADE;
    private $PASSWORD;
    private $EMAIL_EMPLOYEES;

    private $NamePosition;

    /**
     * @return mixed
     */
    public function getNamePosition()
    {
        return $this->NamePosition;
    }

    /**
     * @param mixed $NamePosition
     */
    public function setNamePosition($NamePosition): void
    {
        $this->NamePosition = $NamePosition;
    }



    public function getID_EMPLOYEE() {
        return $this->ID_EMPLOYEE;
    }

    public function setID_EMPLOYEE($ID_EMPLOYEE) {
        $this->ID_EMPLOYEE = $ID_EMPLOYEE;
    }

    public function getIDENTIFICATION() {
        return $this->IDENTIFICATION;
    }

    public function setIDENTIFICATION($IDENTIFICATION) {
        $this->IDENTIFICATION = $IDENTIFICATION;
    }

    public function getFIRSTNAME() {
        return $this->FIRSTNAME;
    }

    public function setFIRSTNAME($FIRSTNAME) {
        $this->FIRSTNAME = $FIRSTNAME;
    }

    public function getLASTNAME() {
        return $this->LASTNAME;
    }

    public function setLASTNAME($LASTNAME) {
        $this->LASTNAME = $LASTNAME;
    }

    public function getPOSITION() {
        return $this->POSITION;
    }

    public function setPOSITION($POSITION) {
        $this->POSITION = $POSITION;
    }

    public function getSALARY() {
        return $this->SALARY;
    }

    public function setSALARY($SALARY) {
        $this->SALARY = $SALARY;
    }

    public function getHIRINGDATE() {
        return $this->HIRINGDATE;
    }

    public function setHIRINGDATE($HIRINGDATE) {
        $this->HIRINGDATE = $HIRINGDATE;
    }

    public function getESTADE() {
        return $this->ESTADE;
    }

    public function setESTADE($ESTADE) {
        $this->ESTADE = $ESTADE;
    }

    public function getPASSWORD() {
        return $this->PASSWORD;
    }

    public function setPASSWORD($PASSWORD) {
        $this->PASSWORD = $PASSWORD;
    }

    public function getEMAIL_EMPLOYEES() {
        return $this->EMAIL_EMPLOYEES;
    }

    public function setEMAIL_EMPLOYEES($EMAIL_EMPLOYEES) {
        $this->EMAIL_EMPLOYEES = $EMAIL_EMPLOYEES;
    }
}