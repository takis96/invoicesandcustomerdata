<?php

namespace Tests\Unit\Controllers;

use Tests\TestCase;
use App\Models\Invoice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class InvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function testInvoiceCreation()
    {
        $invoice = Invoice::factory()->create();

        $this->assertNotNull($invoice->invoice_id);
    }

    // public function testUpdateIsPaidStatus()
    // {
    //     // Create a mock invoice
    //     $invoice = Invoice::factory()->create();

    //     // Simulate a request to the controller endpoint to update the is_paid status
    //     $response = $this->put('/invoices/' . $invoice->invoice_id . '/status', ['is_paid' => true]);

    //     // Assert that the response has a successful status code
    //     $response->assertStatus(200);

    //     // Reload the invoice from the database
    //     $updatedInvoice = Invoice::where('invoice_id', $invoice->invoice_id)->first();

    //     // Assert that the is_paid status was updated correctly
    //     $this->assertTrue($updatedInvoice->is_paid);
    }

}
