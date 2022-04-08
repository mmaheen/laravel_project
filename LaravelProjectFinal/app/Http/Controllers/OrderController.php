<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function orderlist(){
        $order = new Order();
        $order = Order::all();
        return view ('orderlist')->with('order',$order);
    } 
}
