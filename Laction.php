<?php
	/**
	* 
	*/
	class Location{

		private int $localId;
		private string $addLine1;
		private string $addLine2;
		private string $addLine3;
		private string $addLine4;
		private string $cityTown;
		private string $postcode;

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

		function int setLocalId($LocalId){
			$this->localId = $LocalId;
		}
		function string setAddLine1($AddLine1){
			$this->addLine1 = $AddLine1;
		}
		function string setAddLine2($AddLine2){
			$this->addLine2 = $AddLine2;
		}
		function string setAddLine3($AddLine3){
			$this->addLine3 = $AddLine3;
		}
		function string setAddLine4($AddLine4){
			$this->addLine4 = $AddLine4;
		}
		function string setCityTown($CityTown){
			$this->cityTown = $CityTown;
		}
		function string setPostcode($Postcode){
			$this->postcode = $Postcode;
		}

		function int getLocalId(){
			return $this->localId;
		}
		function string getAddLine1(){
			return $this->addLine1;
		}
		function string getAddLine2(){
			return $this->addLine2;
		}
		function string getAddLine3(){
			return $this->addLine3;
		}
		function string getAddLine4(){
			return $this->addLine4;
		}
		function string getCityTown(){
			return $this->cityTown;
		}
		function string getPostcode(){
			return $this->postcode;
		}
	}
?>