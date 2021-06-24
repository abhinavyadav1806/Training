<?php
    session_start();

    function display()
    {
        if (isset($_SESSION['cart']))
        {
            echo "<table id='session'><tr>
            <th>ITEM</th>
            <th>QUANTITY</th>
            <th>TOTAL</th>
            <th>ACTION</th>
            </tr>";
                foreach($_SESSION['cart'] as $key => $value)
                {  
                    echo "<tr>
                        <td> <img src = 'Admin/images/".$value['image']."'> <br> ".$value['name']." <br> $".$value['price']." </td>
                        <td> <span>".$value['quantity']." </span> </td>
                        <td> <span> ".$value['price'] * $value['quantity']."</span> </td>
                        <td> <a href='products.php?id=".$value['id']."&action=clear'>Clear</a> </td>
                    <tr>";
                }
            echo"</table>";

            foreach ($_SESSION['cart'] as $key => $value) 
            {
                global $grandtotal;
                $grandtotal += $value['quantity'] * $value['price'];
            }
            echo "<span id='span'> TOTAL: <b>$".$grandtotal."</b> </span>";
        }
    }
                
?>

<html>
    <head>
        <link rel= "stylesheet" href="style.css">   
		<?php include("header.php"); ?>
        <?php display(); ?>
	</head>
  
    <body>
        <div id="foot">
            <nav>
                <br><br><br><a href="continueshopping.php" id="shop">Continue Shop<a>
                <a href="thankyou.php" id="checkoutnow">Checkout Now<a>
            </nav>
        </div>
    <body>    
</html>