<?php

namespace Modelo\Entidades;

class Costumers
{
    private $idCustomer;
    private $identification;
    private $firstName;
    private $lastName;
    private $address;
    private $phoneNumber;
    private $email;
    private $status;
    public function getIdCustomer() {
        return $this->idCustomer;
    }

    public function setIdCustomer($idCustomer) {
        $this->idCustomer = $idCustomer;
    }

    public function getIdentification() {
        return $this->identification;
    }

    public function setIdentification($identification) {
        $this->identification = $identification;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
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