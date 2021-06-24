<?php

	session_start();
	include("config.php");

	if(isset($_SESSION['cart']))
	{
		$cart = $_SESSION['cart'];
	}
	else
	{ 
		$cart=array();
	}

	if(isset($_GET['id']))
	{

		$var = check($_GET['id'],$cart);
		if($var)
		{	
			//echo "if";
			foreach ($cart as $key => $value) 
			{	
				if($_GET['id']==$value['id'])
				{	
					//echo "hello";
					$cart[$key]['quantity'] = $cart[$key]['quantity'] + 1;						
				}
			}
			//-------------------
			// echo"<pre> NEW Quantity";
			// print_r($cart);
			// echo"</pre>";
		}

		elseif(!$var)
		{
			
			$id = $_GET['id'];
			$sql = "SELECT * FROM product";
		
			$result = mysqli_query($connect, $sql);

			$product = array();
			if($result ->num_rows > 0)
			{
				while($row=$result->fetch_assoc())
				{
					if($id == $row['id'])
					{
						$product['id'] = $row['id'];
						$product['image'] = $row['image'];
						$product['name'] = $row['name'];
						$product['price'] = $row['price'];
						$product['quantity'] = 1;
						//----------
						// echo"<pre> new product";
						// print_r($product);
						// echo"</pre>";
					}
				}
			}
			
			if(empty($cart))
			{
				$cart[] = $product;
			}
			else
			{	
				//echo "else";
				array_push($cart, $product);
			}
		}
		//--------------------
		// echo"<pre> push cart";
		// print_r($cart);
		// echo"</pre>";
	}

	function check($x,$cart)
	{
		foreach ($cart as $key => $value)
		{
			//echo $value['id'];
			if( $x==$value['id'] )
			{
				return true;
			}
		}
		return false;
	}
	
	function show($connect)
	{
		$sql = "SELECT * FROM product";
        
		$result= mysqli_query($connect,$sql);
		if($result ->num_rows > 0)
		{
			foreach($result as $row)
			{
				echo "<form method='POST'>
				<div class = 'product'>
					<img src = 'Admin/images/".$row['image']."'>
					<h3 class='title'><a href='#'> ".$row['name']."</a></h3>
					<span> $".$row['price']." </span>
					<a class='add-to-cart' href='products.php?id=".$row['id']."'>Add To Cart</a>
				</div></form>";
			}
		}
	}

	//------------ TO display the cart in PRODUCT.PHP------------
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
                        <td> <a href=products.php?id=".$value['id']."&action=remove>remove</a> </td>
                    <tr>";
                }
			echo"</table>";
			
            foreach ($_SESSION['cart'] as $key => $value) 
            {
                global $grandtotal;
                $grandtotal += $value['quantity'] * $value['price'];
            }
			echo "<span id='span'> <b>TOTAL: $".$grandtotal."</b> </span>";

			echo "<a href='thankyou.php' id='checkout'>Checkout<a>";
        }
	}
	
	$_SESSION['cart'] = $cart;
	if ($_GET['action'] == 'remove') 
	{
		foreach ($_SESSION['cart'] as $key => $product) 
		{
			if ($_GET['id'] == $product['id']) 
			{
				unset($_SESSION['cart'][$key]);
			}
		}
	}
	
?>

<html>
	<head>
		<?php include("header.php"); ?>
	</head>

	<body>
		<div id="main">
			<div id ="products">
				<?php
					show($connect); 
				?>
			</div>
		</div>

		<div>
			<?php display();?>
		</div>

		<div id="footer">
			<?php 
				include("footer.php");
			?>
		</div>
	</body>
</html>