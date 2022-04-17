import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';
import Top from './Component/Top'
import Home from './Component/Home'
import {BrowserRouter, Route, Switch} from 'react-router-dom';
import Post from './Component/Post'
import Registration from './Component/Registration'
import ProductAdd from './Component/ProductAdd'
import Login from './Component/Login'
import Profile from './Component/Profile'

ReactDOM.render(
  <React.StrictMode>
    <BrowserRouter>
      <Top/>
      <Switch>
        <Route exact path = "/">
          <Home />
        </Route>
        
        <Route exact path = "/login">
          <Login />
        </Route>

        <Route exact path = "/registration">
          <Registration></Registration>
        </Route>

      </Switch>
    </BrowserRouter>
  </React.StrictMode>,
  document.getElementById('root')
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
