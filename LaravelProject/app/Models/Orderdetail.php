<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;
use App\Models\Order;

class Orderdetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function medicine(){
        return $this->hasMany(Medicine::class,'medicine_id');
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
