<?php 
session_start();
include '../app-class/Autoloader.php';

$response = new Response();
$userStat = new UserStatus();
/*
        Sign in form logic
    */
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(!empty($_POST['username'])){
            $username = $_POST['username'];

            if(!empty($_POST['password'])){
                $user = new User();

                $password = $_POST['password'];

                if($user->chkUser($username)){
                    if($user->chkPass($password, $username)){
                        //setting user values for sessions
                        $userStat->username = $username;
                        $userStat->signIn = true;

                        $_SESSION['user'] = json_encode($userStat);
                        echo $_SESSION['user'];
                    } else {
                        echo json_encode($userStat->signIn = false);
                    }
                }else {
                    echo json_encode($userStat->signIn = false);
                }
            } else {
                echo json_encode($userStat->signIn = false);
            }
        } else {
            echo json_encode($userStat->signIn = false);
        }
    }
?>