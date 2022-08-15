import { Component } from "react";
//import Button from 'react-bootstrap/Button';
import Container from 'react-bootstrap/Container';
//import Form from 'react-bootstrap/Form';
import Nav from 'react-bootstrap/Nav';
import Navbar from 'react-bootstrap/Navbar';
//import NavDropdown from 'react-bootstrap/NavDropdown';
import {Routes, Route, BrowserRouter, Link} from 'react-router-dom';
import About from './pages/About';
import Blog from './pages/Blog';
import Contact from './pages/Contact';
import Profile from './pages/Profile';
import App from "./App";

class header extends Component{

    render(){
        return(
            <div>
                <BrowserRouter>
                <Navbar bg="light" expand="lg">
                <Container fluid>
                <Navbar.Brand><Link to='/'>Home Page</Link></Navbar.Brand>
                <Navbar.Toggle aria-controls="navbarScroll" />
                <Navbar.Collapse id="navbarScroll">
                <Nav
                    className="me-auto my-2 my-lg-0"
                    style={{ maxHeight: '100px' }}
                    navbarScroll
                >
                    <Nav.Link><Link to='/profile'>Profile</Link></Nav.Link>
                    <Nav.Link><Link to='/blog'>Blog</Link></Nav.Link>
                    <Nav.Link><Link to='/contact'>Contact</Link></Nav.Link>
                    <Nav.Link><Link to='/about'>About</Link></Nav.Link>
                </Nav>
                
                </Navbar.Collapse>
            </Container>
            </Navbar>
            <Routes>
                <Route path='/' element={<App />} />
                <Route path='/profile' element={<Profile />} />
                <Route path='/blog' element={<Blog />} />
                <Route path='/contact' element={<Contact />} />
                <Route path='/about' element={<About />} />
            </Routes>
            </BrowserRouter>
            </div>
        );
    }
}

export default header;