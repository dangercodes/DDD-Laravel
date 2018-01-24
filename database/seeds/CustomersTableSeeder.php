<?php

use factory;
use DDD\Domain\Customer;
use Illuminate\Database\Seeder;
use DDD\Repository\Contract\ICustomerRepository;

class CustomersTableSeeder extends Seeder
{

    private $customerRepository;

    public function __constructor(ICustomerRepository $customerRepository) {
        $this->$customerRepository = $customerRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class, 50)->create()->each(function ($u) { $customerRepository->save(factory(Customer::class)->make()); });
    }
}
