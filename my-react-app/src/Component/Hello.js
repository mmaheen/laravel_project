import React from 'react'
import Product from './Product'
import Login from './Login'

const Hello=()=>
{
    return(
        <div>
            <h1>Hello</h1>
            <Product name = 'iPhone' price = '80000'/>
            <Product name = 'Samsung' price = '60000'/>
            <Product name = 'Oppo' price = '30000'/>
            <Product name = 'Xiaomi' price = '8000'/>
            <Login/>
        </div>
    )

}

export default Hello;