<?php
    include 'app-class/Autoloader.php';

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
            
            $stmt = $db->returnQuery('select * from Venue v join Location l on v.local_id = l.local_id
                                where v.name ="' . $a1 . '"');

            
            $res = $stmt->fetch(PDO::FETCH_ASSOC);

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

        function __construct8($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8){

            $db = new DataAccess();

            $stmt = $db->returnQuery('select * from Seating_Profile where seating_prof_id = '. $a5);

            $prof = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->venueId = $a1;
            $this->name = $a2;
            $this->groupLocal = $a3;
            $this->type = $a4;
            $this->seatingProf = new SeatingProfile($prof['seating_prof_id'],
                                                    $prof['multi_room'],
                                                    $prof['style']);
            $this->rating = $a6;
            $this->capacit = $a7;
            $this->localId = $a8;
            
            $stmt = $db->returnQuery('select * from Location where local_id = ' . $a8);

            $temp = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->addLine1 = $temp['add_line_1'];
            $this->addLine2 = $temp['add_line_2'];
            $this->addLine3 = $temp['add_line_3'];
            $this->addLine4 = $temp['add_line_4'];
            $this->cityTown = $temp['city_town'];
            $this->postcode = $temp['postcode'];

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
        }

        function searchVenue($name){
            $db = new DataAccess();
            
            $temp = $db->returnQuery('select * from Venue v join Location l on v.local_id = l.local_id
                                where v.name like "%' . $name . '%" order by name;');

            return $res = $temp->fetchall();
        }

        function toJson(){
            
        }

        function setVenueId ($VenueId){
            $this->venueId = $VenueId;
        }
        function setName($Name){
            $this->name = $Name;
        }
        function setGroupLocal($GroupLocal){
            $this->groupLocal = $GroupLocal;
        }
        function setType ($Type){
            $this->type = $Type;
        }
        function setCapacity($Capacity){
            $this->capacity = $Capacity;
        }
        function setSeatingProf($SeatingProf){
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

        function getGroupLocal(){
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