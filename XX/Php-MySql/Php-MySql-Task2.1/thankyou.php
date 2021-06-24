<?php

    include("config.php");
    session_start();

    if(!$_SESSION['userdata'])
    {
        header("Location: sign_up.php");
    }

    $carts = json_encode($_SESSION['cart']);
    //print_r($carts);

    $xy = $_SESSION['userdata']['userid'];
    //echo $xy;

    foreach ($_SESSION['cart'] as $key => $value) 
    {
        global $grandtotal;
        $grandtotal += $value['quantity'] * $value['price'];
    }
    
    $sql = "INSERT into orders(`userid`, `cartdata`, `date_time`, `carttotal`, `status`) VALUES(' $xy', '$carts', NOW(), '$grandtotal', 'PENDING')";
    mysqli_query($connect, $sql);

?>
<html>
    <body>
        <link rel ="stylesheet" href="style.css">
        <h1>Thankyou for shopping with us..!!</h1>

        <?php unset($_SESSION['cart']) ?>

        <div id="foot">
            <nav>
                <br><br><br><a href="continueshopping.php" id="shop">Continue Shop<a>
                <a href="logout.php" id="logout">LogOut<a>
            </nav>
        </div>
    </body> 
</html>