<?php

namespace Modelo\Entidades;

class Promotions
{
    private $id;
    private $name;
    private $typePromotions;
    private $discount;
    private $minimumQuantity;

    private $maxQuabtity;
    private $startDate;
    private $endDate;
    private $estade;

    /**
     * @return mixed
     */
    public function getMaxQuabtity()
    {
        return $this->maxQuabtity;
    }

    /**
     * @param mixed $maxQuabtity
     */
    public function setMaxQuabtity($maxQuabtity): void
    {
        $this->maxQuabtity = $maxQuabtity;
    }





    /**
     * @return mixed
     */
    public function getEstade()
    {
        return $this->estade;
    }

    /**
     * @param mixed $estade
     */
    public function setEstade($estade): void
    {
        $this->estade = $estade;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getTypePromotions()
    {
        return $this->typePromotions;
    }

    /**
     * @param mixed $typePromotions
     */
    public function setTypePromotions($typePromotions): void
    {
        $this->typePromotions = $typePromotions;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param mixed $discount
     */
    public function setDiscount($discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return mixed
     */
    public function getMinimumQuantity()
    {
        return $this->minimumQuantity;
    }

    /**
     * @param mixed $minimumQuantity
     */
    public function setMinimumQuantity($minimumQuantity): void
    {
        $this->minimumQuantity = $minimumQuantity;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate): void
    {
        $this->endDate = $endDate;
    }

}