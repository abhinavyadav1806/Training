<?php

// common variables and constants.
global $cart;
global $products;
global $grandtotal;
global $mydb;
global $_SESSION;


    //--------------------- DATABASE VARIABLES ---------------------

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";
  
    //--------------------- MAKING CONNECTION ---------------------

    $connect = new mysqli($servername, $username, $password, $dbname);
?>
