@extends('layout.homelayout')
@section('content')
<html>
    <head></head>

    <body>
        <h3>
            Product Details
        </h3>
        <img src = "{{asset($medicine->image)}}" height = "200px" width = "200px"><br>

        Name : {{$medicine->name}} <br>
        Price : {{$medicine->unit_price}}<br>
        {{$medicine->stock}} units Available<br>
        How many units do you want? <br>
        <form action = "{{route('medicine.details',['id'=>$medicine->id,'name'=>$medicine->name])}}" method = "post">
            {{csrf_field()}}
            <input type = "text" name = "unit" placeholder = "Units"><br>
            @error('unit')
                <span class = "text-danger">{{$message}}</span><br>
            @enderror
            <input type = "submit" class = "btn btn-primary" value = "Add to cart"></a>
        </form>

    </body>
</html>
@endsection