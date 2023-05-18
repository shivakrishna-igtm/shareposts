<?php
//loading config files
require_once 'config/config.php';
//loading helpers file
require_once 'helpers/url_helpers.php';
require_once 'helpers/session_helpers.php';
//loading libraries
/*require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';*/
//TO LOAD THE LIBRARRIES AUTOMATICALLY 
spl_autoload_register(function($className){
    require_once 'libraries/'.$className.'.php';
});