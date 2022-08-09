import { Component } from "react";

class formData extends Component{
    
    state={
        email:"",
        password:""
    }
    //arrow function required
    displayInputData=(event)=>{
        this.setState({
            email: document.getElementById('email').value,
            password: document.getElementById('password').value
        })
    }
    formSubmit=(e)=>{
        e.preventDefault();
        console.log(this.state.email,this.state.password);
    }

    render(){
        return(
            <div>
                <div>
                    <h1>{this.state.email}</h1>
                    <h1>{this.state.password}</h1>
                </div>
                <div>
                    <form onSubmit={this.formSubmit}>
                        <input type='text' id='email' name={this.state.email} value={this.state.email} onChange={this.displayInputData} ></input><br></br>
                        <input type='password' id='password' name={this.state.password} value={this.state.password} onChange={this.displayInputData} ></input>
                        <br></br><button type="submit">Submit</button>
                    </form>
                </div>
                
            </div>
            
        );
    }
}

export default formData;