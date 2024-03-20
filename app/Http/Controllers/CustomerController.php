<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getStatsByCustomerId($customerId)
    {
        try {
            $customer = Customer::findOrFail($customerId);
            // Calculate statistical information about the customer (example)
            $stats = [
                'total_invoices' => $customer->invoices->count(),
                'total_amount_paid' => $customer->invoices->where('is_paid', true)->sum('amount'),
            ];
            return response()->json($stats);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Customer not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }


    public function getById($customerId)
    {
        try {
            $customer = Customer::findOrFail($customerId);
            return response()->json($customer);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Customer not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

}
