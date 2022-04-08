@extends('layout.homelayout')
@section('content')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    @if(session()->has('cart'))
    <a href="{{route('medicine.emptycart')}}">
        <button class = "btn btn-danger">Empty Cart</button>
    </a>
    <table class = "table">
        <tr>
            <th></th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>

        @php
            $total = 0;
        @endphp
        @foreach($cart as $item)
            <tr>
                <td><img src= "{{$item->image}}" width = "50px" hight = "50px"></td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->quantity*$item->price}}</td>
                @php
                    $total += $item->quantity * $item->price
                @endphp
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <th>Grand Total</th>
            <td>{{$total}}</td>
        </tr>
    </table>

    <form action="{{route('checkout')}}" method = "post">
        {{@csrf_field()}}
        <input type="hidden" name = "total_price" value = "{{$total}}">
        <input type="submit" class = "btn btn-primary" value = "Place Order">
    </form>
    @else
        Cart is Empty
    @endif

</body>
</html>

@endsection