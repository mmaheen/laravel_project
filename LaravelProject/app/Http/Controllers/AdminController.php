<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function login(){
        return view ('login.adminlogin');
    }

    public function registration(){
        return view ('registration.adminregistration');
    }

    public function registersubmit(){
        return 
    }
}
