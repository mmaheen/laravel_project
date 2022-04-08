@extends('layout.homelayout')
@section('content')

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My orders</title>
    </head>
    <body>
        <h3>My Orders</h3>

        <table class = "table table-bordered">
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Price</th>
            </tr>

            @foreach($orders as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->price}}</td>
                    <td><a href="{{route('customer.myorders.details',['id'=>$item->id])}}" class = "btn btn-info">Details</a></td>
                </tr>
            @endforeach

        </table>
    </body>
    </html>

@endsection