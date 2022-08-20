import axios from 'axios';
import { useState } from 'react';

function Blog(){
    const [ data, setNewData ] = useState([]);

    axios.get('https://jsonplaceholder.typicode.com/posts')
    .then(loadeddata=>{
        setNewData(loadeddata.data)
    })
    .catch(error=>{
        console.log(error)
    })
    //console.log(data);
        return(
            <ul>
                {data.map(posts=>{
                    return(
                        <li>{posts.title}</li>
                    );
                })}
            </ul>
        );
}
export default Blog;