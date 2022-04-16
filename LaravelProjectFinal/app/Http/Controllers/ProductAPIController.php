<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class ProductAPIController extends Controller
{
    //
    public function list(){
        $medicines = Medicine::all();
        return response()->json($medicines);
    }

    public function add(Request $req)
    {
        // $filename = $req->name.'.'.$req->file('image')->getClientOriginalExtension();
        // $req->file('image')->storeAs('public/MedicineImage',$filename);

        $m = new Medicine();
        $m->name = $req->name;
        $m->unit_price = $req->unit_price;
        $m->stock = $req->stock;
        $m->description = $req->description;
        $m->image = "storage/MedicineImage/";
        $m->save();    
        return "Added Name:$m->name" ;
    }

    public function edit(Request $req){
        $m = Medicine::where('id',$req->id)->first();
        $m->name = $req->name;
        $m->unit_price = $req->unit_price;
        $m->stock = $req->stock;
        $m->description = $req->description;
        $m->save();
        
        if($m){
            return "updated";
        }
        
    }

    public function delete(Request $req){
        $m = Medicine::where('id',$req->id)->delete();
        if($m){
            return "Deleted";         
        }
    }

    public function addtocart(Request $req){
        $id = $req->id;
        $medicine = Medicine::where('id',$id)->first();
        $cart = [];
        if(session()->has('cart')){
            $cart = json_decode(session()->get('cart'),true);
        }
        $product = array('id' => $id, 
        'quantity' => 1, 
        'name' => $medicine->name, 
        'price' => $medicine->unit_price,
        'image' => $medicine->image
        );
        $cart[] = (object)($product);
        $jsonCart = json_encode($cart);
        session()->put('cart',$jsonCart);
        //session()->flash('cartadd','Product Added to cart');
        //return session()->get('cart');
        return "Product id $id added to cart";
    }

    public function checkout(Request $req){
        $products = json_decode(session()->get('cart'));
        $customer = session()->get('customer');

        $order = new Order();
        $order->patient_username = $customer;
        $order->status = "Ordered";
        $order->price = $req->total_price;
        $order->save();

        foreach($products as $p)
        {
            $o_d = new Orderdetail;
            $o_d->order_id = $order->id;
            $o_d->medicine_id = $p->id;
            $o_d->quantity = $p->quantity;
            $o_d->unit_price = $p->price;
            $o_d->save();

            $medicine = Medicine::where('id',$p->id)->first();
            $medicine->stock = $medicine->stock-1;
            $medicine->save();

        }

        session()->forget('cart');
        return "Order Placed";
    }
}
