<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Medicine;

class PageController extends Controller
{
    //
    public function home(){
        $medicines = Medicine::all();
        //return view ('medicinelist');
        return view ('home')->with('medicines',$medicines);
    }

    public function login(){
        return view ('login');
    }

    public function loginsubmit(Request $req){
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $ad = Admin::where('username', $req->username)-> where('password',md5($req->password))->first();
        if ($ad) {
            session()->put('username',$ad->username);
            session()->flash('msglogin', 'Login Success');
            return redirect()->route('medicine.list')->with('ad',$ad);
        }
        else return 'login Failed';
    }

    public function registration(){
        return view ('registration');
    }
    public function registersubmit(Request $req){
        $req->validate(
            [
                'name' => 'required|regex:/^[A-Z a-z.]+$/',
                'username' => 'required|min:5|max:20|unique:admins,username',
                'email' => 'required|email|unique:admins|email',
                'phone' => 'required|min:11|regex:/^01[5-9]{1}[0-9]{8}$/',
                'password' => 'required|min:3',
                'confirm_password' => 'required|same:password',
            ]
        );

        $ad = new Admin();
        $ad->name = $req->name;
        $ad->username = $req->username;
        $ad->email = $req->email;
        $ad->phone = $req->phone;
        $ad->password = md5($req->password);
        $ad->save();
        session()->flash('registration','Suucessfully Registered');
        return  redirect()->route('login');
    }

    public function adminprofile($id){
        $ad = Admin::where('id',$id);
        return view ('adminprofile')->with('ad',$ad);
    }

    public function logout(){
        session()->flush();
        return redirect()->route('login');
    }

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
        $order->patient_id = 1;
        $order->deliveryman_id = 1;
        $order->order_quantity = $req->unit;
        $order->total_price = $medicine->unit_price*$req->unit;
        $order->save();
        return view('ordermedicine')->with('medicine',$medicine)->with('order',$order);
    }
}

