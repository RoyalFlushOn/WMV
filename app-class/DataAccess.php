<?php

    class DataAccess{
    
    
        private $member;
        private $serverName;
        private $username;
        private $password;
        private $dbConn;
        
        
        function __construct(){
        //generic constructor
        }
        
        function dbConnection(){

            $this->serverName = 'localhost';
            $this->username = 'root';
            $this->password = 'root';
            
            try{
                $this->dbConn = new PDO("mysql:host=$this->serverName;dbname=WMV", $this->username, $this->password);
                $this->dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                return 'done and dusted';
            }
            catch (PDOException $e){
                return 'woops: ' . $e->getMessage();
            }
        }

        function returnQuery($query){
      
            $this->dbConnection();
            
            $stmt = $this->dbConn->prepare($query);
            
            if($stmt->execute()){
                return $stmt;
            } else {
                return null;
            }

            $this->dbConn = null;
        }

        function singleNonReturnQuery($query){

             $this->dbConnection();
            
            $stmt = $this->dbConn->prepare($query);
            
            if($stmt->execute()){
                return $stmt;
            } else {
                return null;
            }

            $this->dbConn = null;
        }

        function multiNonReturnQuery($querys){

             $this->dbConnection();
            
            foreach($querys as $query){
                $this->dbConn->prepare($query);
            }
             
            $stmt = $this->dbConn->execute();
            
            if($stmt){
                return true;
            } else {
                return false;
            }

            $this->dbConn = null;
        }

        function transaction($querys){

            $this->dbConnection();

            $this->dbConn->beginTransaction();
            
            foreach($querys as $query){
                $this->dbConn->prepare($query);
            }
             
            $stmt = $this->dbConn->execute();
            
            if($stmt){
                $this->dbConn->commit();
                return true;
            } else {
                $this->dbConn->rollBack();
                return false;
            }

            $this->dbConn = null;
        }

        
    }
?>