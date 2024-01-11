<?php

namespace Modelo\Entidades;

class Sales_Detail
{
    private $idSaleDetail;
    private $idSale;
    private $idProduct;
    private $quantitySold;
    private $unitPrice;
    private $subtotal;
    private $status;

    private $ProductName;

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->ProductName;
    }

    /**
     * @param mixed $ProductName
     */
    public function setProductName($ProductName): void
    {
        $this->ProductName = $ProductName;
    }


    public function getIdSaleDetail() {
        return $this->idSaleDetail;
    }

    public function setIdSaleDetail($idSaleDetail) {
        $this->idSaleDetail = $idSaleDetail;
    }

    public function getIdSale() {
        return $this->idSale;
    }

    public function setIdSale($idSale) {
        $this->idSale = $idSale;
    }

    public function getIdProduct() {
        return $this->idProduct;
    }

    public function setIdProduct($idProduct) {
        $this->idProduct = $idProduct;
    }

    public function getQuantitySold() {
        return $this->quantitySold;
    }

    public function setQuantitySold($quantitySold) {
        $this->quantitySold = $quantitySold;
    }

    public function getUnitPrice() {
        return $this->unitPrice;
    }

    public function setUnitPrice($unitPrice) {
        $this->unitPrice = $unitPrice;
    }

    public function getSubtotal() {
        return $this->subtotal;
    }

    public function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}