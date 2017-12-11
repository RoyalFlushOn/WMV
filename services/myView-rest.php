<?php
    session_start();
    include '../app-class/Autoloader.php';
    

    if(!empty($_POST['seatplan'])){
        if(!empty($_POST['venueName'])){
            if(!empty($_POST['seatid'])){
                $responce->success = setSeatPlan($_POST['seatplan'], $_POST['seatid'], $_POST['venueName']);
                
                echo json_encode($responce); 
            } else {
                $responce->success = setSeatPlan($_POST['seatplan'], false, $_POST['venueName']);
                
                echo json_encode($responce);
            }
        }else {
            $jObj->type = ' info ';
            $jObj->header = 'Serice Access Direct';
            $jObj->message = 'Service was not intended to access direct, if you are seeing thi in error or out of turn please contact -admin email-';
            $jObj->msgFlag = true;

            $_SESSION['message'] = json_encode($jObj);

            echo false;
            
        }
    } else {
        $jObj->type = ' info ';
        $jObj->header = 'Serice Access Direct';
        $jObj->message = 'Service was not intended to access direct, if you are seeing thi in error or out of turn please contact -admin email-';
        $jObj->msgFlag = true;

        $_SESSION['message'] = json_encode($jObj);

        echo false;
        
    }


    function setSeatPlan($planId, $seatid, $venueName){
        if(isset($_SESSION['seatplan'])){
            session_unset($_SESSION['seatplan']);

            $seatPlan->planid = $planId;
            $seatPlan->seatid = $seatid;
            $seatPlan->venueName = $venueName;

            $_SESSION['seatplan'] = json_encode($seatPlan);

            return true;
        } else {
            $seatPlan->planId = $planId;
            $seatPlan->seatid = $seatid;
            $seatPlan->venueName = $venueName;

            $_SESSION['seatplan'] = json_encode($seatPlan);

            return true;
        }
    }
?>