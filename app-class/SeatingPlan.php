<?php
    include ('app-class/Autoloader.php');

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
        
        function seatingPlansFromVenue($id){
            $db = new DataAccess();
			
            $stmt = $db->returnQuery('select spl.seating_plan_id, spl.name from Seating_Plans spl inner join Venue v on spl.seating_prof_id = v.seating_prof_id where v.venue_id = ' . $id);
            
            if($stmt->execute()){
                return $stmt;
            } else {
                return false;
            }
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