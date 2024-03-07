<?php

namespace Modelo\Entidades;

class OrderPurchase
{
    private $id_OrderPurchase;
    private $id_Suppliers;
    private $orderDate;
    private $id_Estade;
    private $pdf_path;

    private $orderDetails;
    /**
     * @return mixed
     */
    public function getIdOrderPurchase()
    {
        return $this->id_OrderPurchase;
    }

    /**
     * @param mixed $id_OrderPurchase
     */
    public function setIdOrderPurchase($id_OrderPurchase): void
    {
        $this->id_OrderPurchase = $id_OrderPurchase;
    }

    /**
     * @return mixed
     */
    public function getIdSuppliers()
    {
        return $this->id_Suppliers;
    }

    /**
     * @param mixed $id_Suppliers
     */
    public function setIdSuppliers($id_Suppliers): void
    {
        $this->id_Suppliers = $id_Suppliers;
    }

    /**
     * @return mixed
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * @param mixed $orderDate
     */
    public function setOrderDate($orderDate): void
    {
        $this->orderDate = $orderDate;
    }

    /**
     * @return mixed
     */
    public function getIdEstade()
    {
        return $this->id_Estade;
    }

    /**
     * @param mixed $id_Estade
     */
    public function setIdEstade($id_Estade): void
    {
        $this->id_Estade = $id_Estade;
    }

    /**
     * @return mixed
     */
    public function getPdfPath()
    {
        return $this->pdf_path;
    }

    /**
     * @param mixed $pdf_path
     */
    public function setPdfPath($pdf_path): void
    {
        $this->pdf_path = $pdf_path;
    }

    /**
     * @return mixed
     */
    public function getOrderDetails()
    {
        return $this->orderDetails;
    }

    /**
     * @param mixed $orderDetails
     */
    public function setOrderDetails($orderDetails): void
    {
        $this->orderDetails = $orderDetails;
    }



    
}