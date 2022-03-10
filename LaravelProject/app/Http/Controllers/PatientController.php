<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
    public function login(){
        return view ('login.patientlogin');
    }

    public function registration(){
        return view ('registration.patientregistration');
    }
}
