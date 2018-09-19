<?php 

session_start();
include '../app-class/Autoloader.php';

if(isset($_SESSION['message'])){
    unset($_SESSION['message']);
}

$msg = new Message();
$response = new Response();

if(!empty($_POST['type'])){
    if(!empty($_POST['header'])){
        if(!empty($_POST['message'])){
        
            $msg->type =$_POST['type'];
            $msg->header = $_POST['header'];
            $msg->message = $_POST['message'];

            $_SESSION['message'] = json_encode($msg);

            $response->status = true;

        } else {
            $response->status = false;
        }
    } else {
        $response->status = false;
    }
} else {
    $response->status = false;
}

echo json_encode($response);
?>