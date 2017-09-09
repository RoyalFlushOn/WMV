<?php

    class SeattingPorfile{

        private $seatingProfId;
        private $multiRoom;
        private $style;
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