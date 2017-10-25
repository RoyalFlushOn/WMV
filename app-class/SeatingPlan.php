<?php
    include ('app-class/Autoloader.php');

    class SeatingPlan{

        private $seatingPlanId;
        private $name;
	    private $seating = array();

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
            
            $temp = array();
            $db = new DataAccess();
			
            $stmt = $db->returnQuery('select name from Seating_Plans where seating_plan_id = ' . $a1);

            $res = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->seatingPlanId = $a1;
            $this->name = $res['name'];
            $this->seating = $this->retriveSeats($a1);

            
        }

        function __construct2($a1,$a2){
            

            $this->seatingPlanId = $a1;
            $this->name = $a2;
            $this->seating = $this->retriveSeats($a1);

            
        }

        // function __construct3()
		// {
		// 	//default contructor
        // }

        function retriveSeats($id){

            $temp = array();
            $db = new DataAccess();
			
            $stmt = $db->returnQuery('select * from Seating where seating_plan_id = ' . $id);

            $seats = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($seats as $seat){

                $st = New Seat($seat['seating_id'], 
                                    $seat['seat_name'], 
                                    $seat['rating'],
                                    $seat['image_path']);
                $temp[$seat['seating_id']] = $st;
            }

            return $temp;
        }

        function setSeatingPlanId($SeatingPlanId){
            $this->seatingPlanId = $SeatingPlanId;
        }
        function setName($Name){
            $this->name = $Name;
        }
        function setSeating($Seating){
            $this->seating = $Seating;
        }

        function getSeatingPlanId(){
            return $this->seatingPlanId;
        }
        function getName(){
            return $this->name;
        }
        function getSeating(){
            return $this->seating;
        }
    }

?>