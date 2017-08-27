<?php 

    class SavedSeatingPlan{

        private $savedSeatingPlanId;
	    private $seatingPlan;

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

        function setSavedSeatingPlan($SavedSeatingPlan){
            $this->savedSeatingPlan = $SavedSeatingPlan;
        }
        function setSeatingPlan($SeatingPlan){
            $this->seatingPlan = $SeatingPlan;
        }

        function getSavedSeatingPlan(){
            return $this->savedSeatingPlan;
        }
        function getSeatingPlan(){
            return $this->seatingPlan;
        }
    }

?>