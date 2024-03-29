<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    public function getByCustomerId(Request $request, $customerId)
    {
        try {
            // Validation
            $request->validate([
                'currency' => 'string',
                'start_date' => 'date',
                'end_date' => 'date',
            ]);

            // Build query based on request parameters
            $query = Invoice::where('customer_id', $customerId);
            Log::info($query->toSql(), $query->getBindings());

            if ($request->has('currency')) {
                $query->where('currency', $request->currency);
            }

            if ($request->has('start_date')) {
                $query->whereDate('invoice_date', '>=', $request->start_date);
            }

            if ($request->has('end_date')) {
                $query->whereDate('invoice_date', '<=', $request->end_date);
            }

            $invoices = $query->get();

            return response()->json($invoices);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Invoice not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function updateStatus($invoiceId)
    {
        try {
            $invoice = Invoice::where('invoice_id', $invoiceId)->first();
            // Update invoice status
                $updated = $invoice->update(['is_paid' => true]);
            if ($updated) {
                return response()->json(['success' => 'Status updated'], 200);
            } else {

                return response()->json(['error' => 'Failed to update invoice'], 500);
            }
            return response()->json($invoiceId);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Invoice not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function getById($invoiceId)
    {
        try {
            $invoice = Invoice::where('invoice_id', $invoiceId)->first();
            return response()->json($invoice);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Invoice not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }


public function generateMonthlyRevenueReport(Request $request)
{
    // Validation
    $validator = Validator::make($request->all(), [
        'year' => 'required|integer',
        'month' => 'required|integer|between:1,12',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    try {
        $year = $request->year;
        $month = $request->month;

        // Calculate monthly revenue
        $revenue = Invoice::whereYear('invoice_date', $year)
            ->whereMonth('invoice_date', $month)
            ->sum('amount');

        return response()->json(['revenue' => $revenue]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}

}
