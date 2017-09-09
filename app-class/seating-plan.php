<?php

    class SeatingPlan{

        private $seatingPlanId;
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

        function setSeatingPlanId($SeatingPlanId){
            $this->seatingPlanId = $SeatingPlanId;
        }
        function setSeating($Seating){
            $this->seating = $Seating;
        }

        function getSeatingPlanId(){
            return $this->seatingPlanId;
        }
        function getSeating(){
            return $this->seating;
        }
    }

?>