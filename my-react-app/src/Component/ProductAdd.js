import React from "react";

const ProductAdd =() =>
{
    return(
        <div>
            <table>
                <tr><td>Name</td><td><input type = "text" placeholder = "Name"></input></td></tr>
                <tr><td>Price</td><td><input type = "text" placeholder = "Unit Price"></input></td></tr>
                <tr><td>Stock</td><td><input type = "text" placeholder = "Stock"></input></td></tr>
                <tr><td>Description</td><td><textarea></textarea></td></tr>
                <tr><td>Image</td><td><input type = "file"></input></td></tr>
                <tr><td></td><td><input type = "submit" value = "Add"></input></td></tr>
            </table>
        </div>
    )
}
export default ProductAdd;