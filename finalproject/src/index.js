import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';
import Login from './Component/Login';
import Registration from './Component/Registration';
import Home from './Component/Home';
import { BrowserRouter, Route, Routes } from "react-router-dom";
import Top from './Component/Top';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <BrowserRouter>
      <Top></Top>
      <Routes>
        <Route path = "/" element = {<Home/>}>
        </Route>

        <Route path = "/login" element = {<Login/>}>
        </Route>

        <Route path = "/registration" element = {<Registration/>}>
        </Route>
      </Routes>
    </BrowserRouter>
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
