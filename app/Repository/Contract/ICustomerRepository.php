<?php

namespace DDD\Repository\Contract;

use DDD\Domain\Customer;

/**
 * Customer Repository Contract
 * 
 * @package DDD\Repository\Contract
 * @author  Gembit <gembit.soultan@gmail.com>
 */
interface ICustomerRepository {
    /**
     * Get All customer data
     * 
     * @return array(\DDD\Domain\Customer)
     */
    public function getAllCustomer();

    /**
     * Get Customer By ID
     * 
     * @param int $id an integer $id
     * 
     * @return Customer
     */
    public function getCustomerById(int $id);

    /**
     * Insert customer to database
     * 
     * @param object $customer \DDD\Domain\Customer
     * 
     * @return int $id 
     */
    public function insert(Customer $customer);

    /**
     * Update customer to database
     * 
     * @param object $customer \DDD\Domain\Customer
     * 
     * @return int $affectedRow
     */
    public function update(Customer $customer);

    /**
     * Delete a customer from database
     * 
     * @param int $id id of the customer
     * 
     * @return int $affectedRow
     */
    public function deleteCustomerById(int $id);
}