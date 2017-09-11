<?php
    include 'app-Class/Autoloader.php';

    class Venue extends Location{

        private $venueId;
        private $name;
        private $groupLocal;
        private $type;
        private $capacity;
        private $seatingProf;
        private $rating;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
                
            if(method_exists($this, $f='__construct'.$i)){
                call_user_func_array(array($this,$f), $a);
            }
        }
		
		function __construct0()
		{
			//default contructor
        }
        
        function __construct1($a1){

            $db = new DataAccess();
            
            $temp = $db->returnQuery('select * from Venue v join Location l on v.local_id = l.local_id
                                where v.name ="' . $a1 . '"');

            
            $res = $temp->fetch(PDO::FETCH_ASSOC);

            $this->venueId = $res['venue_id'];
            $this->name = $res['name'];
            $this->groupLocal = $res['group_local_id'];
            $this->type = $res['type'];
            $this->capacit = $res['capacity'];
            $this->seatingProf = $res['seating_prof_id'];
            $this->rating = $res['rating'];
            $this->localId = $res['local_id'];
            $this->addLine1 = $res['add_line_1'];
            $this->addLine2 = $res['add_line_2'];
            $this->addLine3 = $res['add_line_3'];
            $this->addLine4 = $res['add_line_4'];
            $this->cityTown = $res['city_town'];
            $this->postcode = $res['postcode'];
            
        }

        function __construct7($a1,$a2,$a3,$a4,$a5,$a6,$a7){

            $this->venueId = $a1;
            $this->name = $a2;
            $this->groupLocal = $a3;
            $this->type = $a4;
            $this->capacit = $a5;
            $this->seatingProf = $a6;
            $this->rating = $a7;

        }

        function __construct14($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14){
            $this->venueId = $a1;
            $this->name = $a2;
            $this->groupLocal = $a3;
            $this->type = $a4;
            $this->capacit = $a5;
            $this->seatingProf = $a6;
            $this->rating = $a7;
            $this->localId = $a8;
            $this->addLine1 = $a9;
            $this->addLine2 = $a10;
            $this->addLine3 = $a11;
            $this->addLine4 = $a12;
            $this->cityTown = $a13;
            $this->postcode = $a14;
            
        }

        

        function getVenue($name){
            $db = new DataAccess();

            $temp = $db->returnQuery('select * from Venue v join Location l on v.local_id = l.local_id
                                where v.name ="' . $name . '"');

            return $res = $temp->fetchall();

            // return $ven = new Venue($res['venue_id'],$res['name'],$res['group_local_id'],$res['type'],$res['capacity'],$res['seating_prof_id'],
            //                             $res['rating'],$res['local_id'],$res['add-line_1'],$res['add-line_2'],$res['add-line_3'],
            //                             $res['add-line_4'],$res['city_town'],$res['postcode']);
        }


        function setVenueId ($VenueId){
            $this->venueId = $VenueId;
        }
        function setName($Name){
            $this->name = $Name;
        }
        function setGroupLocal ($GroupLocal){
            $this->groupLocal = $GroupLocal;
        }
        function setType ($Type){
            $this->type = $Type;
        }
        function setCapacity($Capacity){
            $this->capacity = $Capacity;
        }
        function setSeatingProf ($SeatingProf){
            $this->seatingProf = $SeatingProf;
        }
        function setRating($Rating){
            $this->rating = $Rating;
        }

        function getVenueId (){
            return $this->venueId;
        }
        function getName(){
            return $this->name;
        }

        function getGroupLocal (){
            return $this->groupLocal;
        }
        function getType(){
            return $this->type;
        }
        function getCapacity(){
            return $this->capacity;
        }
        function getSeatingProf(){
            return $this->seatingProf;
        }
        function getRating(){
            return $this->rating;
        }
    }
?>