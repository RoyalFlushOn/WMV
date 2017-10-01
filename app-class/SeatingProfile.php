<?php
    include 'app-class/Autoloader.php';

    class SeatingProfile{

        private $seatingProfId;
        private $multiRoom;
        private $style;
        private $seatingPlan = array();

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
            $dtAcc = new DataAccess();

            $stmt = $dtAcc->returnQuery('select * from Seating_Profile where seating_prof_id = '. $a1);

            $prof = $stmt->fetchall(PDO::FETCH_ASSOC);

            $this->seatingProfId = $prof['seating_prof_id'];
            $this->multiRoom = $prof['multi_room'];
            $this->style = $prof['style'];
            $this->seatingPlan = new SeatingPlan($a1);            
        }
        
        function __construct3($a1,$a2,$a3){

            $dtAcc = new DataAccess();
            
            $stmt = $dtAcc->returnQuery('select * from Seating_Plans where seating_prof_id = '. $a1);
            
            $plans = $stmt->fetchall(PDO::FETCH_ASSOC);

            $this->seatingProfId = $a1;
            $this->multiRoom = $a2;
            $this->style = $a3;

            foreach($plans as $plan){
                $seating = new SeatingPlan($plan['seating_plan_id'],
                                            $plan['name']);
                                            
                $this->seatingPlan[] = $seating;
            }
        }

        function setSeatingProfId($SeatingProfId){
            $this->seatingProfId = $SeatingProfId;
        }
        function setMultiRoom($MultiRoom){
            $this->multiRoom = $MultiRoom;
        }
        function setStyle($Style){
            $this->style = $Style;
        }
        function setSeatingPlan($SeatingPlan){
            $this->seatingPlan = $SeatingPlan;
        }

        function getSeatingProfId(){
            return $this->seatingProfId;
        }
        function getMultiRoom(){
            return $this->multiRoom;
        }
        function getStyle(){
            return $this->style;
        }
        function getSeatingPlan(){
            return $this->seatingPlan;
        }
    }
?>