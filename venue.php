<?php 
    include 'app-Class/Autoloader.php';

    if($_GET['venue']){

        $venueName =  $_GET['venue'];
        
        $venue = new Venue($venueName);

        //print_r($venue);

        if(empty($venue->getName())){
            echo '<script>
                        location.href = "http://localhost:8888/WMV";
                </script>';
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