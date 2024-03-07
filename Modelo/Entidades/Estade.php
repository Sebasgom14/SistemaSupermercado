<?php

namespace Modelo\Entidades;

class Estade
{
    private $id_Estade;

    private $nameEstade;
    private $estade;

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
    public function getNameEstade()
    {
        return $this->nameEstade;
    }

    /**
     * @param mixed $nameEstade
     */
    public function setNameEstade($nameEstade): void
    {
        $this->nameEstade = $nameEstade;
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