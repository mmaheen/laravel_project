<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;

class AdminController extends Controller
{
    //
    public function registration(){
        return view ('admin.registration');
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
                'image' => 'required'
            ]
        );
        $filename = $req->username.'.'.$req->file('image')->getClientOriginalExtension();
        $req->file('image')->storeAs('public/AdminImage',$filename);

        $ad = new Admin();
        $ad->name = $req->name;
        $ad->username = $req->username;
        $ad->email = $req->email;
        $ad->phone = $req->phone;
        $ad->password = md5($req->password);
        $ad->image = "storage/AdminImage/".$filename;
        $ad->save();
        session()->flash('registration','Suucessfully Registered');
        return  redirect()->route('medicine.list');
    }

    public function loginsubmit(Request $req){
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $ad = Admin::where('username', $req->username)-> where('password',md5($req->password))->first();
        if ($ad) {
            session()->put('username',$ad->username);
            session()->flash('msglogin', 'Admin Login Success');
            return redirect()->route('medicine.list')->with('ad',$ad);
        }
        $c = Customer::where('username', $req->username)-> where('password',md5($req->password))->first();
        if ($c) {
            session()->put('customer',$c->username);
            session()->flash('msglogin', 'Customer Login Success');
            return redirect()->route('home')->with('c',$c);
        }
        else return 'login Failed';
    }

    public function logout(){
        session()->flush();
        return redirect()->route('login');
    }


    
}
