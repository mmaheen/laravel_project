<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;

class OrderController extends Controller
{
    //
    public function orderlist(){
        $order = new Orderdetail();
        $order = Order::all();
        return view ('orderlist')->with('order',$order);
    } 
}
