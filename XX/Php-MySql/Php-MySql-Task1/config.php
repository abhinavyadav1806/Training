<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mydb";

  //MAKING CONNECTION
  $connect = new mysqli($servername, $username, $password, $dbname);

  // --------------Check connection---------------

  // if ($connect->connect_error) {
  //   die("Connection failed: " . $connect->connect_error);
  // }
  // echo "Connected successfully";

  //-----------------CREATE TABLE-------------------

  $sql = "CREATE TABLE data(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(50), password VARCHAR(20), email VARCHAR(50))";

  // if ($connect->query($sql) === TRUE) 
  //   {
  //     echo "Table Data created successfully";
  //   } 
  //   else 
  //   {
  //     echo "Error creating table: " . $connect->error;
  //   }
?>