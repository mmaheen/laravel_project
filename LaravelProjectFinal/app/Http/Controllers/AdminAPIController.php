<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminAPIController extends Controller
{
    //

    public function registration(Request $req){
        //$filename = $req->username.'.'.$req->file('image')->getClientOriginalExtension();
        //$req->file('image')->storeAs('public/AdminImage',$filename);

        $ad = new Admin();
        $ad->name = $req->name;
        $ad->username = $req->username;
        $ad->email = $req->email;
        $ad->phone = $req->phone;
        $ad->password = md5($req->password);
        //$ad->image = "storage/AdminImage/".$filename;
        $ad->image = $req->image;
        $ad->save();
        return "added";
        //session()->flash('registration','Suucessfully Registered');
    }

    public function list()
    {
        $admin = Admin::all();
        return $admin;
    }

    public function login(Request $req){
        $admin = Admin::where('username',$req->username)->where('password',md5($req->password))->first();
        if($admin){
            return "Welcome $admin->name";
        }
        else{
            return "failed";
        }
    }
    

}
