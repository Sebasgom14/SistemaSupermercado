<?php

namespace Modelo\Entidades;

class Detail_OderPurchase
{
    private $id_DetailsOrderPurchase;
    private $id_OrdersPurchase;
    private $id_Products;
    private $amount;

    private $ProductName;
    /**
     * @return mixed
     */
    public function getIdDetailsOrderPurchase()
    {
        return $this->id_DetailsOrderPurchase;
    }

    /**
     * @param mixed $id_DetailsOrderPurchase
     */
    public function setIdDetailsOrderPurchase($id_DetailsOrderPurchase): void
    {
        $this->id_DetailsOrderPurchase = $id_DetailsOrderPurchase;
    }

    /**
     * @return mixed
     */
    public function getIdOrdersPurchase()
    {
        return $this->id_OrdersPurchase;
    }

    /**
     * @param mixed $id_OrdersPurchase
     */
    public function setIdOrdersPurchase($id_OrdersPurchase): void
    {
        $this->id_OrdersPurchase = $id_OrdersPurchase;
    }

    /**
     * @return mixed
     */
    public function getIdProducts()
    {
        return $this->id_Products;
    }

    /**
     * @param mixed $id_Products
     */
    public function setIdProducts($id_Products): void
    {
        $this->id_Products = $id_Products;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

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



}