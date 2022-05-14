import {useState} from 'react';
import axios from 'axios';

const Mail=()=>{
    const[sub,setSub] = useState("");
    const[body,setBody] = useState("");
    const[msg,setMsg] = useState("");
    const handleForm=(e)=>{
        e.preventDefault();
        var obj = {sub:sub,body:body};
        axios.post("http://127.0.0.1:8000/api/mail",obj).then((succ)=>{
            debugger;
            if(succ.data.mail != true){
                setMsg("Mail sent");
            }
            else {
                setMsg("Failed");
            }
        },(err)=>{

        });
        //alert(uname + " " +pass);
    }
    return(
        <form onSubmit={handleForm}>
            <input type="text" value={sub} onChange={function(e){setSub(e.target.value)}} placeholder="Subject"></input><br/>
            <input type="text" value={body} onChange={(e)=>{setBody(e.target.value)}} placeholder="Body"></input><br/>
        
            <span>{msg}</span>
            <input type="submit"></input>
        </form>
    )
}
export default Mail;