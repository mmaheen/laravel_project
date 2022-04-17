import {useState} from 'react';
import axios from 'axios';

const Login=()=>{
    const[username,setUname] = useState("");
    const[password,setPass] = useState("");
    const[msg,setMsg] = useState("");
    const handleForm=(e)=>{
        e.preventDefault();
        var obj = {username:username,password:password};
        axios.post("http://127.0.0.1:8000/api/admin/login",obj).then((succ)=>{
            if(succ.data.login == true){
                setMsg("Login Successfull");
            }
            else {
                setMsg("Login failed");
            }
        },(err)=>{

        });
        //alert(uname + " " +pass);
    }
    return(
        <form onSubmit={handleForm}>
            <input type="text" value={username} onChange={function(e){setUname(e.target.value)}} placeholder="Username"></input><br/>
            <input type="password" value={password} onChange={(e)=>{setPass(e.target.value)}} placeholder="Password"></input><br/>
            <span>{msg}</span>
            <input type="submit"></input>
        </form>
    )
}
export default Login;