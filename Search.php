<?php
//https://localhost/Balance/Search?coin=2909
    require 'Connect/BaseConnect.php';
    $currency = array("USD","TWD","JPY","HKD","CNY","MYR","SGD");
    date_default_timezone_set("Asia/Taipei");
    $coin_id = $_GET['coin']??"2909";
    
    $result = mysqli_query($conn,"SELECT * FROM `crypto_price` WHERE `coin_id` = '$coin_id' ORDER BY `quote` ASC");
    
    $m_array = array(
        $currency[0]=>getPrice($currency[0],$conn,$coin_id),
        $currency[1]=>getPrice($currency[1],$conn,$coin_id),
        $currency[2]=>getPrice($currency[2],$conn,$coin_id),
        $currency[3]=>getPrice($currency[3],$conn,$coin_id),
        $currency[4]=>getPrice($currency[4],$conn,$coin_id),
        $currency[5]=>getPrice($currency[5],$conn,$coin_id),
        $currency[6]=>getPrice($currency[6],$conn,$coin_id),
    );
    
    $coin_array = array('base'=>mysqli_fetch_array($result)['coin_name'],'time'=>date("Y/m/d H:i:s"),'data'=>$m_array);
    echo json_encode($coin_array);
    function getPrice($currency,$conn,$coin_id):float{
        $res = mysqli_query($conn,"SELECT * FROM `crypto_price` WHERE `coin_id` = '$coin_id' AND `quote` = '$currency' ORDER BY `quote` ASC");
        return mysqli_fetch_array($res)['price']??0.0;
    }
    
?>