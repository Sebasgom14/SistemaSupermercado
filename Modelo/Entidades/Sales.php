<?php

namespace Modelo\Entidades;

class Sales
{
    private $idSale;
    private $idCustomer;
    private $saleDate;
    private $totalSale;
    private $subtotal;
    private $iva;
    private $status;

    private $salesDetails;

    /**
     * @return mixed
     */
    public function getSalesDetails()
    {
        return $this->salesDetails;
    }

    /**
     * @param mixed $salesDetails
     */
    public function setSalesDetails($salesDetails): void
    {
        $this->salesDetails = $salesDetails;
    } // Nuevo atributo para almacenar los detalles de la venta

    // Métodos getter y setter para cada propiedad





    public function getIdSale() {
        return $this->idSale;
    }

    public function setIdSale($idSale) {
        $this->idSale = $idSale;
    }

    public function getIdCustomer() {
        return $this->idCustomer;
    }

    public function setIdCustomer($idCustomer) {
        $this->idCustomer = $idCustomer;
    }

    public function getSaleDate() {
        return $this->saleDate;
    }

    public function setSaleDate($saleDate) {
        $this->saleDate = $saleDate;
    }

    public function getTotalSale() {
        return $this->totalSale;
    }

    public function setTotalSale($totalSale) {
        $this->totalSale = $totalSale;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * @param mixed $subtotal
     */
    public function setSubtotal($subtotal): void
    {
        $this->subtotal = $subtotal;
    }

    /**
     * @return mixed
     */
    public function getIva()
    {
        return $this->iva;
    }

    /**
     * @param mixed $iva
     */
    public function setIva($iva): void
    {
        $this->iva = $iva;
    }




}