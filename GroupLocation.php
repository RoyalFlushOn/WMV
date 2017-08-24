<?php
	class GroupLocation{

		private int $grpLocalId;
		private string $location;
		private int $noVenues;

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

		function int setGrpLocalId($GrpLocalId){
			$this->grpLocalId = $GrpLocalId;
		}
		function string setLocation($Location){
			$this->location = $Location;
		}
		function int setNoVenues($NoVenues){
			$this->noVenues = $NoVenues;
		}

		function int getGrpLocalId(){
			return $this->grpLocalId;
		}
		function string getLocation(){
			return $this->location;
		}
		function int getNoVenues(){
			return $this->noVenues;
		}
	}
?>