import React,{Component} from "react";

class ClassComponent extends Component{
    constructor(props){
        super(props);
        this.state = {
            users:[
                {name:'user1', age:'100'},
                {name:'user2', age:'200'},
                {name:'user3', age:'300'}
            ]
        }
    }
    clickHandler() {
        console.log("hello");
        alert('alart');
    }
    render(){
        return (
            <div>
                <button onClick={this.clickHandler}>Click here</button>
                <h1>hello {this.state.users[0].name}</h1>
                <h1>hello {this.state.users[1].name}</h1>
                <h1>hello {this.state.users[2].name}</h1>
            </div>
            
        );
    }
}

export default ClassComponent;