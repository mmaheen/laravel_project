<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class MailController extends Controller
{
    //
    public function mail(){
        $e_sub = "Succesfully mail sent";
        $e_body = "I have create Mail";
        Mail::to('mm.mugdha54@gmail.com')->send(new SendMail($e_sub,$e_body));
    }
}
