<?php
    class Venue extends Location{
        
        private int venueId;
        private string name;
        private GroupLocation grpLocal;
        private string type;
        private int capacity;
        private SeatingProfile seatingProf;
        private string rating;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
                
            if(method_exists($this, $f='__construct'.$i)){
                call_user_func_array(array($this,$f), $a);
            }
        }

        function __construct0(){
            //default constructor
        }

        function int setVenueId($VenueId){
            $this->venueId = $VenueId;
        }

        function string setName($Name){
            $this->name = $Name;
        }

        function GroupLocation setGrpLocal($GrpLocal){
            $this->grpLocal = $GrpLocal;
        }

        function string setType($Type){
            $this->type = $Type;
        }

        function int setCapacity($Capacity){
            $this->capacity = $Capacity;
        }

        function SeatingProfile setSeatingProf($SeatingProf){
            $this->seatingProf = $SeatingProf;
        }

        function string setRating($Rating){
            $this->rating = $Rating;
        }

        function int getVenueId(){
            return $this->venueId; 
        }

        function string getName(){
            return $this->name; 
        }

        function GroupLocation getGrpLocal(){
            return $this->grpLocal; 
        }

        function string getType(){
            return $this->type; 
        }

        function int getCapacity(){
            return $this->capacity; 
        }

        function SeatingProfile getSeatingProf(){
            return $this->seatingProf; 
        }

        function string getRating(){
            return $this->rating; 
        }
    }
?>