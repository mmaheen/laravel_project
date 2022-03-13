@extends('layout.loggedin')
@section('content')
<html>
    <head></head>
    <center>
    <body>
        <form action = "{{route('admin.password.update')}}" method = "post">
            {{csrf_field()}}
            <h3>Change Password</h3>
            <input type = "password" placeholder = "Enter old Password" name = "old_password"><br>
            @error('old_password')
                <span class = "text-danger">{{$message}}</span><br>
            @enderror
            <input type = "password" placeholder = "New Password" name = "new_password"><br>
            @error('new_password')
                <span class = "text-danger">{{$message}}</span><br>
            @enderror
            <input type = "password" placeholder = "Confirm new Password" name = "confirm_password"><br>
            @error('confirm_password')
                <span class = "text-danger">{{$message}}</span><br>
            @enderror
            <input type = "submit" class = "btn btn-primary" value = "Change">
    </form>
    </body>
    </center>
</html>
@endsection