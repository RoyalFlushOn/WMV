<?php session_start();
    include 'app-Class/Autoloader.php';

    if($_GET['dbVenue']){
        $dbVen = $_GET['dbVenure'];

        if($dbVen){
            if($_GET['venue']){
                
                $venueName =  $_GET['venue'];

                $ven = new Venue();
                $res = $ven->searchVenue($venueName);

                print_r($res);
        } else {
            if($_GET['venue']){
                
                $venueName =  $_GET['venue'];
                
                $venue = new Venue($venueName);
        
                //print_r($venue);
        
                if(empty($venue->getName())){
        
                    $msg = new Message();
        
                    $msg->message = 'The venue you have searched for is incorrorect, please use the search function in the menue below.';
                    $msg->type=  'info';
                    $msg->msgFlag=true;
                    $msg->responceFlag =false;
        
                    $_SESSION['message'] = json_encode($msg);
        
                    echo '<script>
                                location.href = "http://localhost:8888/WMV";
                        </script>';
            }
        }
    }

    
    }
?>

<ul>
    <li><?php echo $venue->getVenueId();?></li>
    <li><?php echo $venue->getName(); ?></li>
    <li><?php echo $venue->getLocalId(); ?></li>
    <li><?php echo $venue->getCityTown(); ?></li>
    <!-- <li><?php //echo $venue->get?></li>
    <li><?php //echo $venue->get?></li>
    <li><?php //echo $venue->get?></li>
    <li><?php //echo $venue->get?></li>
    <li><?php //echo $venue->get?></li>
    <li><?php //echo $venue->get?></li>
    <li><?php //echo $venue->get?></li>
    <li><?php //echo $venue->get?></li>
    <li><?php //echo $venue->get?></li>
    <li><?php //echo $venue->get?></li> -->
</ul>