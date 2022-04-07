import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';
import Top from './Component/Top'
import Home from './Component/Home'
import Login from './Component/Login'
import {BrowserRouter, Route, Switch} from 'react-router-dom';
import Post from './Component/Post'

ReactDOM.render(
  <React.StrictMode>
    {/* <BrowserRouter>
      <Top/>
      <switch>
        <route exact path = "/"><Home /></route>
        <route exact path = "/login"><Login /></route>
      </switch>
      <switch></switch>
      <switch></switch>
      
      
    </BrowserRouter> */}
    <Post/>

    
  </React.StrictMode>,
  document.getElementById('root')
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
