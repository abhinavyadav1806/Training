<?php
    session_start();
    include '../config.php';
        
	$error = array();
    $message = '';
    
    $query = "SELECT * FROM product";
    $result = mysqli_query($connect,$query);
         
    if($result ->num_rows>0)
    {
        while($row = mysqli_fetch_array($result))
        {
           if ($_GET['id'] == $row['id'])
           {
                $_SESSION['editproduct'] = array( 'id'=>$row['id'],'image'=>$row['image'],'name'=>$row['name'],'price'=>$row['price']);
           }
       }
    }

	if(isset($_POST['editproduct']))
	{
        $filename = $_FILES['image']['name'];
        $filetmpname = $_FILES['image']['tmp_name'];
        $folder = 'images/';
        move_uploaded_file($filetmpname, $folder.$filename);

        $name = isset($_POST['name']) ? $_POST['name']: '';
        $price = isset($_POST['price']) ? $_POST['price']: '';
        $image = isset($_POST['image']) ? $_POST['image']: '';
    
		$query = "SELECT * FROM product";
        $result = mysqli_query($connect,$query);

		if($result ->num_rows>0)
		{
			while($row = $result->fetch_assoc())
			{

				if($row['id'] != $_SESSION['editproduct']['id'])
				{
                    if($name == $row['name'])
				    {
					    $error[]=array('input'=>'name','msg'=>"Enter a unique PRODUCT NAME");
				    }
                }
            }
		}
		
        if(sizeof($error) == 0)
		{
			$x = $_SESSION['editproduct']['id'];
			$query="UPDATE product SET `image`='$filename', `name`='$name', `price`='$price' WHERE `id`=$x";
            $result= mysqli_query($connect,$query);
		
            if($result)
            {
				$message='<span> Product Updated !!!<span>';
            }
		}
    }

    function display()
    {
        $x = $_SESSION['editproduct']['id'];
        $product_name = $_SESSION['editproduct']['name'];

        echo'<div>
                <form enctype = "multipart/form-data" method = "POST" action = "editproduct.php? id= '.$x.'">
                <p>
                    <label for="image">Product Image:<input type="file" name="image" value="'.$_SESSION['editproduct']['image'].'" required>
                    <image src="images/'.$_SESSION['editproduct']['image'].'"></label>
                </p>
                <p>
                    <label for="name">Product Name:<input type="text" name="name" value="'.$product_name.'" required></label>
                </p>
                <p>
                    <label for="price">Product Price:<input type="number" name="price" value="'.$_SESSION['editproduct']['price'].'" required></label>
                </p>
                
                <br>
                <p>
                    <input type="submit" name="editproduct" value="Update">
                </p>
                <br></div>';    
    }
?>

<html>
<head>
	<title>
		Edit Product
	</title>
</head>
<body id=body>
	<div id="wrapper">
		<div id='messages'> 
			<?php echo $message; ?>
		</div>
		<div id='error'>
			<ul id='errormsg'>
			<?php 
                if(sizeof ($error) > 0):
                    
					foreach($error as $errors):
						echo "<li>".$errors['msg']."</li>"; 
                    endforeach;
                    
				endif;
			?>
			</ul>
		</div>
		<div id="editproduct-form">
			<h1>Edit Product</h1>
			<br>
            <?php
                display();
            ?>
			</form>
		</div>
	</div>
</body>
</html>