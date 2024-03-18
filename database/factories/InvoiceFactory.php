<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Customer;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->uuid,
        'amount' => $faker->randomFloat(2, 10, 1000),
        'invoice_date' => $faker->date(),
        'is_paid' => $faker->boolean,
    ];
});

