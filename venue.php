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
        <script   src="https://code.jquery.com/jquery-3.2.1.min.js"   
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   
        crossorigin="anonymous"></script>
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
                    <a id="aboutlnk" class="item">about Us</a>
                    <a id="contactlnk" class="item">contact Us</a>
                    <a id="suggestLnk" class="item">suggest Venue</a>
                </div>
            </div>
             <!-- page content -->  
            <div class="twelve wide column">
            </div>
        </div>
        <div class="ui grid">
            <div class="ui menu">>
            
            </div>
        </div>
    </body>

</html>

<ul>
    <li><?php echo $venue->getVenueId(); ?></li>
    <li><?php echo $venue->getName(); ?></li>
    <li><?php echo $venue->getLocalId(); ?></li>
    <li><?php echo $venue->getCityTown(); ?></li>
</ul>
