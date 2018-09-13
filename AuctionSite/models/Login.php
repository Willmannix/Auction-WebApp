 <?php
 
 class login extends Model
 {
 
        private $stringPanel_1;//String: used by the view
        private $stringPanel_2;//String: used by the view
       
        private $userID;
        private $firstname;
        private $lastname;
        private $username;
        private $email;
        private $pass1;
        private $pass2;
        private $password;
        private $errormessage;
        
        private $formhtml; //used to determine which to use
       
        
        private $db; //MySQLi Class object - connection to MySQL database
        private $sql; //String : SQL querry
        private $loginError; //String : contains error message from login 
      
        
        private $session; //Session class object
        private $pageID;//String: used to select the view content
 
     function __construct($pageID,$db,$session){ 
         $this->session=$session;
         parent::__construct($this->session->getLoggedIn());
         $this->pageID=$pageID;
         $this->db=$db;
         $this->setStringPanel_1();
         
     
     }
     
     
        
        public function setStringPanel_1(){
            //get the panel content
                
            switch ($this->pageID) {
                case "login":
                    $this->stringPanel_1 = file_get_contents('forms/loginForm.html');  //this reads an external form file into the string
                    $this->stringPanel_2 = file_get_contents('forms/registerForm.html');
                    break;
                 case "process_login":
                    $this->username=$this->db->real_escape_string($_POST['username']);
                    $this->password=$this->db->real_escape_string($_POST['password']);
                   
                    
                  
                   
                    
                    //call the login method
                    //if ($this->login()){ //passwords not encrypted
                    if ($this->loginEncryptPW()){ //passwords encrypted
                        $this->session->setLoggedin(TRUE);
                        
                        $this->formhtml = 1;
                    }
                    else{
                        $this->session->setLoggedin(FALSE);  //user is not logged on
                        $this->stringPanel_1 = file_get_contents('forms/loginNotSuccessful.html');  //this reads an external form file into the string
                        $this->stringPanel_2 = file_get_contents('forms/registerForm.html');
                        $this->formhtml = 0;
                    }

                    break; 
                    
                 case "process_registration":
                    /*get registration details from the registration form - $_POST array
                     * 
                     * Note that MySQLi class provides a methos for 'escaping' 
                     * special characters in a string: real_escape_string()
                     * 
                     * Is is essential to use this method to escape special characters
                     * that a user may enter in the registration form. If these characters are
                     * not escaped then the SQL query will fail. 
                     * 
                     */
                    
                    $this->firstname=$this->db->real_escape_string($_POST['firstname']); 
                    $this->lastname=$this->db->real_escape_string($_POST['lastname']);
                    $this->username=$this->db->real_escape_string($_POST['username']);
                    $this->email=$this->db->real_escape_string($_POST['email']);
                    $pass1=$this->db->real_escape_string($_POST['password']);
                    $pass2=$this->db->real_escape_string($_POST['confirm-password']);
                    
                    if ($pass1===$pass2){//make sure the passwords match
                        $this->password=$pass1;
                        //try to register new user
                        //
                        //Note : two encryption methoda are included in this class. One encrypts the password
                        //the other does not. Try out both by uncommenting as appropriate:
              
                        //if($this->register()){  //register, no password encryption
                        if($this->registerEncryptPW()){  //register with password encryption
                            $this->stringPanel_2 = file_get_contents('forms/loginNotAsDefaultForm.html');
                            $this->stringPanel_1 = file_get_contents('forms/registerSuccessForm.html');
                            $this->formhtml = 1;
                            }
                        else{//registration not successful
                            
                            $this->stringPanel_2 = file_get_contents('forms/registerUnsuccessForm.html');  //this reads an external form file into the string
                            $this->stringPanel_1 = file_get_contents('forms/loginNotAsDefaultForm.html');
                            $this->formhtml = 1;
                            }                        
                    }
                    else{//passwords dont match  show the registration form again
                        $this->stringPanel_2 = file_get_contents('forms/registerUnsuccessPasswordsForm.html');  //this reads an external form file into the string
                        $this->stringPanel_1 = file_get_contents('forms/loginNotAsDefaultForm.html');
                        $this->formhtml = 1;
                    }                
                    break; 
                case "logout":
                    
                    $this->logout();
                    $firstname = NULL;
                   $this->session->setfirstname($firstname);
                
                
                    break;
                default:
                    $this->stringPanel_1 = file_get_contents('forms/loginForm.html');  //this reads an external form file into the string
                     $this->stringPanel_2 = file_get_contents('forms/registerForm.html');
                     $this->formhtml = 0;
                    break;
            }                                     
        
                                                
        } 
        
             private function register(){
                        //create the SQL insert statement for the new record
                        $sql='INSERT INTO user(firstname,lastname,username,email,password)VALUES("'.$this->firstname.'","'.$this->lastname.'","'.$this->username.'","'.$this->email.'","'.$this->password.'")';
                        //execute the insert query
                        if(@$this->db->query($sql)){  //execute the query and check it worked    
                            return TRUE;
                        } 
                        else{  //insert query has not succeeded
                            return FALSE;
                        }                        
        }
        private function registerEncryptPW(){
                        /*encrypt the password
                         * 
                         * Note that ripemd160 encryption produces a 40 character string. 
                         * This means that the password field in the table must be at least
                         * VARCHAR(40)
                         *   
                         */
                        $this->password=hash('ripemd160', $this->password);
            
                        //create the SQL insert statement for the new record
                        $sql='INSERT INTO user(username,password,email,firstname,lastname)VALUES("'.$this->username.'","'.$this->password.'","'.$this->email.'","'.$this->firstname.'","'.$this->lastname.'")';
                        //execute the insert query
                        if(@$this->db->query($sql)){  //execute the query and check it worked    
                            return TRUE;
                        } 
                        else{  //insert query has not succeeded
                            return FALSE;
                        }                        
        }
        
        private function loginEncryptPW(){
            //password is encrypted
            $this->password=hash('ripemd160', $this->password);
            
            //query the database
            $sql='SELECT  * FROM user WHERE username="'.$this->username.'" AND password="'.$this->password.'"';
            $this->sql=$sql; //for diagnostic purposes
            
            //check if any rows returned from query
            if($rs=$this->db->query($sql)){  //execute the query and check it worked and returned data    
                if ($rs->num_rows<>1){  //username and password is not valid
                    $this->errormessage= 'Login Fail - '.$rs->num_rows;
                    //free result set memory
                    $rs->free();
                    return FALSE;                    
                }
                else{                    
                $this->errormessage= 'Login Successful - no error';
                $row=$rs->fetch_assoc();
                $this->username=$row['username'];
                $this->userID=$row['userid'];
                $this->firstname=$row['firstname'];
                $this->lastname=$row['lastname'];
                
                    $this->session->setfirstname($this->firstname);
                    $this->session->setlastname($this->lastname);
                    $this->session->setusername($this->username);
                    $this->session->setuserID($this->userID);
                    $rs->free();
                
                    $this->loggedin=TRUE;
                  
                    return TRUE;
                } 
            } 
            else{  //resultset is empty or something else went wrong with the query
                $this->loggedin=FALSE;
                return FALSE;
            }

            
        }

        
         private function logout(){
            $this->loggedin=FALSE;
            $this->session->setLoggedin(FALSE);  //user is not logged on
            
         }
        
        public function getStringPanel_1(){return $this->stringPanel_1;}
        public function getStringPanel_2(){return $this->stringPanel_2;}
        public function getformhtml(){return $this->formhtml;}
        public function getSQL(){return $this->sql;}  
        public function getErrorMessage(){return $this->errormessage;}
            
 }