<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;
use App\Models\Customer;
use App\Models\Orderdetail;

class Order extends Model
{
    use HasFactory;

    public function orderdetails(){
        return $this->hasMany(Orderdetail::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'patient_username','username');
    }
}
