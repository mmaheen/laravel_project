
<html>
    <head>
    <link rel = "stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >

    </head>

    <body>
        <center>
        <div id = "header">
        <a href = "{{route('home')}}">Home</a>
            <a href = "{{route('registration')}}">Registration</a>
            <a href = "{{route('login')}}">Login</a>

        </div>

        @yield ('content')

        <div>
            &copy; Pharmacy Group
        </div>
</center>
    </body>
</html>