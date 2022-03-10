@extends('layout.homelayout')
@section('content')
<html>
    <head></head>
    <body>
        @if(Session::has('registration'))
        <span class = "alert alert-info">{{Session::get('registration')}}</span><br>
        @endif
        <h3>Login</h3>
        <form action = "{{route('login')}}" method = "post">
            {{@csrf_field()}}
            <input type = "text" name = "username" value = "{{old('username')}}"placeholder = "Username"><br>
            @error('username')
                <span class = "text-danger">{{$message}}</span><br>
            @enderror
            <input type = "password" name = "password" placeholder = "Passwords"><br>
            @error('password')
                <span class = "text-danger">{{$message}}</span><br>
            @enderror
            <input type = "submit" class = "btn btn-primary" value = "Log in">
            
        </form>
    </body>
</htmL>
@endsection