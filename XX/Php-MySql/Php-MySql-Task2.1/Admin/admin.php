<?php
    session_start();

    include "../config.php";
   
    echo "<h1> Welcome ".$_SESSION['userdata']['username']."</h1>";

    echo 
    '<ul class = "navigation">
        <li><a href="">MENU</a>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="#">Products</a>
                    <ul>
                        <li><a href="manageproducts.php">Manage</a></li>
                        <li><a href="addproduct.php">Add</a></li>
                    </ul>
                </li>
                <li><a href="#">User</a>
                    <ul>
                        <li><a href="manageusers.php">Manage</a></li>
                        <li><a href="adduser.php">Add</a></li>
                    </ul>
                </li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </li>    
    </ul>';
?>


<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
</html>
