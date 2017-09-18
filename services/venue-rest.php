<?php

    $serverName = 'localhost';
    $username = 'root';
    $password = 'root';
    
            
            try{
                $dbConn = new PDO("mysql:host=$serverName;dbname=WMV", $username, $password);
                $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
            catch (PDOException $e){
                // return 'woops: ' . $e->getMessage();
            }
    

    if(!empty($_GET['ven'])){

        $venue = $_GET['ven'];

        $stmt = $dbConn->prepare('select name from Venue where name like "%' . $venue . '%" order by name;');
        
        // if($stmt->execute()){
        //     $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //     $res = $stmt->fetchAll();
        //     echo json_encode($res);
        // } else {
        //     echo 'Unknown';
        // }

        if($stmt->execute()){

            // while($row = $stmt->fetch()){
            //     $res = $row['name'];
            // }

            $res = $stmt->fetchall(PDO::FETCH_ASSOC);
            
        } else {
            echo 'Error';
        }

        //  print_r(json_encode($res)); //testing
        exit(json_encode($res));

        // $ven = new $Venue();

        // $res = $ven->searchVenue($venue);

        // if($res != null){
        //     echo json_encode($res);
        // }  

          
    }



?>