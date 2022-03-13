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
            session()->flash('logincus', 'Customer Login Success');
            return redirect()->route('home')->with('c',$c);
        }
        else return 'login Failed';
    }

    public function logout(){
        session()->flush();
        return redirect()->route('home');
    }

    public function profile(){
        $ad = Admin::where('username',session()->get('username'))->first();

        return view('admin.profile')->with('ad',$ad);
    }

    public function nameedit(){
        $ad = Admin::where('username',session()->get('username'))->first();
        return view('admin.nameupdate')->with('ad',$ad);
    }
    
    public function nameupdate(Request $req){
        $req->validate(
            ['name' => 'required']
        );
        $ad = Admin::where('username',session()->get('username'))->first();
        $ad->name = $req->name;
        $ad->save();
        return redirect()->route('admin.profile')->with('ad',$ad);
    }

    public function passwordedit(){
        $ad = Admin::where('username',session()->get('username'))->first();
        return view('admin.passwordupdate')->with('ad',$ad);
    }

    public function passwordupdate(Request $req){
        $req->validate(
            [
                //'old_password' => 'required|same:customers,md5(password)',
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password'
            ]
        );
        $ad = Admin::where('username',session()->get('username'))->first();
        $ad->password = md5($req->new_password);
        $ad->save();
        return redirect()->route('admin.profile')->with('ad',$ad);
    }

    public function pictureedit(){
        $ad = Admin::where('username',session()->get('username'))->first();
        return view('admin.pictureupdate')->with('ad',$ad);
    }

    public function pictureupdate(Request $req){
        /*$req->validate(
            [
                //'old_password' => 'required|same:customers,md5(password)',
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password'
            ]
        );*/
        $ad = Admin::where('username',session()->get('username'))->first();
        
        $ad->save();
        return redirect()->route('admin.profile')->with('ad',$ad);
    }
}
