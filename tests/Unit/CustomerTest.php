<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Ramsey\Uuid\Uuid;

class CustomerTest extends TestCase
{
    use RefreshDatabase;
    public function testCustomerCreation()
    {
        $customer = Customer::factory()->create();

        $this->assertNotNull($customer->id);
    }
}
