@extends('layout.homelayout')
@section('content')
<html>
    <head></head>
    <center>
    <body>
        <img src="{{asset($cus->image)}}" width="300px" height="300px">
        <h3>Name: {{$cus->name}} </h3>
        <a href = "{{route('customer.name.update')}}"><input type = "button" class = "btn btn-outline-primary" value = "Change Name"></a>
        <a href = "{{route('customer.password.update')}}"><input type = "button" class = "btn btn-outline-danger" value = "Change Password"></a>
        <h3>Username: {{$cus->username}} </h3>
        <h3>Email: {{$cus->email}} </h3>
        <h3>Phone: {{$cus->phone}} </h3>
    </body>
    </center>
</html>
@endsection