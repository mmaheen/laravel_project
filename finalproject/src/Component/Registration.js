import {useState} from 'react';
import axios from 'axios';

const Registration=()=>{
    const [name,setName] = useState("");
    const [username,setUsername] = useState("");
    const [email,setEmail] = useState("");
    const [phone,setPhone] = useState("");
    const [password,setPassword] = useState("");


    const handleForm=(e)=>{
        e.preventDefault();
        var obj = {name:name,username:username,email:email,phone:phone,password:password};
        
        axios.post("http://127.0.0.1:8000/api/admin/registration",obj).then((resp)=>{
            
        },(err)=>{
            
        });

    }
    return(
        <form onSubmit={handleForm}>
            <input type="text" value={name} onChange={(e)=>{setName(e.target.value)}} placeholder='Name'></input> <br/>
            <input type="text" value={username} onChange={(e)=>{setUsername(e.target.value)}} placeholder='User Name'></input> <br/>
            <input type="text" value={email} onChange={(e)=>{setEmail(e.target.value)}} placeholder='Email'></input> <br/>
            <input type="text" value={phone} onChange={(e)=>{setPhone(e.target.value)}} placeholder='phone'></input><br/>
            <input type="text" value={password} onChange={(e)=>{setPassword(e.target.value)}} placeholder='password'></input><br/>
            <input type="submit" value="Add"/>
        </form>
    )

}
export default Registration;
