<?php


class Home extends Model {
	//class properties
       
        private $menuNav;
        private $menuNavTwo;
        private $pageID;
        private $session;
        private $stringone;
        
   
     private $i = 1;
     private $db;
     private $title;
     private $description;
     private $startingPrice;
     private $auctionID;
     private $titleArr = [];
     private $highestbidarr = [];
     private $highestbid;
     private $descriptionArr = [];
     private $startingPriceArr = [];
     private $auctionIDArr = [];
     private $userIDArr = [];
     private $imageEXTArr = [];
     private $timestamparr = [];
     private $durationarr = [];
     private $timestamp;
     private $duration;
     private $test;
     private $bidauctionID = [];
     private $bid;
     private $passfail;
     private $forloop;
     
     
     private $imageext;
	
	//constructor
	function __construct($pageID,$db,$session){  //construct the home object   
           
            $this->session=$session;
            parent::__construct($this->session->getLoggedin());
            //parent::__construct($session);
            
            $this->pageID=$pageID;
            $this->db=$db;
             
            
           
            $this->setmenuNav();
            $this->setStringOne($session->getfirstname());

  
   
	}
        
        //setters
   

 public function setmenuNav(){  //navigation menu depends on whether user is logged on and theuser authorisation level
            //set the menu item data
            if($this->loggedin){  //these page options are only available to logged in users
                { 
                    
                    
                switch ($this->pageID) {
                    
                    //HOME Menu items
                    case "Home":
                         $this->menuNav[0]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Home">Home</a>'; 
                        $this->menuNav[1]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Auctions">Auctions</a>';
                        $this->menuNav[2]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Sell">Sell</a>'; 
                        $this->menuNavTwo[0]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=History">History</a>';
                         $this->menuNavTwo[1]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a>';
                         
                         $userid = $this->session->getuserID();
                         
                         $sql="SELECT  * FROM prevbids where userID='$userid'";
                          $rs=$this->db->query($sql);
                              
                            
                              
                               while ($row = $rs->fetch_assoc()) {
                                   $this->bid = $row["auctionID"];
                                    array_push($this->bidauctionID, $this->bid);
                               }
                              
                          
                          
                     if(sizeof($this->bidauctionID) > 0){ 
                         
                            while ($this->i <= sizeof($this->bidauctionID))
                         {
                             
                          
                             $aucid = $this->bidauctionID[$this->i-1];
                          
                         $sql="SELECT  * FROM auction WHERE status='active' AND auctionid='$aucid'";
          
                         
                         $rs=$this->db->query($sql);
              
        while ($row = $rs->fetch_assoc()) {
          
                      $this->title = $row["title"];
    $this->description = $row["description"];
    $this->startingPrice = $row["startingprice"];
    $this->auctionID = $row["auctionid"];
     $this->userID = $row["userid"];
     $this->imageext = $row["imageext"];
     $this->duration = $row["duration"];
     $this->timestamp = $row["datetimestamp"];
     $this->test = $this->description;
     $this->highestbid = $row["highestbid"];
 
    
    
    array_push($this->titleArr, $this->title);
     array_push($this->descriptionArr, $this->description);
     array_push($this->startingPriceArr, $this->startingPrice);
     array_push($this->auctionIDArr, $this->auctionID);
      array_push($this->userIDArr, $this->userID);
      array_push($this->imageEXTArr, $this->imageext);
       array_push($this->timestamparr, $this->timestamp);
        array_push($this->durationarr, $this->duration);
        array_push($this->highestbidarr, $this->highestbid);
          }
   
          $this->forloop = $this->i;
                  $rs->free();
                 $this->i = $this->i + 1;
                 
          }
      
          
                     }   
                         
                        break;
                    case "Auctions":
                         $this->menuNav[0]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Home">Home</a>'; 
                        $this->menuNav[1]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Auctions">Auctions</a>';
                        $this->menuNav[2]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Sell">Sell</a>'; 
                        $this->menuNavTwo[0]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=History">History</a>';
                         $this->menuNavTwo[1]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a>';
                        break;
                     case "logout":
                         $this->menuNav[0]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Home">Home</a>'; 
                        $this->menuNav[1]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Auctions">Auctions</a>';
                        $this->menuNav[2]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Sell">Sell</a>'; 
                        $this->menuNavTwo[0]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=login">Log in / Sign up</a>';
                        break;
                    default:
                     $this->menuNav[0]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Home">Home</a>'; 
                        $this->menuNav[1]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Auctions">Auctions</a>';
                        $this->menuNav[2]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Sell">Sell</a>'; 
                        $this->menuNavTwo[0]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=History">History</a>';
                         $this->menuNavTwo[1]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=logout">Log Out</a>';
                         
                           $userid = $this->session->getuserID();
                         
          
                
                }
                }
            }
            else{
                 switch ($this->pageID) {
               case "Home":
                        $this->menuNav[0]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Home">Home</a>'; 
                        $this->menuNav[1]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Auctions">Auctions</a>';
                        $this->menuNav[2]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Sell">Sell</a>';  
                        $this->menuNavTwo[0]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=login">Log in / Sign up</a>';
                        break;
                case "LogIn":
                    $this->menuNav[0]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=home">Home</a>'; 
                     $this->menuNav[1]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=auctions">Auctions</a>';
                     $this->menuNav[2]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=sell">Sell</a>'; 
                    default:
                  $this->menuNav[0]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=Home">home</a>'; 
                        $this->menuNav[1]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=auctions">Auctions</a>';
                        $this->menuNav[2]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=sell">Sell</a>'; 
                        $this->menuNavTwo[0]='<a href="'.$_SERVER['PHP_SELF'].'?pageID=login">Log in / Sign up</a>';
                        
                        
                   
            }
           
            
 }
 
 }
 
            public function setStringOne($firstname){
                $this->stringone = $firstname;
            }
            
            public function getStringOne(){
                return $this->stringone;
            }
            
            
 
             public function getMenuNav(){return $this->menuNav;}
             public function getMenuNavTwo(){return $this->menuNavTwo;}
             public function getTitleArr() {
    return $this->titleArr;
    
}
public function getDescriptionArr() {
    return $this->descriptionArr;
    
}

public function getDurationArr() {
    return $this->durationarr;
    
}

public function getTimestampArr() {
    return $this->timestamparr;
}

public function getStartingPriceArr() {
    return $this->startingPriceArr;
    
}

public function getAuctionIDArr() {
    return $this->auctionIDArr;
    
}

public function getUserIDArr() {
    return $this->userIDArr;
    
}

public function getimgext() {
    return $this->imageEXTArr;
    
}


public function html() {
    return $this->html;
    
}

public function getimageext() {
    return $this->imageEXTArr;
    
}

public function test()
{
  
    return $this->test;
    
}

public function passfail() {
    return $this->passfail;
    
}

public function gethighestbidarr() {
    return $this->highestbidarr;
    
}

public function getbidarraysize() {
    return $this->bidauctionID;
    
}

public function getforloop() {
    return $this->forloop;
    
}
 
}