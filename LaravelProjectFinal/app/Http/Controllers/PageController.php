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

    
    public function adminprofile($id){
        $ad = Admin::where('id',$id);
        return view ('adminprofile')->with('ad',$ad);
    }
}

