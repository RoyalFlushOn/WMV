<?php 
    session_start();

    include 'app-class/Autoloader.php';

    $initalSeat = array();

    if(isset($_SESSION['seatplan'])){
        
        $seatPlan = json_decode($_SESSION['seatplan']);

        $seatingPlan = new SeatingPlan($seatPlan->planid);
       
        $initalSeat =initialSeat($seatingPlan, $seatPlan->seatid);
    } else {

        $jObj->type = ' info ';
        $jObj->header = 'Page Access Direct';
        $jObj->message = 'Page <b>myView.php</b> was not intended to access direct at this time, please try via a venue or location search.
                            If persists please contact site admin on -admin email-';
        $jObj->msgFlag = true;

        $_SESSION['message'] = json_encode($jObj);

        header ('location: .');
    }

    /**
        Get the intial image path for large image on the main page
    */
    function initialSeat($seatingPlan, $seatid){
        $initalSeat = array();
        $seats = $seatingPlan->getSeating();

        if(!$seatid){
            $temp = array_keys($seats);

            $seat = $seats[$temp[0]];

            $initalSeat['name'] = $seat->getSeatName(); 
            $initalSeat['imgPath'] = $seat->getImagePath();
            return $initalSeat;
        } else {
            $seat = $seats[$seatid];

            $initalSeat['name'] = $seat->getSeatName(); 
            $initalSeat['imgPath'] = $seat->getImagePath();
            return $initalSeat;
        }
    }

    if(isset($_SESSION['user'])){
        $temp = $_SESSION['user'];

        $userStat = json_decode($temp);

        if($userStat->signIn){
            $usrbtn =  '<script> userBtnConfig(true) </script>';
        } else {
            $usrbtn =  '<script> userBtnConfig(false) </script>';
        }
    } else {
        $usrbtn = '<script> userBtnConfig(false) </script>';
    }
?>

<html>
    <head>
        <!-- Semanitc requirements, including JQuery CDN -->
        <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
        <!-- <script src="js/jquery-3.1.js"></script> -->
        <script   src="https://code.jquery.com/jquery-3.2.1.min.js"   
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   
        crossorigin="anonymous"></script>
        <script src="semantic/dist/semantic.min.js"></script>
        
    </head> 
    <body>
        <div class="ui grid">
            <div class="four wide column">
                <div class="ui inverted vertical fluid menu">
                    <!-- user sign in/outand reg buttons -->
                    <div class="ui icon inverted menu" id="mainMenu">
                        <div class="item"></div>
                        <div class="item"></div>
                        <!-- sign in -->
                        <a class="item" id="signInIcon" data-tooltip="Sign In">
                            <i class="inverted big sign in icon"></i>
                        </a>
                        <!-- sign in form layover -->
                        <div class="ui tiny modal" id="signInMdl">
                            <i class="close icon"></i>
                            <div class="header">
                                Sign In
                            </div>
                            <div class="content">
                                <form class="ui form" id="signInFrm" method="post"
                                    action="<? echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                    <div class="field">
                                        <label>User Id</label>
                                        <input type="text" id="userNm" name="userNm">
                                    </div>
                                    <div class="field">
                                        <label>Password</label>
                                        <input type="password" id="passWrd" name="passWrd">
                                    </div>
                                    <div class="field">
                                        <button class="ui button" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- reg botton -->
                        <a class="item" id="regIcon" data-tooltip="Register">
                            <i class="inverted big add user icon" id="reg"></i>
                        </a>
                        <!-- signout -->
                        <a class="item" id="signOutIcon" data-tooltip="Sign Out">
                            <i class="inverted big sign out icon" id="reg"></i>
                        </a>
                    </div>
                    <div class="menu" id="spacer">
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                    </div>
                    
                    <!-- navigation links -->
                    <a class="item" id="HmLnk">Home</a>
                    <a href="venue.php?venue=<?php echo $seatPlan->venueid;?>" class="item" id="VenPgLnk">Venue Page</a>
                    <div class="menu" id="spacer">
                        <div class="item"></div>
                        <div class="item"></div>
                    </div>
                    <a class="item" id="helpLnk">Help</a>
                    <div class="menu" id="spacer">
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                        <!-- <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div> -->
                    </div>
                </div>
            </div>
            <div class="twelve wide column">
                <div class="ui grid">
                    <!-- main content -->
                    <!-- main view -->
                    <div class="row">
                        <div class="fourteen wide centered column">
                            <div class="ui fluid image">
                                <div class="ui ribbon big label" id="myVwLbl"><?php echo $initalSeat['name']; ?></div>
                                <img src="<?php echo $initalSeat['imgPath']; ?>" id="mainView">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui divider"></div>
        <div class="ui grid">
            <div class="one wide column" id="filler"></div>
            <!-- Seats map -->
            <div class="fourteen wide column">
                <table class="ui unstackable compact table">
                    <tbody>
                        <?php 
                            // $seatingPlan = new SeatingPlan(40001);
                            $seats = $seatingPlan->getSeating();

                            $i = 0;
                            foreach($seats as $key => $seat){
                                if($i == 0){
                                    $row = substr($seat->getSeatName(),0,1);
                                }
                    
                                if(strcmp(substr($seat->getSeatName(),0,1), $row) == 0){
                                    if($i == 0){
                                        $table .= '<tr><td><i class="user link icon" onclick="seatViewChng(&quot;' .$seat->getSeatingId() . '&quot;,&quot;' .$seat->getSeatName() . '&quot;)" id="' .$seat->getSeatingId() . '"></i></td>'; 
                                        $i++;
                                    } else if($i > 0){
                                        $table .= '<td><i class="user link icon" onclick="seatViewChng(&quot;' .$seat->getSeatingId() . '&quot;,&quot;' .$seat->getSeatName() . '&quot;)" id="' .$seat->getSeatingId() . '"></i></td>';
                                        $i++;
                                    }
                                } else {
                                    if($i > 0){
                                        $table .= '</tr><tr><td><i class="user link icon" onclick="seatViewChng(&quot;' .$seat->getSeatingId() . '&quot;,&quot;' .$seat->getSeatName() . '&quot;)" id="' .$seat->getSeatingId() . '"></i></td>';
                                        $i = 1;
                                        $row = substr($seat->getSeatName(),0,1);
                                        
                                    }
                                }
                                
                            }
                    
                            $table .= '</tr>';
                    
                            echo $table;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <!-- Custom page scripts for various features -->
    <script src="./js/myView.js"></script> 
    <?php echo $usrbtn; ?>
</html>