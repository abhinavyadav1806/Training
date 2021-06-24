<?php

	session_start();
	include '../config.php';
	
	$error=array();
	$message='';

	if(isset($_POST['submit']))
    {		
        $filename = $_FILES['image']['name'];
        $filetmpname = $_FILES['image']['tmp_name'];
        $folder = 'images/';
        move_uploaded_file($filetmpname, $folder.$filename);

        $name = isset($_POST['name'])?$_POST['name']:'';
        $price = isset($_POST['price'])?$_POST['price']:'';

		$query = "SELECT * FROM product";
        $result = mysqli_query($connect,$query);
        
		if($result ->num_rows > 0)
		{
			while($row=$result->fetch_assoc())
			{
				$_SESSION['make']=array('image'=>$row['image'], 'name'=>$row['name'], 'price'=>$row['price']);

				if($_SESSION['make']['name'] == $name)
				{
					$error[]=array('input'=>'name','msg'=>"Enter a unique PRODUCT NAME");
				}
			}
		}

		if(sizeof($error) == 0)
		{
			$query="INSERT INTO product (`image`, `name`, `price`) VALUES('$filename','$name',$price)";
			header("Location: admin.php");
			//echo "Product Added to Cart";

			$result = mysqli_query($connect,$query);
			//or die("Values cannot be Inserted" .mysqli_error($connect));
		}
	}
	mysqli_close($connect);
?>

<html>
<head>
	<title>
		Add Product
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id=body>
	<div id="wrapper">
		<div id='messages'> 
			<?php echo $message; ?>
		</div>
		<div id='error'>
			<ul id='errormsg'>
			<?php 
				if(sizeof($error)>0):
					foreach($error as $errors):
						echo "<li>".$errors['msg']."</li>"; 
					endforeach;
				endif;
			?>
			</ul>
		</div>
		<div id="signup-form">
			<h1>Add new Product</h1>
			<br>
			<form id='frm' action="" method="POST" enctype="multipart/form-data">
				<p>
					<label for="image">Product Image:<input type="file" name="image" required></label>
				</p>
				<p>
					<label for="name">Product Name:<input type="text" name="name" required></label>
				</p>
				<p>
					<label for="price">Product Price:<input type="number" name="price" required></label>
				</p>
				<br>
				<p>
					<input type="submit" name="submit" value="Submit">
				</p>
			</form>
		</div>
	</div>
</body>
</html>