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
            'image' => 'required'
        ]);

        $filename = $req->username.'.'.$req->file('image')->getClientOriginalExtension();
        $req->file('image')->storeAs('public/CustomerImage',$filename);


        $cus = new Customer();
        $cus->name = $req->name;
        $cus->username = $req->username;
        $cus->email = $req->email;
        $cus->phone = $req->phone;
        $cus->password = md5($req->password);
        $cus->image = "storage/CustomerImage/".$filename;
        $cus->save();

        session()->flash('msg','Registration Successful');
        return redirect()->route('home');
    }

    public function profile(){
        $cus = Customer::where('username',session()->get('customer'))->first();

        return view('customer.profile')->with('cus',$cus);
    }

    public function nameedit(){
        $cus = Customer::where('username',session()->get('customer'))->first();
        return view('customer.nameupdate')->with('cus',$cus);
    }

    public function nameupdate(Request $req){
        $req->validate(
            ['name' => 'required']
        );
        $cus = Customer::where('username',session()->get('customer'))->first();
        $cus->name = $req->name;
        $cus->save();
        return redirect()->route('customer.profile')->with('cus',$cus);
    }

    public function passwordedit(){
        $cus = Customer::where('username',session()->get('customer'))->first();
        return view('customer.passwordupdate')->with('cus',$cus);
    }

    public function passwordupdate(Request $req){
        $req->validate(
            [
                //'old_password' => 'required|same:customers,md5(password)',
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password'
            ]
        );
        $cus = Customer::where('username',session()->get('customer'))->first();
        $cus->password = md5($req->new_password);
        $cus->save();
        return redirect()->route('customer.profile')->with('cus',$cus);
    }

    public function pictureedit(){
        $cus = Customer::where('username',session()->get('customer'))->first();
        return view('customer.pictureupdate')->with('cus',$cus);
    }

    public function pictureupdate(Request $req){
        $cus = Customer::where('username',session()->get('customer'))->first();
        $filename = $req->username.'.'.$req->file('image')->getClientOriginalExtension();
        $req->file('image')->storeAs('public/CustomerImage',$filename);

        $cus->image = "storage/CustomerImage/".$filename;
        $cus->save();
        return redirect()->route('customer.profile')->with('cus',$cus);
    }
}
