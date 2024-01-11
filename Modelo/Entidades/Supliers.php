<?php

namespace Modelo\Entidades;

class Supliers
{
    private $idSupplier;
    private $companyName;
    private $contactPerson;
    private $phoneNumber;
    private $email;
    private $status;

    // Métodos getter y setter para cada propiedad

    public function getIdSupplier() {
        return $this->idSupplier;
    }

    public function setIdSupplier($idSupplier) {
        $this->idSupplier = $idSupplier;
    }

    public function getCompanyName() {
        return $this->companyName;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
    }

    public function getContactPerson() {
        return $this->contactPerson;
    }

    public function setContactPerson($contactPerson) {
        $this->contactPerson = $contactPerson;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}