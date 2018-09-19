<?php 
    include 'app-class/Autoloader.php';

    if(!empty($_GET['srchVal'])){
        $grpLocation = $_GET['srchVal'];

        $grpLoc = new GroupLocation();
        $temp = $grpLoc->venueList($grpLocation);

        $res = $temp->fetchall(PDO::FETCH_ASSOC);
       
       // print_r($res);

        foreach($res as $ven){

            $venue = new Venue($ven['venue_id'],
                                $ven['name'],
                                $ven['location'],
                                $ven['style'],
                                $ven['seating_prof_id'],
                                $ven['rating'],
                                $ven['capacity'],
                                $ven['local_id']);
            $VenRes[$ven['venue_id']] = $venue;
       }
       
       //print_r($VenRes);

   } else {
       header( 'location: localhost:8888/WMV/');
   }


    /*
    check $get is not empty,
        if empty send bk to homepage
    
    retrive all venues in that group location
        that includes:
                venue data
                seating data
    
    create an array of these venue obj and seat obj

    display these results in a table

    create a json session value with venue results
    */
?>

<html>

    <head>
        <!-- Semanitc requirements, including JQuery CDN -->
        <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
        <script   src="js/jquery-3.3.1.min.js"></script>
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
                                        action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
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
            <div>
            <!-- page content -->
            <div class="twelve wide stretched column">
                <?php echo $msgContent; ?>
                <div class="ui grid">
                    <table>   
                        <?php

                            $line = '<tr><td>Venue</td>';
                            $line .= '<td>Loaction</td>';
                            $line .= '<td>Type</td>';
                            $line .= '<td>Rating</td>';
                            $line .= '<td>Room/Section</td>';
                            $line .= '<td>Room/Section</td>';
                            $line .= '<td>Room/Section</td>';
                            $line .= '</tr>';

                            foreach($VenRes as $venue){
                                $line .= '<tr><td><a href="' . $venue->getName(). '">' . $venue->getName(). '</a></td>';
                                $line .= '<td>' . $venue->getGroupLocal(). '</td>';
                                $line .= '<td>' . $venue->getType() . '</td>';
                                $line .= '<td>' . $venue->getRating() . '</td>';                    

                                $prof = $venue->getSeatingProf();
                                foreach($prof->getSeatingPlan() as $plan ){
                                    
                                    $line .= '<td><button class="ui teal basic button" id="'. $plan->getSeatingPlanId() .'"
                                                        onclick="myView(this, &quot;' . $venue->getName() . '&quot;)">' . $plan->getName() .'</button></td>';
                                }

                                $line .= '</tr>';
                            }

                            echo $line;
                        ?>
                    </table>
                </div>
            </div>
        </div>  
    </body>

    <script src="js/results.js"></script>
</html>