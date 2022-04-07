@extends('layout.homelayout')
@section('content')
    <html>
        <head></head>

        <body>
            <span class = "text-success">{{Session::get('msg')}}</span>
            <span class = "text-success">{{Session::get('logincus')}}</span>
            <span class = "text-success">{{Session::get('cartadd')}}</span>
            <span class = "text-danger">{{Session::get('loggedout')}}</span>
            
            <h1>Home</h1>
            
            <table class = "table">
            <tr>
                <th>
                    
                </th>

                <th>
                    Medicine Name
                </th>

                <th>
                    Price
                </th>

                <th>
                    Stock
                </th>

                <th>
                    Desciption
                </th>
                
            </tr>


            <tr>
                @foreach($medicines as $m)
                    <tr>
                        <td><img src = "{{asset($m->image)}}" height = "100px" width = "100px"></td>
                        <td>{{$m->name}}</td>
                        <td class = "text-success">{{$m->unit_price}} Taka</td>
                        <td class = "text-danger">{{$m->stock}} Units</td>
                        <td>{{$m->description}}</td>
                        <td><a href="{{route('medicine.addtocart',['id'=>$m->id])}}"><button class = "btn btn-primary">Add to Cart</button></a></td>
                        
                        
                    </tr>
                @endforeach
            </tr>
        </table>
        </body>
    </html>

@endsection