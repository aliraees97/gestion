<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'package_id',
        'services',
        'payment_id',
        'total',
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
