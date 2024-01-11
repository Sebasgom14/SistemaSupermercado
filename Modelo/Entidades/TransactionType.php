<?php

namespace Modelo\Entidades;

class TransactionType
{
    private $id_TransactionType;
    private $TransactionTypeName;
    private $Estade;

    /**
     * @return mixed
     */
    public function getIdTransactionType()
    {
        return $this->id_TransactionType;
    }

    /**
     * @param mixed $id_TransactionType
     */
    public function setIdTransactionType($id_TransactionType): void
    {
        $this->id_TransactionType = $id_TransactionType;
    }

    /**
     * @return mixed
     */
    public function getTransactionTypeName()
    {
        return $this->TransactionTypeName;
    }

    /**
     * @param mixed $TransactionTypeName
     */
    public function setTransactionTypeName($TransactionTypeName): void
    {
        $this->TransactionTypeName = $TransactionTypeName;
    }

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




}