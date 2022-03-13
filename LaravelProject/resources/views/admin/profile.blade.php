@extends('layout.loggedin')
@section('content')
<html>
    <head></head>
    <center>
    <body>
        <img src="{{asset($ad->image)}}" width="180px" height="180px">
        <h3>Name: {{$ad->name}} </h3>
        <a href = "{{route('admin.name.update')}}"><input type = "button" class = "btn btn-outline-primary" value = "Change Name"></a>
        <a href = "{{route('admin.password.update')}}"><input type = "button" class = "btn btn-outline-danger" value = "Change Password"></a><br>
        <a href = "{{route('admin.change.picture')}}"> Change Profile Picture</a>
        <h3>Username: {{$ad->username}} </h3>
        <h3>Email: {{$ad->email}} </h3>
        <h3>Phone: {{$ad->phone}} </h3>
    </body>
    </center>
</html>
@endsection