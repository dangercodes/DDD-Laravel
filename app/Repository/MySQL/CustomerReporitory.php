<?php

namespace DDD\Repository\MySQL;

use DDD\Domain\Customer;
use DDD\Helpers\DataMapper;
use Illuminate\Support\Facades\DB;
use \DDD\Repository\Contract\ICustomerRepository;


/**
 * MySQL Implementation class of Customer Repository
 * 
 * @package DDD\Repository\MySQL
 * @author  Gembit <gembit.soultan@gmail.com>
 */
class CustomerRepository implements ICustomerRepository {
    private $fields = "id as customerId, firstName, lastName, birthDate, address";
    private $table = "customers";
    

    /**
     * Get All customer data
     * 
     * @return array(\DDD\Domain\Customer)
     */
    public function getAllCustomer() 
    {
        $sql = 'select ' . $this->fields . ' from ' . $this->table ;
        return DataMapper::customers(DB::select($sql));
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
        $sql = 'select ' . $this->fields . ' from ' . $this->table . ' where id=?';
        $customers = DataMapper::customers(DB::select($sql, [$id]));
        return $customers[0];
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
        $sql = "insert into " . $this->table . " (firstName, lastName, birthDate, address) values (?,?,?,?)";
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
        $sql = "update " . $this->table . " set firstName=?, lastName=?, birthDate=?, address=? where id=?";

        $params=[
            $customer->getFirstName(),
            $customer->getLastName(),
            $customer->getBirthDate(),
            $customer->getAddress(),
            $customer->getId()
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
        $sql = "delete " . $this->table . " where id=?";
        return DB::delete($sql, [$id]);
    }
}