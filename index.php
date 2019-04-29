<?php
// start seesion

session_start();


require('config.php');
require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');


require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');
require('controllers/categories.php');
require('controllers/pagenotfound.php');

require('models/home.php');
require('models/share.php');
require('models/user.php');
require('models/pagenotfound.php');
require('models/category.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$bootstrap=new Bootstrap($_GET);
$controller=$bootstrap->createContrroller();
if($controller){
    $controller->executeAction();
}




































?>