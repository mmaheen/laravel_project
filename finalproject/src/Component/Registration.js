import React from 'react';

const Registration = () =>
{
    return(
        <div>
            <h3>Registration</h3>
            <table>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        <input type = "text" placeholder = "Name"></input>
                    </td>
                </tr>

                <tr>
                    <td>
                        Username
                    </td>
                    <td>
                        <input type = "text" placeholder = "Username"></input>
                    </td>
                </tr>

                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type = "text" placeholder = "Email"></input>
                    </td>
                </tr>

                <tr>
                    <td>
                        Phone
                    </td>
                    <td>
                        <input type = "text" placeholder = "Phone"></input>
                    </td>
                </tr>

                <tr>
                    <td>
                        Password
                    </td>
                    <td>
                        <input type = "text" placeholder = "Password"></input>
                    </td>
                </tr>

                
                <tr>
                    <td>
                        Image
                    </td>
                    <td>
                        <input type = "file"></input>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type = "submit" value = "Register"></input>
                    </td>
                </tr>
            </table>
        </div>
    )
}

export default Registration;
