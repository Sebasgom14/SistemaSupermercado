<?php

namespace Modelo\Entidades;

class Inventory_Transactions
{
    private $idTransaction;
    private $transactionType;
    private $idProduct;
    private $quantity;
    private $transactionDate;
    private $status;

    // Métodos getter y setter para cada propiedad

    public function getIdTransaction() {
        return $this->idTransaction;
    }

    public function setIdTransaction($idTransaction) {
        $this->idTransaction = $idTransaction;
    }

    public function getTransactionType() {
        return $this->transactionType;
    }

    public function setTransactionType($transactionType) {
        $this->transactionType = $transactionType;
    }

    public function getIdProduct() {
        return $this->idProduct;
    }

    public function setIdProduct($idProduct) {
        $this->idProduct = $idProduct;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getTransactionDate() {
        return $this->transactionDate;
    }

    public function setTransactionDate($transactionDate) {
        $this->transactionDate = $transactionDate;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}