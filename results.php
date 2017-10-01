<?php 
    include 'app-class/Autoloader.php';

    if(!empty($_GET['srchVal'])){
        $grpLocation = $_GET['srchVal'];

        $grpLoc = new GroupLocation();
        $temp = $grpLoc->venueList($grpLocation);

        $res = $temp->fetchall(PDO::FETCH_ASSOC);
       
       // print_r($res);

        foreach($res as $ven){

            $venue = new Venue($ven['venue_id'],
                                $ven['name'],
                                $ven['location'],
                                $ven['style'],
                                $ven['seating_prof_id'],
                                $ven['rating'],
                                $ven['capacity'],
                                $ven['local_id']);
            $VenRes[$ven['venue_id']] = $venue;
       }

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

<html>
    <body>
        <div>
            <table>   
                <?php

                    $line = '<tr><td>Venue</td>';
                    $line .= '<td>Loaction</td>';
                    $line .= '<td>Type</td>';
                    $line .= '<td>Rating</td>';
                    $line .= '<td>Room/Section</td>';
                    $line .= '<td>Room/Section</td>';
                    $line .= '<td>Room/Section</td>';
                    $line .= '</tr>';

                    foreach($VenRes as $venue){
                        $line .= '<tr><td><a href="' . $_SERVER . '/' . $venue->getVenueId(). '">' . $venue->getName(). '</a></td>';
                        $line .= '<td>' . $venue->getGroupLocal(). '</td>';
                        $line .= '<td>' . $venue->getType() . '</td>';
                        $line .= '<td>' . $venue->getRating() . '</td>';                    

                        $prof = $venue->getSeatingProf();
                        foreach($prof->getSeatingPlan() as $plan ){
                            
                            $line .= '<td><button id="'. $plan->getSeatingPlanId() .'">' . $plan->getName() .'</button></td>';
                        }

                        $line .= '</tr>';
                    }

                    echo $line;
                ?>
            </table>
        </div>
    </body>