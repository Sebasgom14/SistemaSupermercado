<?php

namespace Modelo\Entidades;

class CivilRegister
{
    private $ID;
    private $CEDULA;
    private $FECHACADUC;
    private $NOMBRE;
    private $APELLIDO1;
    private $APELLIDO2;

    /**
     * @return mixed
     */
    public function getAPELLIDO1()
    {
        return $this->APELLIDO1;
    }

    /**
     * @param mixed $APELLIDO1
     */
    public function setAPELLIDO1($APELLIDO1): void
    {
        $this->APELLIDO1 = $APELLIDO1;
    }

    /**
     * @return mixed
     */
    public function getAPELLIDO2()
    {
        return $this->APELLIDO2;
    }

    /**
     * @param mixed $APELLIDO2
     */
    public function setAPELLIDO2($APELLIDO2): void
    {
        $this->APELLIDO2 = $APELLIDO2;
    }

    public function getID() {
        return $this->ID;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function getCEDULA() {
        return $this->CEDULA;
    }

    public function setCEDULA($CEDULA) {
        $this->CEDULA = $CEDULA;
    }

    public function getFECHACADUC() {
        return $this->FECHACADUC;
    }

    public function setFECHACADUC($FECHACADUC) {
        $this->FECHACADUC = $FECHACADUC;
    }

    public function getNOMBRE() {
        return $this->NOMBRE;
    }

    public function setNOMBRE($NOMBRE) {
        $this->NOMBRE = $NOMBRE;
    }


}