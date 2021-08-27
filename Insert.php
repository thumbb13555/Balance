<?php
    require 'Connect/BaseConnect.php';
    //https://localhost/Balance/Insert?coin=2909&name=LikeCoin&price=0.5&quote=TWD
    $coin_id = $_GET['coin']??"2909";
    $coin_name = $_GET['name']??"LikeCoin";
    $price = $_GET['price']??"";
    $quote = $_GET['quote']??"";
    $id = 0;
    
    if(empty($quote)|| empty($price)){
        echo "error";
        exit();

    }
    $search = mysqli_query($conn,"SELECT * FROM `crypto_price` WHERE `coin_id` = '$coin_id' AND `quote` = '$quote'");
    $sql = "INSERT INTO `crypto_price`(`coin_id`, `coin_name`, `price`, `quote`) 
        VALUES ('$coin_id','$coin_name','$price','$quote')";

    if(empty(mysqli_fetch_array($search))){
        echo "Insert: ". runFunction($conn,$sql);
    }else{
        $search = mysqli_query($conn,"SELECT * FROM `crypto_price` WHERE `coin_id` = '$coin_id' AND `quote` = '$quote'");
        while($row = mysqli_fetch_array($search)){
            $id = $row['id'];
            $sql_update = "UPDATE `crypto_price` SET `price`='$price',`date_time`= CURRENT_TIMESTAMP WHERE `id` = '$id'";
            echo "Update: ". runFunction($conn,$sql_update);
        }
        
    }
    function runFunction($conn, $sql):string{
        if ($conn->query($sql) === TRUE) {
            return "Insert Success";
        } else {
            return "Insert faild";
        }
    }

    $conn->close();
?>