<?php

use DDD\Domain\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'firstName' => $faker->name,
        'lastName' => $faker->name,
        'birthDate' => $faker->date, // secret
        'address' => $faker->address,
    ];
});