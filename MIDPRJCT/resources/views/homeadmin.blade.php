@if(!Session()->has('loged'))
{   @php
        header("Location: " . URL::to('/login'), true, 302);
        exit();
    @endphp  
}
@endif

@extends('inc.layout')
@section('content')
@include('inc.navadmin')
<center>@if(Session::has('msg'))<span class="alert alert-info">{{Session::get('msg')}}</span>@endif</center>
<br>
<h1>Admin Dash</h1><br><br>

@endsection

