<?php session_start();
    include 'app-class/Autoloader.php';

    $msgContent = $locList = '';

    /*
        user buttons configuration based on the users sign in status.
    */
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
    
    /*
        Redirection to this page containing a message.
    */
    if(isset($_SESSION['message'])){

        $msg = json_decode($_SESSION['message']);

        $msgContent = msg($msg->type, $msg->header ,$msg->message);
        unset($_SESSION['message']);
        
    }

    function msg($type, $header, $message){
        return '<div class="ui compact'. $type. 'message" id="pageMsg">
                    <i class="close icon" id="msgCls"></i>
                    <div class="header">
                    ' . $header .
                    '</div>
                    <p>'. $message . '</p>
                </div>';
    }
    
?>

<!DOCTYPE html>

<html>
    <head>
        <!-- Semanitc requirements, including JQuery CDN -->
        <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
        <!-- <script   src="https://code.jquery.com/jquery-3.2.1.min.js"   
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   
        crossorigin="anonymous"></script> -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="semantic/dist/semantic.js"></script>
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
                                <form class="ui form error" id="signInFrm">
                                    <div class="field">
                                        <label>User Id</label>
                                        <input type="text" id="userNm" name="userNm">
                                    </div>
                                    <div class="field">
                                        <label>Password</label>
                                        <input type="password" id="passWrd" name="passWrd">
                                    </div>
                                    <div class="ui error message" id="signInErrorMsg">
                                        <div class="header">Sign in Failure</div>
                                        <p> Sorry either the Username or the Password, you entered is incorrent.
                                             Please try again, if it proceeds please contact support.
                                        </p>
                                    </div>
                                    <div class="field">
                                        <button class="ui button" type="button" onClick="signIn()">Submit</button>
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
                    <div class="ui black big label">Find Views</div>
                    <!-- Venue search box -->
                    <div class="item ui search">
                        <div class="ui icon input">
                            <input type="text" class="prompt" placeholder="Venue Name..." name="venueTxtBx" id="venueTxtBx">
                            <i class="search icon"></i>
                        </div>
                        <div class="results"></div>
                    </div>
                    <!-- locations drop down -->
                    <div class="ui scrolling dropdown item" id="locDrpDwn">
                        Locations <i class="dropdown icon"></i>
                        <div class="menu">
                            <?php $grpLoc = new GroupLocation();
                                
                                    $stmt = $grpLoc->listOfGroupLocations();

                                    $res = $stmt->fetchall(PDO::FETCH_ASSOC);

                                    if(!empty($res)){
                        
                                        foreach($res as $set){

                                            $locList .= '<div class="item">' . $set['location'] .'</div>';             
                                        }
                                        
                                    } else {
                                        $locList = '<div class="item">Error, Apologies</div>'; ;
                                    }

                                    echo $locList;
                            ?>
                        </div>
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
            <div class="twelve wide stretched column">
                <?php echo $msgContent; ?>
                <div class="ui grid">
                    <!-- logo -->
                    <div class="sixteen wide column">
                        <img class="ui fluid image" src="./assets/images/index/wmv-logo-placeholder.png">
                    </div>
                    <div class="eight wide column">
                        news feed
                    
                    </div>
                    <!-- social media -->
                    <div class="eight wide column">
                        <!-- facebook -->
                        <div class="row">
                            <div id="fb-root"></div>
                            <!-- <script>(function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s); js.id = id;
                                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10";
                                fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                            <div class="fb-follow" data-href="https://www.facebook.com/royalflush.online" 
                                    data-layout="button_count" data-size="small" 
                                    data-show-faces="false" data-colorscheme="dark"></div>
                            <div class="fb-like" data-href="https://www.facebook.com/royalflush.online" 
                                    data-layout="button_count" data-action="like" 
                                    data-size="small" data-show-faces="false" data-share="true"
                                    data-colorscheme="dark"></div> -->
                            <!-- offline testing -->
                            <button class="medium ui facebook button">
                                <i class="facebook icon"></i>
                                follow
                            </button>
                            <button class="medium ui facebook button">
                                <i class="facebook icon"></i>
                                like
                            </button>
                            <button class="medium ui facebook button">
                                <i class="facebook icon"></i>
                                share
                            </button>
                        </div>
                        <!-- twitter -->
                        <div class="row">
                        <!-- <a href="https://twitter.com/RoyalFlushOn_?ref_src=twsrc%5Etfw" class="twitter-follow-button" 
                            data-show-count="false">Follow @RoyalFlushOn_</a>
                        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" 
                            data-show-count="false">Tweet</a>
                        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> -->
                            <!-- offline testing -->
                            <button class="medium ui twitter button">
                                <i class="twitter icon"></i>
                                follow
                            </button>
                            <button class="medium ui twitter button">
                                <i class="twitter icon"></i>
                                tweet
                            </button>
                        </div>

                        
                        
                    </div>
                    <!-- socal media -->
                        <!-- <div class="eight wide column">
                            <a class="twitter-timeline" 
                                    data-height="350"
                                    data-theme="dark" 
                                    href="https://twitter.com/RoyalFlushOn_">Tweets by RoyalFlushOn_</a>
                            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div> -->
                        <!-- <div class="eight wide column">
                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s); js.id = id;
                                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10";
                                fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                            <div class="fb-page" data-href="https://www.facebook.com/royalflush.online" 
                                    data-tabs="timeline" data-small-header="true" 
                                    data-adapt-container-width="true" data-hide-cover="true" 
                                    data-show-facepile="false" data-height="350">
                                <blockquote cite="https://www.facebook.com/royalflush.online" 
                                            class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/royalflush.online">RoyalFlush.Online</a>
                                </blockquote>
                            </div>

                        </div> -->
                </div>
            </div>            
        </div>
            <!-- end -->
       

    </body>  
        <!-- Custom page scripts for various features -->
        <script src="./js/index.js"></script> 
        <script src="./js/user-access.js"></script>
        <?php echo $usrbtn; ?>    
</html>