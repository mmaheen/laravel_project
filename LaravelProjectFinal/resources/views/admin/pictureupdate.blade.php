@extends('layout.loggedin')
@section('content')
<html>
    <head></head>
    <center>
    <body>
        <form action = "{{route('admin.change.picture')}}" method = "post" enctype = "multipart/form-data">
            {{csrf_field()}}
            <h3>Change Profile Picture</h3>
            <input type = "file" name = "image"><br>
            @error('image')
                <span class = "text-danger">{{$message}}*</span>
            @enderror
            <input type = "submit" class = "btn btn-primary" value = "Change">
    </form>
    </body>
    </center>
</html>
@endsection