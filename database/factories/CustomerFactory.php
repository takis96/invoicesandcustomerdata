<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'customer_id' => Str::uuid(),
            'country' => $this->faker->country,
            'currency' => $this->faker->currencyCode,
        ];
    }
}
