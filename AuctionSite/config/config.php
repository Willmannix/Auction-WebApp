<?php
//configuration settings for this web application
//these are defined as global constants which will be available in ALL SCRIPTS, CLASSES and FUNCTIONS

define ('__DEBUG',0);  //constants are defined using the define keyword 1=true, 0=false

//__THIS_URI_ROOT : String constant - the root URI for this website. This constant is used by AJAX to 
// load the page updates (see urlToLoad variable in chat.php)


//host root URL configuration __THIS_URI_ROOT
//do not use http://localhost - always use the web server IP address or use 127.0.0.1 if testing locally
//define ('__THIS_URI_ROOT','http://127.0.0.1:8088/nsync2018/T02/L04_MVC_AJAX/');
define ('__THIS_URI_ROOT','http://127.0.0.1:80/AuctionSite/');
//note - in the browser the EXACT same root address must be used to view the pages 
//of this application


//ATSPACE configuration __THIS_URI_ROOT
//define ('__THIS_URI_ROOT','http://collegeonline.atspace.eu/');