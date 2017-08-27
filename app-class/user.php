<?php

    class User{

        private $userId; 
        private $userName; 
        private $firstName; 
        private $lastName; 
        private $location; 
        private $savedSeatingPlan; 
        private $favSeatingList; 

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

        function setUserId($UserId){
            $this->userId = $UserId;
        }
        function setUserName($UserName){
            $this->userName = $UserName;
        }
        function setFirstName($FirstName){
            $this->firstName = $FirstName;
        }
        function setLastName($LastName){
            $this->lastName = $LastName;
        }
        function setLocation($Location){
            $this->location = $Location;
        }
        function setSavedSeatingPlan($SavedSeatingPlan){
            $this->savedSeatingPlan = $SavedSeatingPlan;
        }
        function setFavSeatingList($FavSeatingList){
            $this->favSeatingList = $FavSeatingList;
        }

        function getUserId(){
            return $this->userId;
        }
        function getUserName(){
            return $this->userName;
        }
        function getFirstName(){
            return $this->firstName;
        }
        function getLastName(){
            return $this->lastName;
        }
        function getLocation(){
            return $this->location;
        }
        function getSavedSeatingPlan(){
            return $this->savedSeatingPlan;
        }
        function getFavSeatingList(){
            return $this->favSeatingList;
        }
    }
?>