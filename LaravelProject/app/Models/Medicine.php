<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Medicine extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function cart(){
        return $this->belongsTo(Cart::class,'medicine_id');
    }
}
