<?php

class MainController extends Controller {
    
        //properties
        private $pageID;  //String : containing the name of the requested page
        private $session;
         private $data; //Array containing content data for the view
         private $db;
        
	//constructor
	 function __construct($db,$session){  
           //initialise the class properties
           $this->data=[]; 
            
           $this->session=$session; 
           $this->db=$db;
           parent::__construct($this->session->getLoggedIn());
         
           
           //call the the main app methods 
           $this->processView();  //get the requested next page
           $this->updateView(); //a switch to load the model and update the view
           
	}//construct the main controller object
          
         //methods
        public function processView(){
            //This main controller handles all page requests vis the URL - GET Methos
            //$_GET will contain the selected pageID 
            //If the page is loaded for the first time then the $_GET array is empty
            //so a default value is set for $this->pageID
            if (isset($_GET['pageID'])){  //get the value of pageID from $_GET array
                $this->pageID=$_GET['pageID'];
            }
            else{  //no value passed through URL to $_GET array
                $this->pageID='home';  //this will execute the default
            }
        }  //get the page ID
        
        public function updateView(){
            $zero = '0';
            if($this->loggedin){  //these page options are only available to logged in users      
               
                if (strpos($this->pageID, '0') == true)
                {
                $auctionpage = explode('0',$this->pageID);
                }
                else
                {
                     $auctionpage = [1,2];
                }
//user is logged in as administrator
               switch ($this->pageID) {   
                   case "Home":  
                       $home=new Home($this->pageID,$this->db,$this->session);
                         $data=[];
                              $data['menuNav']  =$home->getMenuNav();
                              $data['menuNavTwo']   =$home->getMenuNavTwo();
                               $description = [];
                               $title = [];
                               $startingprice = [];
                               $auctionid = [];
                               $imgext = [];
                               $duration = [];
                               $timestamp = [];
                              $highestbid = [];
                            
                             
                               $auctionid = $home->getAuctionIDArr();
                               $imgext = $home->getimageext();
                                $data['firstname'] = $this->session->getfirstname();
                               $description = $home->getDescriptionArr();
                               $title = $home->getTitleArr();
                               $startingprice = $home->getStartingPriceArr();
                               $duration = $home->getDurationArr();
                               $highestbid=$home->gethighestbidarr();
                                $timestamp = $home->getTimestampArr();
                                 $bid = $home->getbidarraysize();
                                $data['forloop'] = $home->getforloop();
                               
                               $this->data=$data;
                       include_once 'views/loggedInHome.php';
                       break;
                   
                   case "History":  
                       $home=new Home($this->pageID,$this->db,$this->session);
                        $history = new History($this->pageID,$this->db,$this->session);
                              $description = [];
                               $title = [];
                               $price = [];
                        $data=[]; 
                         $data['menuNav']   =$home->getMenuNav();
                         $data['menuNavTwo']   =$home->getMenuNavTwo();
                         $data['firstname'] = $this->session->getuserID();
                         $description = $history->getDescriptionArr();
                         $price = $history->getPriceArr();
                         $title = $history->getTitleArr();
                         $this->data=$data; 
                       include_once 'views/History.php';
                       break;
                   
                   case "logout":
                    //get the models
                    $  $home=new Home($this->pageID,$this->db,$this->session);
                           $data=[]; 
                       
                        $login=new Login($this->pageID,$this->db,$this->session);
                        $data['login'] =$login->getStringPanel_1();
                        $data['register'] =$login->getStringPanel_2(); 
                       
                        $data['htmlform'] =$login->getformhtml();
                        $this->data=$data;
                        include_once 'views/LogInRegister.php';
                         
                         $this->data=$data;
                        
                           header('Location: index.php?pageID=login');
                         
                         
                    break;
                
                case "account":
                     $home=new Home($this->pageID,$this->db,$this->session);    
                    
                    //get the content from the model - put into the $data array for the view:
                    $data=[];  //initialise an empty data array
                   
                    $data['menuNav']   =$home->getMenuNav();
                    $data['menuNavTwo']   =$home->getMenuNavTwo();
                     $this->data=$data; 
                    include_once 'views/AuctionPage.php';
                    break;
                  case "Auctions":
                         {
                              $home=new Home($this->pageID,$this->db,$this->session);
                              $auction=new Auctions($this->pageID,$this->db,$this->session);
                              
                              $data=[];
                              $data['menuNav']   =$home->getMenuNav();
                              $data['menuNavTwo']   =$home->getMenuNavTwo();
                               $description = [];
                               $title = [];
                               $startingprice = [];
                               $auctionid = [];
                               $imgext = [];
                               $duration = [];
                               $timestamp = [];
                               $highestbid = [];
                              
                               $data['test'] = $auction->test();
                               $data['passfail'] = $auction->passfail();
                              $data['firstname'] = $this->session->getfirstname();
                               $auctionid = $auction->getAuctionIDArr();
                               $imgext = $auction->getimageext();
                               $description = $auction->getDescriptionArr();
                               $title = $auction->getTitleArr();
                               $startingprice = $auction->getStartingPriceArr();
                               $duration = $auction->getDurationArr();
                               $highestbid=$auction->gethighestbidarr();
                                $timestamp = $auction->getTimestampArr();
                                       
                               
                               $this->data=$data;
                              include_once 'views/Auctions.php';
                              break;
                         }
                         
                          case "Search":
                         {
                              $home=new Home($this->pageID,$this->db,$this->session);
                              $search=new Search($this->pageID,$this->db,$this->session);
                              
                              $data=[];
                              $data['menuNav']   =$home->getMenuNav();
                              $data['menuNavTwo']   =$home->getMenuNavTwo();
                               $description = [];
                               $title = [];
                               $startingprice = [];
                               $auctionid = [];
                               $imgext = [];
                               $duration = [];
                               $timestamp = [];
                               $highestbid = [];
                              
                               
                             
                               $auctionid = $search->getAuctionIDArr();
                               $imgext = $search->getimageext();
                               $description = $search->getDescriptionArr();
                               $title = $search->getTitleArr();
                               $startingprice = $search->getStartingPriceArr();
                               $duration = $search->getDurationArr();
                               $highestbid=$search->gethighestbidarr();
                                $timestamp = $search->getTimestampArr();
                                       
                               
                               $this->data=$data;
                              include_once 'views/Search.php';
                              break;
                         }
                         
                     //case stristr($this->pageID, '0', true): //returns the word Auction without the auction ID at the end of it
                     case $auctionpage[0].$zero.$auctionpage[1] :
                         {
                        $data=[]; 
                        $home=new Home($this->pageID,$this->db,$this->session);
                        $auctionspage = new AuctionsPage($this->pageID,$this->db,$this->session);
                   
                        $html = [];
                        $imgext = [];
                        $data['menuNav']   =$home->getMenuNav();
                        $data['menuNavTwo']   =$home->getMenuNavTwo();
                        $data['description'] = $auctionspage->getdescription();
                        $data['startingprice'] = $auctionspage->getstartingprice();
                        $data['username'] = $auctionspage->getusername();  
                        $data['title'] = $auctionspage->gettitle(); 
                        $data['auctionid'] = $auctionspage->getauctionid(); 
                        $data['userID'] = $this->session->getuserID();
                         $data['duration'] = $auctionspage->getduration();
                        $data['timestamp'] = $auctionspage->gettimestamp();
                        $data['userid'] = $auctionspage->getuserid();
                        $imgext = $auctionspage->getimageext();
                   
                          $this->data=$data;
                         include_once 'views/AuctionPage.php';
                         break;
                     }
                 case "Sell":
                        $data=[]; 
                        $home=new Home($this->pageID,$this->db,$this->session);
                        $Upload=new Upload($this->pageID,$this->db,$this->session);
                        $data['form'] =$Upload->getAuctionForm();
                        $data['menuNav']   =$home->getMenuNav();
                        $this->data=$data;
                        include_once 'views/auctionSell.php';
                        break;
                    
                    case "process_auction": 
                        $data=[]; 
                        $home=new Home($this->pageID,$this->db,$this->session);
                        $Upload=new Upload($this->pageID,$this->db,$this->session);
                        $data['form'] =$Upload->getAuctionForm();
                        $data['menuNav']   =$home->getMenuNav();
                        $this->data=$data;
                        include_once 'views/auctionSell.php';
                        break;
               
               default:
                         $home=new Home($this->pageID,$this->db,$this->session);
                       
                         $data=[];
                              $data['menuNav']   =$home->getMenuNav();
                              $data['menuNavTwo']   =$home->getMenuNavTwo();
                               $description = [];
                               $title = [];
                               $startingprice = [];
                               $auctionid = [];
                               $imgext = [];
                               $duration = [];
                               $timestamp = [];
                                $highestbid = [];
                              
                            
                               $data['firstname'] = $this->session->getfirstname();
                               $auctionid = $home->getAuctionIDArr();
                               $imgext = $home->getimageext();
                               $description = $home->getDescriptionArr();
                               $title = $home->getTitleArr();
                               $startingprice = $home->getStartingPriceArr();
                               $duration = $home->getDurationArr();
                                $timestamp = $home->getTimestampArr();
                                $highestbid=$home->gethighestbidarr();
                                       
                               
                               $this->data=$data;
                        include_once 'views/loggedInHome.php';
                        break;
               }
       
        }
             else{
                switch ($this->pageID) {
                    case "login": 
                        $data=[]; 
                        $home=new Home($this->pageID,$this->db,$this->session);
                        $login=new Login($this->pageID,$this->db,$this->session);
                        $data['login'] =$login->getStringPanel_1();
                        $data['register'] =$login->getStringPanel_2(); 
                    
                        $data['htmlform'] =$login->getformhtml();
                        $this->data=$data;
                        include_once 'views/LogInRegister.php';
                        break;
                    
                    case "process_registration":
                    //get the model
                    
                    $login = new Login($this->pageID,$this->db,$this->session);
                     $home=new Home($this->pageID,$this->db,$this->session);
                    
                    //get the content from the model - put into the $data array for the view:
                    $data=[];  //initialise an empty data array 
                    $data['menuNav']   =$home->getMenuNav();       // an array of menu items and associated URLS
                    $data['login'] =$login->getStringPanel_1();
                    $data['register'] =$login->getStringPanel_2();// A string intended of the Left Hand Side of the page
                    $data['htmlform'] =$login->getformhtml();
                    $this->data=$data; //put the $data array into the class property do it can be accedded in DEBUG mode
                    
                    //display the view
                    include_once 'views/LogInRegister.php'; //load the view
                    break; 
                    
                   case "process_login":
                       $home=new Home($this->pageID,$this->db,$this->session);
                       $login = new Login($this->pageID,$this->db,$this->session);
                       if($login->getformhtml() == 0)
                       {
                            $data=[];  //initialise an empty data array 
                          
                            $data['login'] =$login->getStringPanel_1();
                            $data['register'] =$login->getStringPanel_2();// A string intended of the Left Hand Side of the page
                            $data['htmlform'] =$login->getformhtml();
                             $this->data=$data;
                    
                            include_once 'views/LogInRegister.php';
                           
                       }
                       else{
                        
                         header('Location: index.php?pageID=Home');
                        
                      
                        
                       
                       }
                       
                        break;
                
                         case "Auctions":
                         {
                              $home=new Home($this->pageID,$this->db,$this->session);
                              $auction=new Auctions($this->pageID,$this->db,$this->session);
                               $data=[]; 
                               $data['htmlone'] = $auction->getHTMLOne();
                               $data['htmltwo'] = $auction->getHTMLTwo();
                               $data['htmlthree'] = $auction->getHTMLThree();
                               $data['htmlfour'] = $auction->getHTMLFour();
                               $data['description'] = $auction->getDescriptionArr();
                               
                              
                              include_once 'views/Auctions.php';
                         }
                     default:
                         $home=new Home($this->pageID,$this->db,$this->session);
                           $data=[]; 
                       
                        $login=new Login($this->pageID,$this->db,$this->session);
                        $data['login'] =$login->getStringPanel_1();
                        $data['register'] =$login->getStringPanel_2(); 
                       
                        $data['htmlform'] =$login->getformhtml();
                        $this->data=$data;
                        include_once 'views/LogInRegister.php';
                         
                         $this->data=$data;
                        
                        break;
                }
                
               
                
             }
            
             
                }
            

        
        
}