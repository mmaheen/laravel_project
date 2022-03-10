<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;

class Order extends Model
{
    use HasFactory;

    public function medicine(){
        return $this->belongsTo(Medicine::class);
    }
}
