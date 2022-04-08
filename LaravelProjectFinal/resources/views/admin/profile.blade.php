@extends('layout.loggedin')
@section('content')
<html>
    <head></head>
    <center>
    <body>
        <img src="{{asset($ad->image)}}" width="180px" height="180px"><br>
        <a href = "{{route('admin.change.picture')}}"> Change Profile Picture</a><br>
        Name: {{$ad->name}}
        <a href = "{{route('admin.name.update')}}"><input type = "button" class = "btn btn-outline-primary" value = "Change Name"></a><br>
        Username: {{$ad->username}}<br>
        Email: {{$ad->email}}<br>
        Phone: {{$ad->phone}}<br>
        <a href = "{{route('admin.password.update')}}">Change Password</a><br>
    </body>
    </center>
</html>
@endsection