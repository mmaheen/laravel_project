<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
        <center>
            <div>
               
                <a href = "{{route('medicine.add')}}"> Add Medicine </a><br>
                <a href = "{{route('order.list')}}"> Show Order List </a><br>
                <a href= "{{route('admin.logout')}}"> Log out </a>
            </div>
            @yield('content')
            <div>
                
            </div>
        </center>
    </body>
</html>
