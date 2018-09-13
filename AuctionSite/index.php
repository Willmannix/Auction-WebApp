
<?php

session_start(); //join/start a session between thhebrowser client and Apache web server


//include application configuration settings
include_once 'config/config.php';
include_once 'config/connection.php';

//include class libraries
include_once 'classlib/Model.php';
include_once 'classlib/Controller.php';
include_once 'classlib/Session.php';


//include MVC classes
include_once 'controllers/MainController.php';
include_once 'models/Home.php';
include_once 'models/Login.php';
include_once 'models/Upload.php';
include_once 'models/Auctions.php';
include_once 'models/AuctionsPage.php';
include_once 'models/History.php';
include_once 'models/Search.php';

$_SESSION['id'] = 4;

@$db=new mysqli($DBServer,$DBUser,$DBPass,$DBName);

if($db->connect_errno){  //check if there is an error in the connection
    $msg='Error making connection to MySQL Server using MySQLi- check your server is running and you have the correct host IP address.<br>MySQLi Error message: '.$conn->connect_error.'<br>'; 
    exit($msg);  
}

$session=new Session();

//start app
$mainController=new MainController($db,$session);

$db->close();