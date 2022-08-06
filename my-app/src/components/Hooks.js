import { useState } from "react";

function Hooks(props){
    const [names, setNewNames] = useState({
        users:[
            {name:'user1', age:'100'},
            {name:'user2', age:'200'},
            {name:'user3', age:'300'}
        ]
    });
    function clickHandler() {
        setNewNames({
            users:[
                {name:'new user1', age:'100'},
                {name:'new user2', age:'200'},
                {name:'new user3', age:'300'}
            ]
        })
    }

    return (
        <div>
            <button onClick={clickHandler}>Click here</button>
            <h1>hello {names.users[0].name}</h1>
            <h1>hello {names.users[1].name}</h1>
            <h1>hello {names.users[2].name}</h1>
        </div>
    );
}

export default Hooks;