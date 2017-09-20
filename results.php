<?php 
    include 'app-class/Autoloader.php';

   

    if(!empty($_GET['srchVal'])){
         $grpLocation = $_GET['srchVal'];

         $grpLoc = new GroupLocation();
         $temp = $grpLoc->venuesFromGrpLocation($grpLocation);

        $res = $temp->fetchall(PDO::FETCH_ASSOC);

        $seatPlan = new SeatingPlan();
        
        foreach($res as $ven){
         
            $temp = $seatPlan->seatingPlansFromVenue($ven['venue_id']);
            $rooms[$ven['venue_id']] = $temp->fetchall(PDO::FETCH_ASSOC);
        }

    } else {
        header( 'location: localhost:8888/WMV/');
    }

    
   
    print_r($rooms);


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

<html>
    <body>
        <div>
            <table>   
                <?php

                    $line = '';
                    foreach($res as $ven){
                        $line =  '<tr><td>';
                        $line += $ven['name'] . '</td><td>' . $ven['location'] . '</td><td>' . $ven['rating'] . '</td><td>' . $ven['style'] . '</td>';

                        $temp = $room[$ven['venue_id']];

                        foreach($temp as $room){
                            foreach($room as $name){
                                $line +=  '<td>' . $name['name'] . '</td>';
                            }
                        }
                        $line += '</tr>';
                    }

                    echo $line;
                ?>
            </table>
        </div>
    </body>