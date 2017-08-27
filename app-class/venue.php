<?php

    class Venue extends Location{

        private $venueId;
        private $name;
        private $groupLocal;
        private $type;
        private $capacit;
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


        function setVenueId ($VenueId){
            $this->venueId = $VenueId;
        }
        function setName($Name){
            $this->name = $Name;
        }
        function setLocal ($Local){
            $this->local = $Local;
        }
        function setGroupLocal ($GroupLocal){
            $this->groupLocal = $GroupLocal;
        }
        function setType ($Type){
            $this->type = $Type;
        }
        function setCapacity($Capacity){
            $this->capacit = $Capacity;
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
        function getLocal (){
            return $this->local;
        }
        function getGroupLocal (){
            return $this->groupLocal;
        }
        function getType (){
            return $this->type;
        }
        function getCapacity(){
            return $this->capacit;
        }
        function getSeatingProf (){
            return $this->seatingProf;
        }
        function getRating(){
            return $this->rating;
        }
    }
?>