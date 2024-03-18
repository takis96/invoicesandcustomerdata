<?php

namespace Database\Factories;

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->uuid,
        'country' => $faker->country,
        'currency' => $faker->currencyCode,
    ];
});

