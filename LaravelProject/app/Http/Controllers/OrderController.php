<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Medicine;
use App\Models\Customer;
use App\Models\Cart;

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
        $customer = Customer::where('username',session()->get('customer'))->first();
        //$customer->save();

        $medicine = new Medicine();
        $medicine = Medicine::where('id',$req->id)->first();
        $medicine->stock = $medicine->stock-$req->unit;
        $medicine->save();

        $order = new Order();
        $order->medicine_id = $medicine->id;
        $order->patient_id = $customer->id;
        $order->deliveryman_id = 1;
        $order->order_quantity = $req->unit;
        $order->total_price = $medicine->unit_price*$req->unit;
        $order->save();
        return view('ordermedicine')->with('medicine',$medicine)->with('order',$order)->with('customer',$customer);
    }

    public function cart(Request $req){
        /*$req->validate([
            'unit'=>'required|numeric'
        ]);

        

        $medicine = new Medicine();
        $medicine = Medicine::where('id',$req->id)->first();
        $medicine->stock = $medicine->stock-$req->unit;
        $medicine->save();

        $cart = new Cart();
        $cart->medicine_id = $medicine->id;
        $cart->customer_id = $customer->id;
        $cart->medicine_quantity = $req->unit;
        $cart->unit_price = $medicine->unit_price;
        $cart->total_price = $medicine->unit_price*$req->unit;
        $cart->save();*/
        $customer = Customer::where('username',session()->get('customer'))->first();
        //$cart = Cart::where('id',1)->first();
        return $customer->cart->medicine_id;


        return view('cart')->with('medicine',$medicine)->with('cart',$cart);

    }
}
