<?php

    include '../app-class/Autoloader.php';

    // $responce = array();
    

    if(!empty($_GET['ven'])){

        $responce['venues'] = array();

        $db = new DataAccess();

        $venue = $_GET['ven'];

        $stmt = $db->returnQuery('select name from Venue where name like "%' . $venue . '%" order by name');

        if($stmt){
            $res = $stmt->fetchall(PDO::FETCH_ASSOC);
            
            foreach($res as $val){

                array_push($responce['venues'], array("venue" => $val['name'], 
                                                        "link" => 'http://localhost:8888/WMV/venue.php?venue='. htmlentities($val['name'])));
            }

            echo json_encode($responce);
                
        } else {
            echo 'Error';
        }

         //var_dump(json_encode($responce)); //testing
       

          

          
    }



?>