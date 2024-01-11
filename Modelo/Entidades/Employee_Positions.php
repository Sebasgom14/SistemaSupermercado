<?php

namespace Modelo\Entidades;

class Employee_Positions
{
    private $idPosition;
    private $positionName;
    private $description;
    private $status;

    // Métodos getter y setter para cada propiedad

    public function getIdPosition() {
        return $this->idPosition;
    }

    public function setIdPosition($idPosition) {
        $this->idPosition = $idPosition;
    }

    public function getPositionName() {
        return $this->positionName;
    }

    public function setPositionName($positionName) {
        $this->positionName = $positionName;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}