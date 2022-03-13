@extends('layout.homelayout')
@section('content')

<html>
    <head></head>
    <body>
        <center>

        <h5 style="color: blue;"><u>New Customer Registration</u></h5>
            <form action="{{route('customer.registration')}}" method="post" enctype = "multipart/form-data">
            {{csrf_field()}}
                <table>
                    <tr>
                        <td> Name:</td>
                        <td><input type="text" name="name" value="{{old('name')}}" placeholder="Enter Name"></td>
                        @error('name')
                        <td class="text-danger">{{$message}}*</td>
                        @enderror
                    </tr>

                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" value="{{old('username')}}" placeholder="Enter  Username"></td>
                        @error('username')
                        <td class="text-danger">{{$message}}*</td>
                        @enderror
                    </tr>

                    <tr>
                        <td>E-mail:</td>
                        <td><input type="text" name="email" value="{{old('email')}}" placeholder="Enter Email"></td>
                        @error('email')
                        <td class="text-danger">{{$message}}*</td>
                        @enderror
                    </tr>

                    <tr>
                        <td>Phone:</td>
                        <td><input type="text" name="phone" value="{{old('phone')}}" placeholder="Enter Phone Number"></td>
                        @error('phone')
                        <td class="text-danger">{{$message}}*</td>
                        @enderror
                    </tr>

                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" placeholder="Enter Password"></td>
                        @error('password')
                        <td class="text-danger">{{$message}}*</td>
                        @enderror
                    </tr>

                    <tr>
                        <td>Confirm Password:</td>
                        <td><input type="password" name="confirm_password" placeholder="Confirm your Password"></td>
                        @error('confirm_password')
                        <td class="text-danger">{{$message}}*</td>
                        @enderror
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type = "file" name = "image"><br></td>
                        @error('image')
                        <td class="text-danger">{{$message}}*</td>
                        @enderror
                    </tr>

                    <tr>
                        <td align="center" colspan="2"><br><input type="submit" class="btn btn-primary" value="Register"></td>
                    </tr><br>
                </table>
            </form>
        </center>
    </body>
</html>

@endsection