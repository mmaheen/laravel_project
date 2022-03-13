<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;
use App\Models\Customer;

class Order extends Model
{
    use HasFactory;

    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
