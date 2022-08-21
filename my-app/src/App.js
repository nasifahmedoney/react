// import logo from './logo.svg';
import React from 'react';
import './App.css';
// import FormData from './components/formData';
import {useState} from 'react';
function App() {

  let [count, setCount] = useState(0);
    return (
      <div>
        {/* <FormData /> */}
        <h1>Click: {count}</h1>
        <button onClick={
          ()=>{
          setCount(count+1)
          }
        }>Click</button>
      </div>
    );
}

export default App;
