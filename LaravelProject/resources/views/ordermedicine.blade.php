@extends('layout.homelayout')
@section('content')
    <html>
        <head></head>

        <body>
            <h1>Order Placed</h1>
            <h4 class = "text-danger">Your total price is : {{$order->total_price}} taka</h4>
            <h5>Our employee will deliver your Product soon</h5>
            <h5><a href = "{{route('home')}}">Return Home</a></h5>

            
        </body>
    </html>

@endsection