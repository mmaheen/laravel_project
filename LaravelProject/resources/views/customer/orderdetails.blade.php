@extends('layout.homelayout')
@section('content')

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Details</title>
    </head>
    <body>
        <h3>Order Details</h3>
        <h5>Order id : {{$order->id}}</h5>
        <h5>Ordered By : {{$order->customer->name}}</h5>
        <h5>Phone : {{$order->customer->phone}}</h5>
        <h5>Order Details</h5>
        <table class = "table table-bordered">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Unit price</th>
                <th>Quantity</th>
            </tr>

            @foreach($order->orderdetails as $p)
                <tr>
                    <td><img src="{{asset($p->product->image)}}" height = "100px" width = "100px"></td>
                    <td>{{$p->product->name}}</td>
                    <td>{{$p->unit_price}}</td>
                    <td>{{$p->quantity}}</td>
                </tr>
            @endforeach
        </table>
    </body>
    </html>

@endsection