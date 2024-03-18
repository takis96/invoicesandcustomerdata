<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed customers
        $customersData = array_map('str_getcsv', file(storage_path('app/customers.csv')));

        foreach ($customersData as $customer) {
            Customer::create([
                'customer_id' => $customer[0],
                'country' => $customer[1],
                'currency' => $customer[2],
            ]);
        }

        $file = fopen(storage_path('app/invoices.csv'), 'r');
        if ($file) {
            fgetcsv($file); // Skip header row
            while (($invoice = fgetcsv($file)) !== false) {

                Invoice::create([
                    'invoice_id' => $invoice[0],
                    'customer_id' => $invoice[1],
                    'amount' => $invoice[2],
                    'invoice_date' => $invoice[3],
                    'is_paid' => $invoice[4],
                ]);
            }
            fclose($file);
        } else {
            // Handle file opening error
            dump('Error opening file.');
        }
    }
}
