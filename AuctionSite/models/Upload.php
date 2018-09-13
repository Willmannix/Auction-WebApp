<?php

 class Upload extends Model
 {
     
     private $fileName;
     private $fileTmpName;
     private $fileSize;
     private $fileError;
     private $fileType;
     private $fileExt;
     private $fileActualExt;
     private $allowed;
     private $fileDestination;
     private $auctionform;
     private $pageID;
     private $session;
     private $db;
     private $newFileName;
     private $description;
     private $title;
     private $string;
     private $startingPrice;
     private $newStartingPrice;
     private $auctionID;
     private $myFile;
     private $fileCount;
     private $duration;
     private $currentdate;
     private $status;
     private $imgext = [];
     
          function __construct($pageID,$db,$session){ 
         $this->session=$session;
        
         parent::__construct($this->session->getLoggedIn());
         $this->pageID=$pageID;
         $this->db=$db;
         $this->processauction();
         
     
     }


 public function processauction(){
               
            switch ($this->pageID) {
                case "Sell": 
                    $this->auctionform = file_get_contents('forms/sellForm.html');  //this reads an external form file into the string
                   
                    break;
                
                 case "process_auction":
                    $this->title=$this->db->real_escape_string($_POST['title']);
                    $this->description=$this->db->real_escape_string($_POST['description']);
                    $this->startingPrice=$this->db->real_escape_string($_POST['startingprice']);
                    $this->duration =$this->db->real_escape_string($_POST['duration']);
                    $this->status = "active";
                    date_default_timezone_set("Europe/London");
                    $this->currentdate = date('Y-m-d H:i:s');
                   
                    $this->newStartingPrice = (double)$this->startingPrice;
                    
                    round((double)$this->newStartingPrice, 2);
                    
      $this->myFile = $_FILES['upload'];
      $this->fileCount = count($this->myFile["name"]);              

         $sql = 'SELECT * FROM auction ORDER BY auctionid DESC LIMIT 1';
            
             if($rs=$this->db->query($sql)) 
             {
                 if ($rs->num_rows<>1){ 
   
                    $this->auctionID = 1;
                 }
                 else
                 { $row=$rs->fetch_assoc();
                 $this->auctionID = $row['auctionid'] + 1;
                
                
                 }
             }
        for ($i = 0; $i < $this->fileCount; $i++) {
    
    
    $this->fileName = $this->myFile['name'][$i];
    $this->fileTmpName = $this->myFile['tmp_name'][$i];
    $this->fileSize = $this->myFile['size'][$i];
    $this->fileError = $this->myFile['error'][$i];
    $this->fileType = $this->myFile['type'][$i];
    
    $this->fileExt = explode('.',$this->fileName);
    $this->fileActualExt = strtolower(end($this->fileExt)); 
    
    array_push($this->imgext, $this->fileActualExt);
    
    $this->allowed = array('jpg','jpeg','png');
    
     if($this->imgext())
                {$this->auctionform = "success";}
                else{
                    $this->auctionform= "fail";
                }
  
    
  
            
            $this->newFileName = $this->auctionID.$i.".".$this->fileActualExt;
            $this->fileDestination = 'Uploads/'.$this->newFileName;
            move_uploaded_file($this->fileTmpName, $this->fileDestination);
               
    
    
        }
         if($this->db())
                {$this->auctionform = "success";}
                else{
                    $this->auctionform= "fail";
                }
      break;
             
      default:
        $this->auctionform = file_get_contents('forms/sellForm.html'); 
                break;
        

 }
 
 }
 
 private function db(){
                      
                        //create the SQL insert statement for the new record
                         $sql='INSERT INTO auction(title,description,userid,imageext,startingprice,highestbid,useridhighestbid,datetimestamp,status,duration)VALUES("'.$this->title.'","'.$this->description.'","'.$this->session->getuserID().'","'.$this->fileActualExt.'","'.$this->newStartingPrice.'","'.$this->startingPrice.
                                 '","'.$this->session->getuserID().'","'.$this->currentdate.'","'.$this->status.'","'.$this->duration.'")';
                        //execute the insert query
                        if(@$this->db->query($sql)){  //execute the query and check it worked    
                            return TRUE;
                        } 
                        else{  
                            return FALSE;
                        }    
                }
 
                
                private function imgext(){
                      
                        //create the SQL insert statement for the new record
                         $sql='INSERT INTO imageext(auctionid,imgext)VALUES("'.$this->auctionID.'","'.$this->fileActualExt.'")';
                        //execute the insert query
                        if(@$this->db->query($sql)){  //execute the query and check it worked    
                            return TRUE;
                        } 
                        else{  
                            return FALSE;
                        }    
                }
 
  public function getAuctionForm(){return $this->auctionform;}
  public function getstring(){return $this->string;}
  public function getduration(){return $this->duration;}
  
  
 }
 
 
 
