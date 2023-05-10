<?php
$servername = "127.0.0.1";
$username = "sympadmin";
$password = "sympadmin";

// Create connection
 $conn = new mysqli($servername, $username, $password,'symposia');
//echo $conn;
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
   }
   echo "Connected successfully";
   ?>
