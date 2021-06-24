<?php  
    session_start();

    if($_SESSION['userdata']['username']) 
    {
       echo "<h1> Welcome ".$_SESSION['userdata']['username']." </h1> Click here to <a href='logout.php'> Logout </a> <br> Click here to <a href='update.php'> Update </a>";
    }
?>