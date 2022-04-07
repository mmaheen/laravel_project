import React from 'react';

const Login = () =>{
    return(
        <div>
            <table border = '1'>
                <tr>
                    <td>User Name</td>
                    <td><input type = "text" placeholder = "User Name"></input></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type = "password" placeholder = "Password"></input></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type = "submit" value = "Login"></input></td>
                </tr>
            </table>
        </div>
    )
}
export default Login;