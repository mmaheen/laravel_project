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
    <h3>This is cart List</h3>
    <Table>
        <tr>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>

        <tr>
            <td>{{$cart->medicine->name}}</td>
            <td>{{$medicine->unit_price}}</td>
            <td>{{$cart->medicine_quantity}}</td>
            <td>{{$cart->total_price}}</td>
            <td><a href=""><button class = "btn btn-danger">Drop</button></a></td>
        </tr>
    </Table>
</body>
</html>

@endsection