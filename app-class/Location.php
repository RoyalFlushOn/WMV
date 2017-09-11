<?php
	/**
	* 
	*/
	abstract class Location{

		protected $localId;
		protected $addLine1;
		protected $addLine2;
		protected $addLine3;
		protected $addLine4;
		protected $cityTown;
		protected $postcode;

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

		function __construct7($a1,$a2,$a3,$a4,$a5,$a6,$a7){
			
			$this->localId = $a1;
			$this->addLine1 = $a2;
			$this->addLine2 = $a3;
			$this->addLine3 = $a4;
			$this->addLine4 = $a5;
			$this->cityTown = $a6;
			$this->postcode = $a7;
		}

		function setLocalId($LocalId){
			$this->localId = $LocalId;
		}
		function setAddLine1($AddLine1){
			$this->addLine1 = $AddLine1;
		}
		function setAddLine2($AddLine2){
			$this->addLine2 = $AddLine2;
		}
		function setAddLine3($AddLine3){
			$this->addLine3 = $AddLine3;
		}
		function setAddLine4($AddLine4){
			$this->addLine4 = $AddLine4;
		}
		function setCityTown($CityTown){
			$this->cityTown = $CityTown;
		}
		function setPostcode($Postcode){
			$this->postcode = $Postcode;
		}

		function getLocalId(){
			return $this->localId;
		}
		function getAddLine1(){
			return $this->addLine1;
		}
		function getAddLine2(){
			return $this->addLine2;
		}
		function getAddLine3(){
			return $this->addLine3;
		}
		function getAddLine4(){
			return $this->addLine4;
		}
		function getCityTown(){
			return $this->cityTown;
		}
		function getPostcode(){
			return $this->postcode;
		}
	}
?>