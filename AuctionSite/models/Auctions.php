<?php

 class Auctions extends Model
 {
 
 
     private $pageID;
     private $session;
     private $db;
     private $title;
     private $description;
     private $startingPrice;
     private $highestbid;
     private $auctionID;
     private $titleArr = [];
     private $descriptionArr = [];
     private $startingPriceArr = [];
     private $auctionIDArr = [];
     private $userIDArr = [];
     private $imageEXTArr = [];
     private $timestamparr = [];
     private $durationarr = [];
      private $highestbidarr = [];
     private $timestamp;
     private $duration;
     private $test;
     private $passfail;
   
     
     
     private $imageext;
     
     
     function __construct($pageID,$db,$session){ 
         $this->session=$session;
        
         parent::__construct($this->session->getLoggedIn());
         $this->pageID=$pageID;
         $this->db=$db;
         $this->processauction();
         
     
     }
     
     public function processauction(){
         switch ($this->pageID) {
                case "Auctions": 
                  
                    if($this->auctiondetails()){
                        
                    $this->passfail = "pass";
                    }
                   else
                   {
                        
                       $this->passfail = "fail";
                   }
                    break;
                default:
                   
                    $this->passfail = "jfail";
                    
                    
     }
     
     }

     private function auctiondetails()
     {
         $sql="SELECT  * FROM auction WHERE status='active'";
          if($rs=$this->db->query($sql)){ 
              $result = $sql;
              //if ($rs->num_rows<>1){ 
   
                   //return false;
                
                   
                   
              //}
                // else{
        while ($row = $rs->fetch_assoc()) {
          
                      $this->title = $row["title"];
    $this->description = $row["description"];
    $this->startingPrice = $row["startingprice"];
    $this->auctionID = $row["auctionid"];
     $this->userID = $row["userid"];
     $this->imageext = $row["imageext"];
     $this->duration = $row["duration"];
     $this->timestamp = $row["datetimestamp"];
     $this->highestbid = $row["highestbid"];
     $this->test = $this->description;
     
 
    
    
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
      return true;
                 
      
          }
                 
                 
                 
   
   
}
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

public function gethighestbidarr() {
    return $this->highestbidarr;
    
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
     
 }