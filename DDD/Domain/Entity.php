<?php

namespace DDD\Domain;

/**
 * Base Entity
 * 
 * @package Hino\Domain
 * 
 * @author Gembit <gembit.soultan@gmail.com>
 */
class Entity
{

    private $id;

    /**
     * Get the value of id
     * 
     * @return int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id id of the customer
     * 
     * @return self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}

