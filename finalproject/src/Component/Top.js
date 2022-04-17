import React from 'react'
import {Link} from 'react-router-dom'

const Top=()=>{
    return (
        <div>
            <Link to = "/">Home</Link> &nbsp;
            <Link to = "/login">Login</Link> &nbsp;
            <Link to = "/registration">Registration</Link> &nbsp;
        </div>
    )
}
export default Top;