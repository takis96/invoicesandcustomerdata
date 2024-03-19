<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'invoice_id' => Str::uuid(),
            'customer_id' => Str::uuid(),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'invoice_date' => $this->faker->date(),
            'is_paid' => $this->faker->boolean,
        ];
    }
}
