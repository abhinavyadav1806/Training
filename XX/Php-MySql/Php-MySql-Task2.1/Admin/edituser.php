<?php 
    session_start();
    include "../config.php";
    $error = array();

    $query = "SELECT * FROM data";
    $result = mysqli_query($connect,$query);
        
    if($result->num_rows>0)
    {
        while($row = mysqli_fetch_array($result))
        {
            if($row['id'] == $_GET['id'])
            {
                $_SESSION['editdata'] = array('userid'=>$row['id'], 'userrole'=>$row['role'], 'username'=>$row['username'], 'password'=>$row['password'], 'email'=>$row['email']);
            }
        }
    }

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
            $update = "UPDATE data set username = '$username', password = '$password', email = '$email' WHERE id = $x";
            if($connect ->query($update) === TRUE)
            {
                echo "New Update Added Successfully";
                header("Location: manageusers.php");
            }
            else
            {
                $error[] = array('input' => 'form' , 'msg' => $connect->error);
            }  
            $connect->close();
        }
    }

    function display()
    {
        $x = $_SESSION['editdata']['userid'];
        echo"<div id='update-form'>
            <h1>Update</h1>
            <form method='POST' action='edituser.php?id=".$x."'>
                <p>
                    <label for='role'>Role: <select name='role' required><option value='customer'>Customer</option> <option value='admin'>Admin</option> <option value='manager'>Manager</option></select></label>
                </p>
                <p>
                    <label for='userid'>Userid: <input type='text' name='userid' value=".$_SESSION['editdata']['userid']." readonly required></label>
                </p>
                <p>
                    <label for='username'>Username: <input type='text' name='username' value=".$_SESSION['editdata']['username']."  required></label>
                </p>
                <p>
                    <label for='password'>Password: <input type='password' name='password' value=".$_SESSION['editdata']['password']." required></label>
                </p>
                <p>
                    <label for='password2'>Re-Password: <input type='password' name='password2' required></label>
                </p>
                <p>
                    <label for='email'>Email: <input type='email' name='email'  value=".$_SESSION['editdata']['email']." required></label>
                </p>
                <p><input type='submit' name='edituser' value='EDIT USER'></p>
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
        <div id="edituser-form">
        <div><?php if(isset($message)) { echo $message; } ?>
        <?php display() ?>
        </div>
    </div>
</body>
</html>