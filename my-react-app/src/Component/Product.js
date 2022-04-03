import React from 'react'

const Product = (props) => 
{
    return(
        <div>
            Name : {props.name} <br></br>
            Price: {props.price}
        </div>
    )
}
export default Product;