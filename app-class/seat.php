<?php

    class Seat{
        
        private $seatingId;
        private $seatName;
        private $rating;
        private $imagePath;

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
        
        function __construct4($a1,$a2,$a3,$a4){

            $this->seatingId = $a1;
            $this->seatName = $a2;
            $this->rating = $a3;
            $this->imagePath = $a4;
        }

        function setSeatingId($SeatingId){
            $this->seatingId = $SeatingId;
        }
        function setSeatName($SeatName){
            $this->seatName = $SeatName;
        }
        function setRoom($Room){
            $this->room = $Room;
        }
        function setRating($Rating){
            $this->rating = $Rating;
        }
        function setImagePath($ImagePath){
            $this->imagePath = $ImagePath;
        }

         function getSeatingId(){
            return $this->seatingId;
        }
        function getSeatName(){
            return $this->seatName;
        }
        function getRoom(){
            return $this->room;
        }
        function getRating(){
            return $this->rating;
        }
        function getImagePath(){
            return $this->imagePath;
        }
    }

?>