<?php

namespace Modelo\Entidades;

class Product_Categories
{
    private $idCategory;
    private $categoryName;
    private $status;

    // Métodos getter y setter para cada propiedad

    public function getIdCategory() {
        return $this->idCategory;
    }

    public function setIdCategory($idCategory) {
        $this->idCategory = $idCategory;
    }

    public function getCategoryName() {
        return $this->categoryName;
    }

    public function setCategoryName($categoryName) {
        $this->categoryName = $categoryName;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}