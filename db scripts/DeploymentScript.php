<?php
    $serverName = 'localhost';
    $username = 'root';
    $password = 'root';
      
    try{
    $dbConn = new PDO("mysql:host=$serverName;dbname=test", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo 'done and dusted connected </br>';
    }
    catch (PDOException $e){
    echo 'woops: ' . $e->getMessage();
    }

    $order = array();
    $order = file('deployment-order.txt');

    foreach($order as $fileNm){
        $path = $fileNm;
        $query = file_get_contents($path);
        $stmt = $dbConn->prepare($query);
    }

    if($stmt->execute()){
        echo 'done';
    } else {
        echo 'fail';
    }
    $dbConn = null;
?>