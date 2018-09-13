<?php

 class History extends Model
 {

     private $descriptionarr = [];
     private $titlearr = [];
     private $pricearr = [];
     private $description;
     private $title;
     private $price;
     
 function __construct($pageID,$db,$session){ 
         $this->session=$session;
        
         parent::__construct($this->session->getLoggedIn());
         $this->pageID=$pageID;
         $this->db=$db;
         $this->processhistory();
         
     
     }
     
     
     public function processhistory(){
         switch ($this->pageID) {
             
             case "History": 
                 $sql='SELECT  * FROM successfulbids WHERE userid ="'.$this->session->getuserID().'"';
           
                 if($rs=$this->db->query($sql)){ 
                 while ($row = $rs->fetch_assoc()) { 

              
               $this->description = $row["description"];
             $this->price = $row["price"];
             $this->title = $row["title"];
             
             
   
     
 
    

     array_push($this->descriptionarr, $this->description);
      array_push($this->titlearr, $this->title);
     array_push($this->pricearr, $this->price);
          }
          
                 }
             break;
          
          default:
              
          }
         
          
         
         }

         
         public function getTitleArr() {
    return $this->titlearr;
    
}
public function getDescriptionArr() {
    return $this->descriptionarr;
    
}

public function getPriceArr() {
    return $this->pricearr;
    
}
 }