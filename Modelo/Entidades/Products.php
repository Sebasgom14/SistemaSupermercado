<?php

namespace Modelo\Entidades;

class Products
{
    private $idProduct;
    private $name;
    private $description;
    private $price;
    private $category;
    private $supplier;
    private $status;

    private $ImagePath;

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return $this->ImagePath;
    }

    /**
     * @param mixed $ImagePath
     */
    public function setImagePath($ImagePath): void
    {
        $this->ImagePath = $ImagePath;
    }

    // Métodos getter y setter para cada propiedad

    public function getIdProduct() {
        return $this->idProduct;
    }

    public function setIdProduct($idProduct) {
        $this->idProduct = $idProduct;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getSupplier() {
        return $this->supplier;
    }

    public function setSupplier($supplier) {
        $this->supplier = $supplier;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}