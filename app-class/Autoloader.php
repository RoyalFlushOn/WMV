<?php 

spl_autoload_register(function ($className) {

    //if(strcmp($className, 'DataAccess') == 0){
        include dirname(__FILE__).DIRECTORY_SEPARATOR. $className . '.php';
        //echo dirname(__FILE__).DIRECTORY_SEPARATOR. $className . '.php';
    //} else {
        //echo 'app-Data' . DIRECTORY_SEPARATOR. $className . '.php';
   // }
    
});

?>