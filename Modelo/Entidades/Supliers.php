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

    private $image_Path;

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return $this->image_Path;
    }

    /**
     * @param mixed $image_Path
     */
    public function setImagePath($image_Path): void
    {
        $this->image_Path = $image_Path;
    }



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