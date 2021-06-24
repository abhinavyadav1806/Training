<?php 
    session_start();
    include ("config.php");
    $error = array();

    if(isset($_POST['update']))
    {
        $username = isset($_POST['username']) ? ($_POST['username']) : "";
        $password = isset($_POST['password']) ? ($_POST['password']) : "";
        $repassword = isset($_POST['password2']) ? ($_POST['password2']) : "";
        $email = isset($_POST['email']) ? ($_POST['email']) : "";

        if($password != $repassword)
        {
            $error[] = array('input' => 'password', 'msg' => 'PASSWORD DONT MATCH');
        }

        $sql = "SELECT * FROM data ";
        
        $result= mysqli_query($connect,$sql);
        if($result->num_rows > 0)
		{
			while($row=$result->fetch_assoc())
			{
                $_SESSION['user']=array('username'=>$row['username'],'email'=>$row['email']);
                
				if($_SESSION['user']['username'] == $username)
				{
					$error[]=array('input'=>'user','msg'=>"Enter UNIQUE USERNAME");
				}
				if($_SESSION['user']['email'] == $email)
				{
					$error[]=array('input'=>'email','msg'=>"Enter UNIQUE EMAIL");
				}
			}
		}


        if(sizeof($error) == 0)
        {
            $x = $_SESSION['userdata']['userid'];
            $update = "UPDATE data set username = '$username', password = '$password', email = '$email' WHERE id = $x";
            
            if($connect ->query($update) === TRUE)
            {
                echo "New Update Added Successfully";
            }
            else
            {
                $error[] = array('input' => 'form' , 'msg' => $connect->error);
                //echo "Error: " .$update. "<br>" . $connect->error;
            }  
            $connect->close();
        }
    }
?>
<head>
    <title>
        Update
    </title>
</head>
<body>
   <div id="wrapper">
        <div id="update-form">
        <div><?php if(isset($message)) { echo $message; } ?>
            <h2>Update</h2>
            <form action="" method="POST">
                <p>
                    <label for="username">Username:<input type="text" name="username" value="<?php echo $_SESSION['userdata']['username']; ?>" required></label>
                </p>
                <p>
                    <label for="password">Password:<input type="password" name="password"  value="<?php echo $_SESSION['userdata']['password']; ?>"required></label>
                </p>
                <p>
                    <label for="password2">Re-Password:<input type="password" name="password2" required></label>
                </p>
                <p>
                    <label for="email">Email:<input type="email" name="email"  value="<?php echo $_SESSION['userdata']['username']; ?>"required></label>
                </p>
                <p>
                    <input type="submit" name="update" value="Update">
                </p>
            </form>
        </div>
    </div>
</body>
</html>