<?php
	include_once("config.php");
	include('action.php');
	
	session_start();

	if(isset($_SESSION['cart']))
	{
		$cart = $_SESSION['cart'];
		//print_r($_SESSION);
	}
	else
	{ 
		$cart=array();
	}
	
	if(isset($_GET['id']))
	{
		if($_GET['action']=='add')
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
			}

			elseif(!$var)
			{
				//echo "elseif";
				$id = $_GET['id'];

				foreach ($products as $key => $value)
				{			
					if($id == $value['id'])
					{
						$addnewproduct = $value;
					}
				}
				
				if(empty($cart))
				{
					$cart[] = $addnewproduct;
				}
				else
				{	
					echo "else";
					array_push($cart, $addnewproduct);
				}
			}
		}
	}
?>


<?php
	if(isset($_GET['action']))
	{
		if($_GET['action'] == 'clear')
		{
			foreach($cart as $key1 => $value)
			{
				if($_GET['id'] == $value['id'])
				{
					unset($cart [$key1]);
				}
			}
		}
	

	elseif ($_GET['action'] == 'update')
	{
		if((isset($_POST['update-product'])))
		{
			foreach ($cart as $key => $product)
			{
				if ($_GET['id'] == $product['id']) 
				{
					$cart[$key]['quantity'] = $_POST['inputfieldfetch'];
				}
			}
			 
		}
	} 
}
?>

<?php 
	if(!empty($cart))
	{	
		table($cart);
	}
?>

<html>
	<head>
		<?php include("header.php"); ?>
	</head>

	<body>
		<!--  LOOP TO PRINT DYNAMIC PHP (ARRAY)  -->
		<div id="main">
			<div id='products'>
				<?php 
					foreach ($products as $key => $value):
				?>
				<form action="" method="POST">
					<div class="product">
						<img src="<?php echo $value['image']; ?>">
						<h3 class="title"><a href="#"><?php echo $value['name'];?></a></h3>
						<span><?php echo $value['price'];?></span>
						<a class="add-to-cart" href="products.php?id=<?php echo $value['id'];?>&action=add">Add To Cart</a>
					</div>
				</form>
				<?php endforeach; ?>
			</div>	
		</div>

		<div id="footer">
			<?php 
				include("footer.php");
				$_SESSION['cart']=$cart;
			?>
		</div>
	</body>
</html>