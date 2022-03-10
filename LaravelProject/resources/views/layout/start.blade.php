<html>
    <head>
    <link rel = "stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >

    </head>

    <body>
        <div id = "header">
            <a href = "{{route('home')}}">Home</a>
        </div>

        @yield ('start')

        <div>
            &copy; Pharmacy Group
        </div>
    </body>
</html>