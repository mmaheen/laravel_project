@extends('layout.homelayout')
@section('content')
<html>
    <head></head>
    <center>
    <body>
        <form action = "{{route('customer.name.update')}}" method = "post">
            {{csrf_field()}}
            <h3>Update name</h3>
            <input type = "text" name = "name" value = "{{$cus->name}}">
            <input type = "submit" class = "btn btn-primary" value = "Change">
    </form>
    </body>
    </center>
</html>
@endsection