<?php
	include 'app-class/AutoLoader.php';

	class GroupLocation{

		private $grpLocalId;
		private $location;
		private $noVenues;

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

		function listOfGroupLocations(){

			$dt = new DataAccess();

			$stmt = $dt->returnQuery('select location from Group_Location order by location');
			
			if($stmt->execute()){
				return $stmt;
			} else {
				return false;
			}
		}

		function venuesFromGrpLocation($grploc){
			$db = new DataAccess();
			$stmt = $db->returnQuery('select vn.venue_id, vn.name, grl.location, vn.rating, spr.style from Venue vn join Group_Location grl on vn.group_local_id = grl.group_local_id join Seating_Profile spr on vn.seating_prof_id = spr.seating_prof_id where grl.location = "' . $grploc . '"');

			if($stmt->execute()){
				return $stmt;
			} else {
				return false;
			}
		}

		function setGrpLocalId($GrpLocalId){
			$this->grpLocalId = $GrpLocalId;
		}
		function setLocation($Location){
			$this->location = $Location;
		}
		function setNoVenues($NoVenues){
			$this->noVenues = $NoVenues;
		}

		function getGrpLocalId(){
			return $this->grpLocalId;
		}
		function getLocation(){
			return $this->location;
		}
		function getNoVenues(){
			return $this->noVenues;
		}
	}
?>