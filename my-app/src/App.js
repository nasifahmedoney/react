// import logo from './logo.svg';
import React from 'react';
import './App.css';
// import Learn from './components/Hello'
import ClassComponent from './components/ClassComponent';

function App() {
    return (
      <div className="App">
        {/* <Learn name='Hi user1'/>
        <Learn name='Hi user2'/> */}
        <ClassComponent name='new user'/>
        {/* no-useless-constructor error*/}
      </div>
    );
}

export default App;
