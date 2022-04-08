@extends('layout.loggedin')
@section('content')
<html>
    <head>

    </head>

    <body>
        <table>
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
                    Deliveryman ID
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
                @foreach($order as $o)
                    <tr align = "center">
                        <td>{{$o->id}}</td>
                        <td>{{$o->created_at}}</td>
                        <td>{{$o->updated_at}}</td>
                    </tr>
                @endforeach
            </tr>

        </table>
    </body>
</html>
@endsection