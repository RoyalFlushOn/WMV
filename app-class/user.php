<?php
    include 'Autoloader.php';

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
        
        /*
            checking users exists against the database.
        */
        function chkUser($userNmIn){
            $db = new DataAccess();

            $stmt = $db->returnQuery('select username from Users where username = "' . $userNmIn. '"');

            if(!empty($stmt->fetch())){
                return true;
            } else {
                return false;
            }
        }

        /*
            Checking password against the database.
        */
        function chkPass($passWrdIn, $userNmIn){
            $db = new DataAccess();

            $stmt = $db->returnQuery('select password from Users where username = "' . $userNmIn. '"');
            
            $res = $stmt->fetch(PDO::FETCH_ASSOC);

            if(password_verify($passWrdIn, $res['password'])){
                return true;
            } else {
               return false; 
            }
            
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