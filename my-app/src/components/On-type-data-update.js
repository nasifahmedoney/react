/* function OnTypeDataUpdate(){
    state = 

} */
// use class components for using 'state'
import { Component } from "react";

class OnTypeDataUpdate extends Component{
    state = {name:'nasif'}

    updateData=()=>{
        this.setState(
            {name:document.getElementById('textData').value}
        ) 
    }

    render(){
        return(
            <div>
                <input id='textData'type='text' value={this.state.name} onChange={this.updateData}></input>
                <h1>{this.state.name}</h1>
            </div>
            
        );
    }
}

export default OnTypeDataUpdate;