<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Invoices Endpoints
Route::get('/invoices/{customer_id}', [InvoiceController::class, 'getByCustomerId']);
Route::get('/invoices/{invoice_id}', [InvoiceController::class, 'getById']);
Route::put('/invoices/{invoice_id}/status', [InvoiceController::class, 'updateStatus']);
Route::get('/invoices/monthly-revenue', [InvoiceController::class, 'generateMonthlyRevenueReport']);

// Customers Endpoints
Route::get('/customers/{customer_id}', [CustomerController::class, 'getById']);
Route::get('/customers/{customer_id}/stats', [CustomerController::class, 'getStatsByCustomerId']);
