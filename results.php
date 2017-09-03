<?php 

    $grpLocation = '';

    $serverName = 'localhost';
    $username = 'root';
    $password = 'root';
            
    try{
        $dbConn = new PDO("mysql:host=$serverName;dbname=WMV", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }
    catch (PDOException $e){
        echo 'woops: ' . $e->getMessage();
    }

   

    if(!empty($_GET['srchVal'])){
         $grpLocation = $_GET['srchVal'];
    } else {
        header( 'location: localhost:8888/WMV/');
    }

    


    /*
    check $get is not empty,
        if empty send bk to homepage
    
    retrive all venues in that group location
        that includes:
                venue data
                seating data
    
    create an array of these venue obj and seat obj

    display these results in a table

    create a json session value with venue results
    */
?>