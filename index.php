<?php session_start();
    include 'app-class/Autoloader.php';

    $message = '';
    
    if(isset($_SESSION['message'])){
        $tmp = $_SESSION['message'];

        $msg = json_decode($tmp);

        if($msg->msgFlag){
            $message = '<div class="alert alert-' . $msg->type . '"><strong>Msg!</strong> ' . $msg->message .'</div>';
            $msg->msgFlag = false;
            $_SESSION['message'] =null;
        }
        
    }

    

    $grpLoc = new GroupLocation();

    $stmt = $grpLoc->listOfGroupLocations();

    $res = $stmt->fetchall(PDO::FETCH_ASSOC);
    
    if(!empty($res)){

        foreach($res as $set){

            foreach($set as $loc){
                $locList .= '<li><a href="#" tabindex="-1">' . $loc .'</a></l>';
            }             
        }
    } else {
        $locList = 'Error, Apologies';
    }

   
?>

<!DOCTYPE html>

<html>
    <head>
    <!-- Bootstrap Requirement -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--                       -->

    <!-- AutoComplete requirement -->
         <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--                         -->
    </head> 

    <body>
            <div id="titleLinks" class="container-fluid">
            <?php echo $message; ?>
            <ul>
                <li><a href="">about Us</a></li>
                <li><a href="">contact Us</a></li>
                <li><a href="">suggest Venue</a></li>
            </ul>
            </div>
            <div id="search">
                 <ul>
                    <li> 
                        <div class="ui-widget">
                            <input type="text" name="venueTxtBx" id="venueTxtBx" placeholder="Venue Name...">
                            <button type="button" id="venueSrchBtn">Search</button>
                        </div>
                     </li>
                    <li>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" 
                                    data-toggle="dropdown" id="locationBtn" name="locationBtn">
                                    Locations <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" id="locationDrpDwn" name="locationDrpDwn">
                                <?php echo $locList; ?>
                            </ul>
                        </div>
                    </li>
                    <li>
                    
                    </li><button type="button" class="btn btn-primary" id="locSrchBtn" name="locSrchBtn">Search</button>
                </ul> 
            </div>
        </body>  

        <script src="./js/index.js"></script>     
</html>