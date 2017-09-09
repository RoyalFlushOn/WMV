<?php

    class Favourites extends SavedSeatingPlan{

        private $seating;

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

            function setSeating($Seating){
                $this->seating = $Seating;
            }

            function getSeating(){
                return $this->seating;
            }
    }

?>