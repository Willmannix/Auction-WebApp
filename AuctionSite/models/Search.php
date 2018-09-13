<?php


class Search extends Model
 {
    
     private $title;
     private $description;
     private $startingPrice;
     private $auctionID;
     private $titleArr = [];
     private $descriptionArr = [];
     private $highestbidarr = [];
     private $highestbid;
     private $startingPriceArr = [];
     private $auctionIDArr = [];
     private $userIDArr = [];
     private $imageEXTArr = [];
     private $timestamparr = [];
     private $durationarr = [];
     private $timestamp;
     private $duration;
    
   private $search;
    
      function __construct($pageID,$db,$session){ 
         $this->session=$session;
        
         parent::__construct($this->session->getLoggedIn());
         $this->pageID=$pageID;
         $this->db=$db;
         $this->processsearch();
         
     
     }
    
    
     public function processsearch(){
         switch ($this->pageID) {
             
             case "Search":
              
                  if (isset($_POST['submit'])) {
          //You NEED to use prepared statements when connecting to the database, to make the search form secure! I didn't do that in the video, however we will do it here together!
          //If you are confused about prepared statements, please watch episode 40 in the PHP playlist and learn it first.

          //Here we get the search input
          $this->search = $_POST['search'];
          
            $sql = "SELECT * FROM auction WHERE title LIKE '%$this->search%' OR description LIKE '%$this->search%' AND NOT status='expired'";
          
                        if($rs=$this->db->query($sql)){ 

              
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
                 }
                 
                 else
                 {
                     break;
                 }
                  }
                  
     
                      break;
             
             
             default:
             
         }
         }
    
    
    public function getTitleArr() {
    return $this->titleArr;
    
}

public function gethighestbidarr() {
    return $this->highestbidarr;
    
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

    
    
    
}