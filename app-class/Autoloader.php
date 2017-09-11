<?php 

spl_autoload_register(function ($className) {

    if(strcmp($className, 'DataAccess') !== 0){
        include dirname(__FILE__).DIRECTORY_SEPARATOR. $className . '.php';
    } else {
        include 'app-Data' . DIRECTORY_SEPARATOR. $className . '.php';
    }
    
});

?>