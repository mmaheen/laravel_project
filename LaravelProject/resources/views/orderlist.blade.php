@extends('layout.loggedin')
@section('content')
<html>
    <head>

    </head>

    <body>
        <table class = "table">
            <tr>
                <th>
                    ID
                </th>
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
                @foreach($order as $o)
                    <tr>
                        <td>{{$o->order}}</td>
                        <td>{{$o->order->customer->id}}</td>
                        <td>{{$o->order->customer->name}}</td>
                        <td></td>
                        <td>{{$o->orderdetails->medicine->name}}</td>
                        <td></td>
                        <td></td>
                        <td>{{$o->order->created_at}}</td>
                        <td>{{$o->order->updated_at}}</td>
                    </tr>
                @endforeach
            </tr>

        </table>
    </body>
</html>
@endsection