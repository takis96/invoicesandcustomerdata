<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasUuids;
    use HasFactory;
    protected $primaryKey = 'customer_id';
    protected $fillable = ['customer_id', 'country', 'currency'];


    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'customer_id');
    }

}

