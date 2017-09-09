<?php 
    include 'appClas/Autoloader.php';

    if($_GET['venue']){
        $venueName =  $_GET['venue'];

        $ven = new Venue();
        $venue = new Venue();

        $venue = $ven->getVenue($venueName);

        display($venue);
    }
    

    // echo $_GET['db'];
?>

<ul>
    <li><?php echo $venue->getVenueId();?></li>
    <li><?php echo $venue->getName(); ?></li>
    <li><?php echo $venue->getLocal(); ?></li>
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