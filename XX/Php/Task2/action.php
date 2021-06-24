<!-- FUNCTION TO DISPLAY TABLE -->
<?php
require "config.php";
echo '<link rel="stylesheet href="stylr.css>';

function table($cart)
{
    $table = '<table><tr>
 <th>IMAGE</th>
 <th>ID</th>
 <th>NAME</th>
 <th>QUANTITY</th>
 <th>PRICE</th>
 <th>TOTAL</th>
 <th>ACTION</th>
 </tr>';
    echo $table;
    foreach($cart as $key => $value){
        echo '<tr>
<td><img src='.$value['image'].'></td>
<td>'.$value['id'].'</td>
<td>'.$value['name'].'</td>
<td>
<form action="products.php?id=' . $value['id'] . '&action=update" method="POST">
<input type="text" name="inputfieldfetch" min="1" value=" '.$value['quantity'].' ">
<input type="submit" name="update-product" value="Update">
</form>
</td>
<td>'.$value['price'].'</td>
<td>'.$value['price'] * $value['quantity'].'</td>
<td><a class="clear" href="products.php?id='.$value['id'].'&action=clear">Clear</a></td>
</tr>';
    }

    echo '</table>';

    foreach ($cart as $key => $value) 
    {
        global $grandtotal;
        $grandtotal += $value['quantity'] * $value['price'];
    }

    echo "<span id='span'><h2> TOTAL CART PRICE :</h2> <h4>$".$grandtotal."</h4> </span>";
}

function check($x,$cart)
{
    foreach ($cart as $key => $value)
    {
        if( $x==$value['id'] )
        {
            return true;
        }
    }
    return false;
}
?>