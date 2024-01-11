<?php

namespace Modelo\Entidades;

class Inventory
{
    private $idInventory;
    private $idProduct;
    private $quantityInStock;
    private $lastReplenishmentDate;
    private $status;

    // Métodos getter y setter para cada propiedad

    public function getIdInventory() {
        return $this->idInventory;
    }

    public function setIdInventory($idInventory) {
        $this->idInventory = $idInventory;
    }

    public function getIdProduct() {
        return $this->idProduct;
    }

    public function setIdProduct($idProduct) {
        $this->idProduct = $idProduct;
    }

    public function getQuantityInStock() {
        return $this->quantityInStock;
    }

    public function setQuantityInStock($quantityInStock) {
        $this->quantityInStock = $quantityInStock;
    }

    public function getLastReplenishmentDate() {
        return $this->lastReplenishmentDate;
    }

    public function setLastReplenishmentDate($lastReplenishmentDate) {
        $this->lastReplenishmentDate = $lastReplenishmentDate;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}