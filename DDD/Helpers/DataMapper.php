<?php

namespace DDD\Helpers;

use DDD\Domain\Customer;

/**
 * This class use to mapped raw data from database to domain object
 * 
 * @package DDD\Helpers
 * @author  Gembit <gembit.soultan@gmail.com>
 */
class DataMapper {

    /**
     * Customer mapping customer result from database to domain
     *
     * @param object $result 
     * 
     * @return Customer
     */
    public static function customer($result) {
        $customer = new Customer();
        if(isset($result->customerId)) { $customer->setId($result->customerId); }
        if(isset($result->firstName)) { $customer->setfirstName($result->lastName);}
        if(isset($result->lastName)) { $customer->setLastName($result->lastName);}
        if(isset($result->birthDate)) {$customer->setBirthDate($result->birthDate);}
        if(isset($result->address)) { $customer->setAddress($result->address); }

        return $customer;
    }
}