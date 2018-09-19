<?php
    session_start();
    include '../app-class/Autoloader.php';

    $response = new Response();
    

    if(!empty($_POST['signOut'])){

        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);

            $response->signout = true;

            echo json_encode($response);
        }
  
    } else {
        echo 'signout variable not set, if seen again please contact admin';
        
    }



?>