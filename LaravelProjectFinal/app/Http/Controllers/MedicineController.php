<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Order;
use App\Models\Orderdetail;

class MedicineController extends Controller
{
    //
    public function medicine(){
        return view ('medicine.addmedicine');
    }

    public function addmedicine(Request $req)
    {
        $req->validate(
            [
                'name' => 'required|unique:medicines,name',
                'unit_price' => 'required',
                'stock' => 'required',
                'description' =>'required',
                'image' => 'required|mimes:jpg,png'
            ]
        );
        $filename = $req->name.'.'.$req->file('image')->getClientOriginalExtension();
        $req->file('image')->storeAs('public/MedicineImage',$filename);

        $m = new Medicine();
        $m->name = $req->name;
        $m->unit_price = $req->unit_price;
        $m->stock = $req->stock;
        $m->description = $req->description;
        $m->image = "storage/MedicineImage/".$filename;
        $m->save();

        if($m){
            session()->flash('msgadded','Medicine Added');
            return redirect()->route('medicine.list');

        }
        
        
    }

    

    public function listmedicine(){
        /*if(!session()->has('username')){
            return redirect()->route('login');
        }*/
        $medicines = Medicine::all();
        return view ('medicine.medicinelist')->with('medicines',$medicines);
    }

    public function editmedicine(Request $req){
        $m = Medicine::where('id',$req->id)->first();
        return view('medicine.updatemedicine')->with('m',$m);
    }

    public function updatemedicine(Request $req){
        $req->validate(
            [
                'name' => 'required',
                'unit_price' => 'required',
                'stock' => 'required',
                'description' =>'required'
            ]
        );

        $m = Medicine::where('id',$req->id)->first();
        $m->name = $req->name;
        $m->unit_price = $req->unit_price;
        $m->stock = $req->stock;
        $m->description = $req->description;
        $m->save();
        
        if($m){
            session()->flash('msgup','Medicine Updated');
            return redirect()->route('medicine.list')->with ('m',$m);
        }
        
    }

    public function delete(Request $req){
        $m = Medicine::where('id',$req->id)->delete();
        if($m){
            session()->flash('msg','Succesfully Deleted');
            return redirect()->route('medicine.list');
            
        }



    }

    // public function medicinedetails(Request $req){
    //     $medicine = Medicine::where('id',$req->id)->first();
    //     return view ('medicine.medicinedetails')->with('medicine',$medicine);
    // }

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
        session()->flash('cartadd','Product Added to cart');
        //return session()->get('cart');
        return redirect()->route('home');
    }

    public function emptycart(){
        session()->forget('cart');
        return redirect()->route('medicine.mycart');
    }

    public function mycart(){
        $cart = json_decode(session()->get('cart'));
        return view ('medicine.cart')->with('cart',$cart);
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
