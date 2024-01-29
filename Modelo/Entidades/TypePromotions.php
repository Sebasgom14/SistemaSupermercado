<?php

namespace Modelo\Entidades;

class TypePromotions
{
    private $id;

    private $name;

    private $estade;

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


}