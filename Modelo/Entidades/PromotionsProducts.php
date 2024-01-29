<?php

namespace Modelo\Entidades;

class PromotionsProducts
{
    private $id;
    private $promotion_id;

    private $product_id;

    private $Estade;

    /**
     * @return mixed
     */
    public function getEstade()
    {
        return $this->Estade;
    }

    /**
     * @param mixed $Estade
     */
    public function setEstade($Estade): void
    {
        $this->Estade = $Estade;
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
    public function getPromotionId()
    {
        return $this->promotion_id;
    }

    /**
     * @param mixed $promotion_id
     */
    public function setPromotionId($promotion_id): void
    {
        $this->promotion_id = $promotion_id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id): void
    {
        $this->product_id = $product_id;
    }



}