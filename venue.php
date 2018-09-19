<?php session_start();
    include 'app-Class/Autoloader.php';

    if(isset($_GET['venue'])){
            
        $venueName =  $_GET['venue'];

        $ven = new Venue();
        $venue = new Venue($venueName);

    } else {

        $msg = new Message();

        $msg->message = 'The venue you have searched for is incorrorect, please use the search function in the menue below.';
        $msg->type=  'info';
        $msg->msgFlag=true;
        $msg->responceFlag =false;

        $_SESSION['message'] = json_encode($msg);

        echo '<script>
                    location.href = ".";
            </script>';
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
        <!-- <script   src="https://code.jquery.com/jquery-3.2.1.min.js"   
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   
        crossorigin="anonymous"></script> -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="semantic/dist/semantic.min.js"></script>
    </head> 
    <body>
         <!-- Content for the Rest of the page -->
        <div class="ui grid">
            <!-- Verical menu bar -->
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
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                    </div>
                    <!-- navigation links -->
                    <a id="aboutLnk" class="item">about Us</a>
                    <a id="contactLnk" class="item">contact Us</a>
                    <a id="suggestLnk" class="item">suggest Venue</a>
                </div>
            </div>
             <!-- page content -->  
            <div class="twelve wide column">
                <!-- image for venue -->
                <div class="ui grid">
                    <div class="eight wide column central">
                        <div class="ui big lable" id="venueLbl"> 
                            <?php echo $venue->getName(); ?>
                        </div>
                        <img src="./assets/images/venue/venue-logo-placeholder.png" alt="" class="ui fluid image">
                    </div>
                    <div class="ui row">
                        <div class="ui relaxed divided list">
                            <div class="item">
                                <div class="conent">
                                    <div class="header">Venue Type: </div>
                                    <div class="description"><?php echo $venue->getType(); ?></div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="conent">
                                    <div class="header">Venue Loction: </div>
                                    <div class="description"><?php echo $venue->getCityTown(); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- details beside in list form -->
            </div>
        </div>
        <!--  button grid -->
        <div class="ui grid centered">
            <?php 
                $seatProf = $venue->getSeatingProf();
                $seatingPlan = $seatProf->getSeatingPlan();

                switch($seatProf->getStyle()){

                    case 'Cinema':
                        cinemaLayout($seatingPlan);
                    break;
                    case 'Theater':
                        theaterLayout($seatingPlan);
                    break;
                    case 'Style1'://testing cinema
                        echo cinemaLayout($seatingPlan, $venue->getName());
                    break;
                    case 'Style2'://testing theater
                        echo theaterLayout($seatingPlan, $venue->getName());
                    break;
                }

                function cinemaLayout($seatPlan, $name){
                    $i=0;
                    $layout = '<div class="row"><div class="ui buttons">';
                    
                    foreach($seatPlan as $plan){
                        if($i == 3){
                            $layout .= '</div></div><div class="row"><div class="ui buttons">';
                            $i = 0;
                        }

                        // $layout .= '<div class="three column wide">
                        //                 <button class="ui button" onclick="myView(this, &quot;' . $name. '&quot;)" id="'.
                        //                         $plan->getSeatingPlanId() .'">' . $plan->getName(). '</button>
                        //             </div>';

                        $layout .= '<button class="ui button" onclick="myView(this, &quot;' . $name. '&quot;)" id="'.
                                                $plan->getSeatingPlanId() .'">' . $plan->getName(). '</button>';
                        $i++;
                    }
                    
                    $layout .= '</div></div>';

                    return $layout;
                }

                function theaterLayout($seatPlan, $name){

                    $layout = '<div class="row">
                                    <div class="ui vertical buttons">
                                        <div class="five column wide">';

                    foreach($seatPlan as $plan){
                        $layout .= '<button class="fluid ui button" onclick="myView(this, &quot;'. $name . 
                                            '&quot;)" id="'. $plan->getSeatingPlanId() . '"> ' . $plan->getName() . '</button>';
                    }

                    $layout .= '</div></div></div>';

                    return $layout;
                }
            ?>
        </div>
        <p id="test"></p>
    </body>
    <script src="./js/venue.js"></script>
    <script src="./js/user-access.js"></script>
    <?php echo $usrbtn; ?>  
</html>

<ul>
    <li><?php echo $venue->getVenueId(); ?></li>
    <li><?php echo $venue->getName(); ?></li>
    <li><?php echo $venue->getLocalId(); ?></li>
    <li><?php echo $venue->getCityTown(); ?></li>
</ul>
