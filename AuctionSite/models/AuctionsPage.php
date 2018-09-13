<?php
class AuctionsPage extends Model
 {
             
    
    
     private $pageID;
     private $session;
     private $db;
     private $title;
     private $description;
     private $startingPrice;
     private $auctionID;
     private $username;
     private $auctionIDarr;
     private $imageEXTArr = [];
     private $zero;
     private $highestbid;
     private $timestamp;
     private $duration;
  private $userID;
     
     private $imageext;
     
     
     function __construct($pageID,$db,$session){ 
         $this->session=$session;
        
         parent::__construct($this->session->getLoggedIn());
         $this->pageID=$pageID;
         $this->db=$db;
         $this->getauctiondetails();
         
     
     }
     
      public function getauctiondetails(){
         $x = explode('0',$this->pageID);
       
         $this->zero = "0";
         $this->auctionIDarr = explode('0',$this->pageID); //gets auction ID from page ID
         $this->auctionID = $this->auctionIDarr[1];
         switch ($this->pageID) {
                
                  case $x[0].$this->zero.$x[1]:
                    
                    $this->db();
                
                            
                 
                    break;
                default:
                   
                 
                 
                  
                    
     }
      
     
                   }
                   
                   
                   
                   private function db()
     {
         $sql='SELECT  * FROM auction WHERE auctionid="'.$this->auctionID.'"';
          if($rs=$this->db->query($sql)){ 
              //if ($rs->num_rows<>1){  //username and password is not valid
                 
                    //free result set memory
                    //$rs->free();
                    //return FALSE;  
                    
              //}
              //else{
                  
                 
                  
                   $row=$rs->fetch_assoc();
            
            $this->title = $row["title"];
            $this->description = $row["description"];
            $this->startingPrice = $row["startingprice"];
            $this->userID = $row["userid"];
            $this->highestbid = $row["highestbid"];
            $this->duration = $row["duration"];
           $this->timestamp = $row["datetimestamp"];
            
            $sql='SELECT  * FROM imageext WHERE auctionid="'.$this->auctionID.'"';
             if($rs=$this->db->query($sql)){ 
            while ($row = $rs->fetch_assoc()) {
                 
                $this->imageext = $row["imgext"];
                
                 array_push($this->imageEXTArr, $this->imageext);
             }
             
             }
             $sql='SELECT  * FROM user WHERE userid="'.$this->userID.'"';
              if($rs=$this->db->query($sql)){ 
             $row=$rs->fetch_assoc();
             $this->username = $row["username"];
              }
              }
        
               return true;

       
          
     
                 
      
          
                
}


public function gettitle() {
    return $this->title;
    
}
public function getdescription() {
    return $this->description;
    
}
public function getstartingprice() {
    return $this->startingPrice;
    
}

public function getusername() {
    return $this->username;
    
}

public function getimageext() {
    return $this->imageEXTArr;
    
}

public function getauctionid() {
    return $this->auctionID;
    
}

public function gethighestbid() {
    return $this->highestbid;
    
}

public function getduration() {
    return $this->duration;
    
}
   
public function gettimestamp() {
    return $this->timestamp;
    
}


public function getuserid() {
    return $this->userID;
    
}

 }


