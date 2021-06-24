<?php 
    session_start();
    include "../config.php";
    $error = array();

    if(isset($_POST['edituser']))
    {   
        $role = isset($_POST['role']) ? ($_POST['role']) : "";
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
            $x = $_SESSION['editdata']['userid'];
            $insert = "INSERT INTO data(`role`, `username` , `password` , `email`) VALUES('$role', '$username', '$password', '$email')";
            if($connect ->query($insert) === TRUE)
            {
                //echo "New Record Added Successfully";
                header("Location:admin.php");
            }
            else
            {
                $error[] = array('input' => 'form' , 'msg' => $connect->error);
                //echo "Error: " .$insert. "<br>" . $connect->error;
            }  
            $connect->close();
        }
    }

    function display()
    {
        echo"<div id='update-form'>
            <h1>ADD USER</h1>
            <form method='POST' action=''>
                <p>
                    <label for='role'>Role: <select name='role' required><option value='customer'>Customer</option> <option value='admin'>Admin</option> <option value='manager'>Manager</option></select></label>
                </p>
                <p>
                    <label for='userid'>Userid: <input type='text' name='userid' required></label>
                </p>
                <p>
                    <label for='username'>Username: <input type='text' name='username' required></label>
                </p>
                <p>
                    <label for='password'>Password: <input type='password' name='password' required></label>
                </p>
                <p>
                    <label for='password2'>Re-Password: <input type='password' name='password2' required></label>
                </p>
                <p>
                    <label for='email'>Email: <input type='email' name='email' required></label>
                </p>
                <p><input type='submit' name='edituser' value='ADD USER'></p>
                <br>
            </form>
        </div>";
    }
?>

<head>
    <title>
        Update
    </title>
</head>
<body>
   <div id="wrapper">
        <div id="adduser-form">
            <div id="error">
                <ul>
                    <?php if (sizeof($error) > 0)
                        {
                            foreach($error as $errors)
                            {
                                echo "<li>";
                                    echo $errors['msg'];
                                echo "</li>";
                            }
                        }  
                    ?>
                </ul>    
            </div>
        <div>
            <?php if(isset($message)) { echo $message; } ?>
        </div>
        <?php display()?>
    </div>
</body>
</html>