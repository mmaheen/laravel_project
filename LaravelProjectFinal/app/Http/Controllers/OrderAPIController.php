<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;

class OrderAPIController extends Controller
{
    //
    public function list(){
        $order = Order::all();
        return $order;
    }

    public function listdetails(){
        $order = Orderdetail::all();
        return $order;
    }
}
