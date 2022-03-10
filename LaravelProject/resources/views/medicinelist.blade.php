@extends('layout.loggedin')
@section('content')
<html>
    <head></head>

    <body>
    <!--<a href = "{{route('admin.profile',['id'=>1])}}"> Profile </a><br>-->
    <span class = "text-danger">{{Session::get('msg')}}</span>
    <span class = "text-success"> {{Session::get('msglogin')}}</span><br>
    <span class = "text-success"> {{Session::get('msgadded')}}</span>
    <span class = "text-success"> {{Session::get('msgup')}}</span>
    
    
    
        <h4>
            Medicine List
        </h4>

        <table>
            <tr align = "center">
                <th>
                    Sample
                </th>

                <th>
                    Name
                </th>

                <th>
                    Unit Price
                </th>

                <th>
                    Description
                </th>

                <th>
                    Stock
                </th>

                
            </tr>


            <tr>
                @foreach($medicines as $m)
                    <tr align = "center">
                        <td><img src = "{{asset($m->image)}}" height = "100px" width = "100px"></td>
                        <td>{{$m->name}}</td>
                        <td class = "text-success">{{$m->unit_price}} Taka</td>
                        <td>{{$m->description}}</td>
                        <td class = "text-danger">{{$m->stock}} Units</td>
                        <td> <a href = "{{route('medicine.edit',['id'=>$m->id])}}" ><input type = "button" class = "btn btn-secondary" value = "Update"></a></td>
                        <td> <a href = "{{route('medicine.delete',['id'=>$m->id])}}" ><input type = "button" class = "btn btn-danger" value = "Delete"></a></td>
                    </tr>
                @endforeach
            </tr>
        </table>
        
    </body>
</html>
@endsection