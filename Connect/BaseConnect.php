<?php
    $servername = "localhost";
    $username = "root";
    $password = "tuba21031";
    $database = "my_app_request";
    $coin_id = "2909";
    $coin_name = "LikeCoin";
    $price = 0.6;
    $quote = "";
    
    $conn = new mysqli($servername, $username, $password,$database);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>