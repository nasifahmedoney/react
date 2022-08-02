import React,{Component} from "react";

class ClassComponent extends Component{
    constructor(props){
        super(props)
    }
    render(){
        return (
            <h1>hello {this.props.name}</h1>
        );
    }
}

export default ClassComponent;