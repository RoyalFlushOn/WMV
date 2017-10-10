<?php session_start();
    include 'app-class/Autoloader.php';

    $message = $locList = '';
    
    if(isset($_SESSION['message'])){
        $tmp = $_SESSION['message'];

        $msg = json_decode($tmp);

        if($msg->msgFlag){
            $message = '<div class="alert alert-' . $msg->type . '"><strong>Msg!</strong> ' . $msg->message .'</div>';
            $msg->msgFlag = false;
            $_SESSION['message'] =null;
        }
        
    }

    

    
?>

<!DOCTYPE html>

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
            <div class="four wide column">
                <!-- Verical menu bar -->
                <div class="ui inverted vertical fluid menu">
                    <div class="ui icon inverted menu">
                        <div class="item"></div>
                        <div class="item"></div>
                        <a class="item" id="signInIcon"><i class="inverted big sign in icon"></i></a>
                        <a class="item" id="regIcon"><i class="inverted big add user icon" id="regIcon"></i></a>
                    </div>
                    <div class="menu" id="spacer">
                        <div class="item"></div>
                        <div class="item"></div>
                        <div class="item"></div>
                    </div>
                    <div class="ui black big label">Find Views</div>

                    <div class="item ui search">
                        <div class="ui icon input">
                            <input type="text" class="prompt" placeholder="Venue Name..." name="venueTxtBx" id="venueTxtBx">
                            <i class="search icon"></i>
                        </div>
                        <div class="results"></div>
                    </div>
                    <div class="ui scrolling dropdown item">
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
                    <a  class="item">about Us</a>
                    <a  class="item">contact Us</a>
                    <a  class="item">suggest Venue</a>
                </div>
            </div>
            
            <div class="twelve wide stretched column">
                <!-- content -->
                <div class="ui grid">
                    <!-- logo -->
                    <div class="sixteen">
                        <img class="ui fluid image" src="./assets/images/index/wmv-logo-placeholder.png">
                    </div>
                    <div class="eight wide column">
                    </div>
                    <!-- social media -->
                    <div class="eight wide column">
                        <!-- facebook -->
                        <div class="row">
                            <!-- <div id="fb-root"></div>
                            <script>(function(d, s, id) {
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
</html>