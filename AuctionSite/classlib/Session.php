<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Session {
    //put your code here
    private $sessionID; //String : containing the PHPSESSID cookie value 
    private $loggedin; //Boolean : TRUE is logged in
  
    private $firstName;
    private $lastname;
    private $userID;
    private $username;
  
    
    
    public function __construct(){
        //get the sessionid from the cookie array  
        if(!isset($_COOKIE['PHPSESSID'])){ //on first page load the session cookie is empty
            $this->sessionID='New Session';
            $_SESSION['PHPSESSID'] = $this->sessionID;
        }
        else{
            $this->sessionID=$_COOKIE['PHPSESSID'];
            $_SESSION['PHPSESSID'] = $this->sessionID;
        }
        

        
        //initialise session variables
        if (isset($_SESSION['loggedin'])){
            //session is already running
            $this->loggedin=$_SESSION['loggedin'];
        }
        else{
          $_SESSION['loggedin'] = FALSE;
          $this->loggedin=$_SESSION['loggedin'];
          
          }
          
          if (!isset($_SESSION['firstName'])){
            
           $_SESSION['firstName'] = NULL;
        }
        
        if (!isset($_SESSION['userID'])){
            
           $_SESSION['userID'] = NULL;
        }
        
       
          
        

    }
    public function setLoggedin($loggedin){
        if($loggedin==TRUE){     
          $_SESSION['loggedin'] = TRUE;
          $this->loggedin=TRUE;  
          return '<br>SESSION CLASS Function - Logging IN<br>';  //used for diagnostics only
        }
        else{
          $_SESSION['loggedin'] = FALSE;
          $this->loggedin=FALSE;
          // Unset all of the session variables.
            $_SESSION = array();

            // If it's desired to kill the session, also delete the session cookie.
            // Note: This will destroy the session, and not just the session data!
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
          session_destroy();  //sets all SESSION variables to NULL

          return '<br>SESSION CLASS - Function Logging OUT<br>'; //used for diagnostics only
        }    
    }

    public function setfirstname($firstname){
        $_SESSION['firstName']=$firstname;
        $this->firstName= $_SESSION['firstName'];
        
    }
    
    public function setlastname($lastname){
        $_SESSION['lastName']=$lastname;
        $this->lastname= $_SESSION['lastName'];
        
    }
    
     public function setusername($username){
        $_SESSION['username']=$username;
        $this->username= $_SESSION['username'];
        
    }
    
     public function setuserID($userID){
        $_SESSION['userID']=$userID;
        $this->userID= $_SESSION['userID'];
        
    }
    
    public function getfirstname(){
        
        return $_SESSION['firstName'];
    }

    public function getlastname(){
        
        return $_SESSION['lastName'];
    }   
    
     public function getusername(){
        
        return $_SESSION['username'];
    }   
    
    public function getuserID(){
        
        return $_SESSION['userID'];
    }   
    
  public function getLoggedin(){
        return $this->loggedin;
    }
    
  
    
    
}
