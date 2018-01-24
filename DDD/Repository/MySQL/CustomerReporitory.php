<?php

namespace DDD\Repository\MySQL;

use DDD\Domain\Customer;
use DDD\Helpers\DataMapper;
use Illuminate\Support\Facades\DB;
use DDD\Repository\Contract\ICustomerRepository;

/**
 * MySQL Implementation class of Customer Repository
 * 
 * @package DDD\Repository\MySQL
 * @author  Gembit <gembit.soultan@gmail.com>
 */
class CustomerRepository implements ICustomerRepository {
    private $fields = "id as customerId, firstName, lastName, birthDate, address";
    private $table = "Customer";
    private $sql =  "Select " . $fields . " from " . $table;

    /**
     * Get All customer data
     * 
     * @return array(\DDD\Domain\Customer)
     */
    public function getAllCustomer() 
    {
        return DataMapper::customer(DB::select($sql));
    }

    /**
     * Get Customer By ID
     * 
     * @param int $id an integer $id
     * 
     * @return Customer
     */
    public function getCustomerById(int $id) 
    {
        $sql = $this->sql . ' where id=?';
        return DataMapper::customer(DB::select($sql, [$id]));
    }

    /**
     * Insert customer to database
     * 
     * @param object $customer \DDD\Domain\Customer
     * 
     * @return int $id 
     */
    public function insert(Customer $customer) 
    {
        $sql = "insert into " . $table . " (firstName, lastName, birthDate, address) values (?,?,?,?)";
        $params = [
            $customer->getFirstName(), 
            $customer->getLastName(), 
            $customer->getBirthDate(), 
            $customer->getAddress()
        ];
        return DB::insert($sql, $params);
    }

    /**
     * Update customer to database
     * 
     * @param object $customer \DDD\Domain\Customer
     * 
     * @return int $affectedRow
     */
    public function update(Customer $customer) 
    {
        $sql = "update " . $table . " set firstName=?, lastName=?, birthDate=?, address=? where id=?";

        $params=[
            $customer->getFirstName(),
            $customer->getLastName(),
            $customer->getBirthDate(),
            $customer->getAddress()
        ];
        return DB::update($sql, $params);
    }

    /**
     * delete a customer from database
     * 
     * @param int $id
     * 
     * @return int $affectedRow
     */
    public function deleteCustomerById(int $id) {
        $sql = "delete " . $table . " where id=?";
        return DB::delete($sql, [$id]);
    }
}