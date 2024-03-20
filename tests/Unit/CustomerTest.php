<?php

namespace Tests\Unit\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Customer;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function testCustomerCanBeCreated()
    {
        // Ensure there are no customers in the database
        $this->assertEquals(0, Customer::count());

        // Create a new customer
        $customer = Customer::factory()->create();

        // Check if the customer was created successfully
        $this->assertEquals(1, Customer::count());

        // Verify that the customer has a non-null customer_id
        $this->assertNotNull($customer->customer_id);

        // Optionally, you can perform more assertions on the customer attributes
        $this->assertNotEmpty($customer->country);
        $this->assertNotEmpty($customer->currency);
    }
}
