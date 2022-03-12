
<html>
    <head>
    <link rel = "stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >

    </head>

    <body>
        <center>
        <div id = "header">
        <a href = "{{route('home')}}">Home</a>
            <a href = "{{route('customer.registration')}}">Sign Up</a>
            @if(!Session::has('customer'))<a href = "{{route('login')}}">Login</a><br>@endif
            @if(Session::has('customer'))<a href = "{{route('admin.logout')}}">Log out</a>@endif


        </div>

        @yield ('content')

        <div>
            &copy; Pharmacy Group
        </div>
</center>
    </body>
</html>