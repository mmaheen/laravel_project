@extends('layout.loggedin')
@section('content')
<html>
    <head>

    </head>

    <body>
        <table>
            <tr>
                <th>
                    Patient ID
                </th>
                <th>
                    Patient Name
                </th>
                <th>
                    Medicine ID
                </th>
                <th>
                    Order Quantity
                </th>
                <th>
                    Ordered Medicine
                </th>
                <th>
                    Unit Price
                </th>
                <th>
                    Total Price
                </th>
                <th>
                    Updated At
                </th>
                <th>
                    Created At
                </th>
            </tr>
            
            <tr>
                @foreach($cart as $o)
                    <tr align = "center">
                        <td>{{$o->medicine->id}}</td>
                        <td>{{$o->order_quantity}}</td>
                        <td class = "text-success">{{$o->medicine->name}}</td>
                        <td class = "text-success">{{$o->medicine->unit_price}}</td>
                        <td class = "text-danger">{{$o->total_price}}</td>
                        <td>{{$o->created_at}}</td>
                        <td>{{$o->updated_at}}</td>
                    </tr>
                @endforeach
            </tr>

        </table>
    </body>
</html>
@endsection