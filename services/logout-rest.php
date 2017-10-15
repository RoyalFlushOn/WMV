<?php
    session_start();
    include '../app-class/Autoloader.php';

    // $responce = array();
    

    if(!empty($_POST['signOut'])){

        if(isset($_SESSION['user'])){
            session_unset($_SESSION['user']);

            $responce->signout = true;

            echo json_encode($responce);
        }
  
    } else {
        echo 'signout variable not set, if seen again please contact admin';
        
    }



?>