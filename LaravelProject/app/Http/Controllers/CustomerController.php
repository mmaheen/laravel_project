<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    //
    public function registration(){
        return view ('customer.registration');
    }
    public function registersubmit(Request $req)
    {
        $req->validate(
        [
            'name'=>'required|min:2',
            'username'=>'required|min:2',
            'email'=>'required|email|unique:customers,email',
            'phone'=>'required|min:11|max:11',
            'password'=>'required|min:3',
            'confirm_password'=>'required|min:3|same:password',
        ]);

        $cus = new Customer();
        $cus->name = $req->name;
        $cus->username = $req->username;
        $cus->email = $req->email;
        $cus->phone = $req->phone;
        $cus->password = md5($req->password);
        $cus->save();

        session()->flash('msg','Registration Successful');
        return redirect()->route('home');
    }

    


}
