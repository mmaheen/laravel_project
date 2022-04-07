import React , {useState,useEffect} from 'react';
import Axios from 'axios';

const Post = () => {

    const [post,setpost] = useState([{id:1, name : "Mugdha"},{id : 2 , name: "taha"}]);
    
    return (
        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                </thead>

                <tbody>
                    {
                        post.map(post => (
                            <tr key = {post.id}>
                                <td>{post.id}</td>
                                <td>{post.name}</td>
                            </tr>
                        ))
                    }
                </tbody>
            </table>
        </div>
    )
} 
export default Post;