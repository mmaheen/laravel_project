@extends('layout.homelayout')
@section('content')
    <html>
        <head></head>

        <body>
            <h1>Home</h1>

            <table>
            <tr>
                <th>
                    
                </th>

                <th>
                    ------Medicine Name------
                </th>

                <th>
                    ------Price------
                </th>

                <th>
                    ------Stock------
                </th>

                <th>
                    ------Desciption------
                </th>
                
            </tr>


            <tr>
                @foreach($medicines as $m)
                    <tr align = "center">
                        <td><a href = "{{route('medicine.details', ['id'=>$m->id,'name'=>$m->name])}}"><img src = "{{asset($m->image)}}" height = "100px" width = "100px"></a></td>
                        <td>{{$m->name}}</td>
                        <td class = "text-success">{{$m->unit_price}} Taka</td>
                        <td class = "text-danger">{{$m->stock}} Units</td>
                        <td>{{$m->description}} Units</td>
                        
                        
                    </tr>
                @endforeach
            </tr>
        </table>
        </body>
    </html>

@endsection