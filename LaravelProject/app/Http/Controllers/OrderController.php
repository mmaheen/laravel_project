<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Medicine;
use App\Models\Customer;

class OrderController extends Controller
{
    //
    public function orderlist(){
        $order = new Order();
        $order = Order::all();
        return view ('orderlist')->with('order',$order);
    }

    public function ordermedicine(Request $req){
        $req->validate([
            'unit'=>'required|numeric'
        ]);
        $medicine = new Medicine();
        $medicine = Medicine::where('id',$req->id)->first();
        $medicine->stock = $medicine->stock-$req->unit;
        $medicine->save();

        $order = new Order();
        $order->medicine_id = $medicine->id;
        $order->patient_id = 3;
        $order->deliveryman_id = 1;
        $order->order_quantity = $req->unit;
        $order->total_price = $medicine->unit_price*$req->unit;
        $order->save();
        return view('ordermedicine')->with('medicine',$medicine)->with('order',$order);
    }
}
