<?php
    session_start();
    include ("config.php");
    $error = array();
    
    if(isset($_POST['submit']))
    {
        $username = isset($_POST['username']) ? ($_POST['username']) : "";
        $password = isset($_POST['password']) ? ($_POST['password']) : "";
       
        if(sizeof($error) == 0)
        {  
            $insert = "SELECT * FROM data WHERE 
            `username` = '".$username."' AND `password` = '".$password."' ";
            $result = $connect ->query ($insert);
        
            
            if ($result->num_rows > 0) 
            {
                // output data of each row
                while($row = $result->fetch_assoc()) 
                {
                    $_SESSION['userdata'] = array('userid'=>$row['id'], 'username'=>$row['username'], 'password'=>$row['password'], 'email'=>$row['email']);
                    header('Location:member.php');
                }
            } 
            else 
            {
                $error[] = array('input' => 'form' , 'msg' => 'INVALID LOGIN DETAILS');
            }
            $connect->close();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Login
	</title>
</head>
<body>
    
    <h2>Login</h2>
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
    <form action="" method="POST">
        <p>
            <label for="username">Username: <input type="text" name="username" required></label>
        </p>
        <p>
            <label for="password">Password: <input type="password" name="password" required></label>
        </p>
        <p>
            <input type="submit" name="submit" value="Submit">
        </p>
    </form>

</body>
</html>