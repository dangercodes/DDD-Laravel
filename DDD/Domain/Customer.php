<?php

namespace DDD\Domain;

/**
 * Customer class
 */
class Customer extends Entity {
    private $firstName;
    private $lastName;
    private $birthDate;
    private $address;

    /**
     * Get the value of firstName
     * 
     * @return string
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @param string $firstName first name of the customer
     * 
     * @return self
     */ 
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     * 
     * @return string
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @param string $lastName last name of the customer
     * 
     * @return self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of birthDate
     * 
     * @return date
     */ 
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set the value of birthDate
     *
     * @return self
     */ 
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get the value of address
     * 
     * @return string
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @param string $address address of the customer
     * 
     * @return self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of age
     * 
     * @return null or int
     */ 
    public function getAge() 
    {
        if(!isset($this->birthOfDate)) { return; }
        $dob = new DateTime($this->birthDate);
        $now = new DateTime();

        $difference = $now->diff($dob);

        return $difference->y;
    }
}