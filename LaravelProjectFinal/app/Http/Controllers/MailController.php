<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Admin;
use App\Models\Mailp;

class MailController extends Controller
{
    //
    public function mail(Request $req){
        //$a = Admin::select('email')->get();
        //return $a;

        $m = new Mailp();
        $m->sub = $req->sub;
        $m->body = $req->body;
        $m->save();

        $e_sub = $m->sub;
        $e_body = $m->body;
        Mail::to('mushrifmaheen35@gmail.com')->send(new SendMail($e_sub,$e_body));
    }

    public function mailget(){
        $a = Admin::select('email')->get();
        //return $a;

        $e_sub = "sub";
        $e_body = "body";
        Mail::to($a)->send(new SendMail($e_sub,$e_body));
    }
}
