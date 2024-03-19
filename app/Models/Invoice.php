<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $primaryKey = 'invoice_id';
    protected $fillable = ['customer_id', 'amount', 'invoice_date', 'is_paid'];
    protected $dates = ['invoice_date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}

